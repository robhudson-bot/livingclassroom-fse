<?php
/**
 * Classic-to-Gutenberg-blocks converter for Living Classroom.
 *
 * Usage:
 *   wp eval-file classic-to-blocks.php --dry-run            -> sample-only, no writes
 *   wp eval-file classic-to-blocks.php --dry-run --id=403   -> dry-run a single post
 *   wp eval-file classic-to-blocks.php --apply              -> bulk convert everything classic
 *
 * Reads $args from --skip-wordpress flag context. We use $_SERVER['argv'] parsing.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Flags via environment variables (wp eval-file doesn't pass arbitrary flags).
$dry_run   = getenv( 'LC_DRY_RUN' ) === '1';
$apply     = getenv( 'LC_APPLY' )   === '1';
$target_id = getenv( 'LC_ID' ) ? (int) getenv( 'LC_ID' ) : null;
if ( ! $dry_run && ! $apply ) {
	echo "ERROR: set LC_DRY_RUN=1 or LC_APPLY=1 in the environment\n";
	return;
}

/**
 * Convert a classic post_content string to Gutenberg block markup.
 *
 * Strategy: parse as HTML, walk top-level child nodes of the body, emit
 * matching block markup for each. Anything we don't have a block for
 * falls back to wp:html (which preserves the raw HTML inside the editor).
 *
 * Shortcodes encountered as text nodes become wp:shortcode blocks.
 */
function lc_html_to_blocks( $html ) {
	$html = trim( $html );
	if ( $html === '' ) {
		return '';
	}

	// 1. Normalize: run wpautop so loose text becomes wrapped in <p>.
	//    Disable wpautop's <br> insertion inside lists.
	$normalized = wpautop( $html );

	// 2. DOMDocument is picky about encoding + root element; wrap.
	$dom = new DOMDocument( '1.0', 'UTF-8' );
	libxml_use_internal_errors( true );
	$dom->loadHTML(
		'<?xml encoding="UTF-8"?><div id="lc-root">' . $normalized . '</div>',
		LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING
	);
	libxml_clear_errors();

	$root = $dom->getElementById( 'lc-root' );
	if ( ! $root ) {
		// Fallback: wrap whole thing in wp:html.
		return "<!-- wp:html -->\n{$html}\n<!-- /wp:html -->\n";
	}

	$out = [];
	foreach ( $root->childNodes as $node ) {
		$block = lc_node_to_block( $dom, $node );
		if ( $block !== null && $block !== '' ) {
			$out[] = $block;
		}
	}
	return implode( "\n\n", $out );
}

function lc_node_to_block( DOMDocument $dom, DOMNode $node ) {
	if ( $node->nodeType === XML_TEXT_NODE ) {
		$text = trim( $node->nodeValue );
		if ( $text === '' ) return null;
		// Bare text outside <p> — treat as paragraph or shortcode.
		return lc_text_to_block( $text );
	}

	if ( $node->nodeType !== XML_ELEMENT_NODE ) {
		return null;
	}

	$tag = strtolower( $node->nodeName );

	switch ( $tag ) {
		case 'p':
			return lc_p_to_block( $dom, $node );

		case 'h1': case 'h2': case 'h3': case 'h4': case 'h5': case 'h6':
			$level = (int) substr( $tag, 1 );
			$inner = lc_inner_html( $dom, $node );
			$inner_trimmed = trim( $inner );
			if ( $inner_trimmed === '' ) return null;
			return sprintf(
				"<!-- wp:heading {\"level\":%d} -->\n<h%d class=\"wp-block-heading\">%s</h%d>\n<!-- /wp:heading -->",
				$level, $level, $inner_trimmed, $level
			);

		case 'ul':
		case 'ol':
			return lc_list_to_block( $dom, $node, $tag === 'ol' );

		case 'blockquote':
			$inner = lc_inner_html( $dom, $node );
			// Recursively process inner content
			$inner_blocks = lc_html_to_blocks( $inner );
			return "<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\">\n" . $inner_blocks . "\n</blockquote>\n<!-- /wp:quote -->";

		case 'figure':
			return lc_figure_to_block( $dom, $node );

		case 'img':
			return lc_img_to_block( $dom, $node );

		case 'hr':
			return "<!-- wp:separator -->\n<hr class=\"wp-block-separator has-alpha-channel-opacity\"/>\n<!-- /wp:separator -->";

		case 'pre':
			$inner = lc_inner_html( $dom, $node );
			return "<!-- wp:preformatted -->\n<pre class=\"wp-block-preformatted\">{$inner}</pre>\n<!-- /wp:preformatted -->";

		case 'iframe':
			// Likely a video embed; wrap in wp:html so it renders.
			$raw = lc_outer_html( $dom, $node );
			return "<!-- wp:html -->\n{$raw}\n<!-- /wp:html -->";

		case 'div':
		case 'section':
		case 'article':
		case 'aside':
		case 'header':
		case 'footer':
		case 'main':
		case 'nav':
			// Containers: recurse into children, but wrap the container itself in wp:group
			// if it has meaningful class/style. For simplicity, preserve as wp:html.
			$raw = lc_outer_html( $dom, $node );
			return "<!-- wp:html -->\n{$raw}\n<!-- /wp:html -->";

		case 'table':
			$raw = lc_outer_html( $dom, $node );
			return "<!-- wp:table -->\n<figure class=\"wp-block-table\">{$raw}</figure>\n<!-- /wp:table -->";

		default:
			// Unknown / span / inline element at the top level — wrap in wp:html.
			$raw = lc_outer_html( $dom, $node );
			if ( trim( strip_tags( $raw ) ) === '' && stripos( $raw, '<img' ) === false ) {
				return null;
			}
			return "<!-- wp:html -->\n{$raw}\n<!-- /wp:html -->";
	}
}

function lc_p_to_block( DOMDocument $dom, DOMNode $node ) {
	$inner = lc_inner_html( $dom, $node );
	$inner_trim = trim( $inner );
	if ( $inner_trim === '' || $inner_trim === '&nbsp;' ) return null;

	// If the paragraph is exactly one image, emit as wp:image instead.
	if ( preg_match( '/^\s*(<a [^>]*>)?\s*<img\b[^>]*>\s*(<\/a>)?\s*$/i', $inner_trim ) ) {
		// Re-parse the img inside this paragraph
		$tmp = new DOMDocument();
		libxml_use_internal_errors( true );
		$tmp->loadHTML( '<?xml encoding="UTF-8"?><div>' . $inner_trim . '</div>',
			LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING );
		libxml_clear_errors();
		$img = $tmp->getElementsByTagName( 'img' )->item( 0 );
		if ( $img ) {
			return lc_img_to_block( $tmp, $img, $inner_trim );
		}
	}

	// If paragraph is exactly one shortcode, emit wp:shortcode.
	if ( preg_match( '/^\[[a-z_][a-z0-9_\-]*\b[^\]]*\](\s*\[\/[a-z_][a-z0-9_\-]*\])?\s*$/i', $inner_trim ) ) {
		return "<!-- wp:shortcode -->\n{$inner_trim}\n<!-- /wp:shortcode -->";
	}

	return "<!-- wp:paragraph -->\n<p>{$inner_trim}</p>\n<!-- /wp:paragraph -->";
}

function lc_text_to_block( $text ) {
	// Bare text node outside any tag. If it's a shortcode, wp:shortcode. Otherwise wp:paragraph.
	if ( preg_match( '/^\[[a-z_][a-z0-9_\-]*\b/', $text ) ) {
		return "<!-- wp:shortcode -->\n{$text}\n<!-- /wp:shortcode -->";
	}
	return "<!-- wp:paragraph -->\n<p>{$text}</p>\n<!-- /wp:paragraph -->";
}

function lc_list_to_block( DOMDocument $dom, DOMNode $node, $ordered = false ) {
	$items = [];
	foreach ( $node->childNodes as $child ) {
		if ( $child->nodeType !== XML_ELEMENT_NODE ) continue;
		if ( strtolower( $child->nodeName ) !== 'li' ) continue;
		$li_inner = trim( lc_inner_html( $dom, $child ) );
		if ( $li_inner === '' ) continue;
		$items[] = "<!-- wp:list-item -->\n<li>{$li_inner}</li>\n<!-- /wp:list-item -->";
	}
	if ( ! $items ) return null;

	$attrs    = $ordered ? ' {"ordered":true}' : '';
	$tag      = $ordered ? 'ol' : 'ul';
	$classes  = $ordered ? 'wp-block-list' : 'wp-block-list';

	return "<!-- wp:list{$attrs} -->\n<{$tag} class=\"{$classes}\">" . implode( "", $items ) . "</{$tag}>\n<!-- /wp:list -->";
}

function lc_figure_to_block( DOMDocument $dom, DOMNode $node ) {
	$img = null;
	foreach ( $node->getElementsByTagName( 'img' ) as $i ) { $img = $i; break; }
	if ( $img ) {
		$figure_html = lc_outer_html( $dom, $node );
		return "<!-- wp:image -->\n{$figure_html}\n<!-- /wp:image -->";
	}
	$raw = lc_outer_html( $dom, $node );
	return "<!-- wp:html -->\n{$raw}\n<!-- /wp:html -->";
}

function lc_img_to_block( DOMDocument $dom, DOMNode $img, $existing_html = null ) {
	$src = $img->getAttribute( 'src' );
	$alt = $img->getAttribute( 'alt' );
	$id  = null;

	// Try to find an attachment ID from src
	if ( $src ) {
		$attach_id = attachment_url_to_postid( $src );
		if ( $attach_id ) $id = (int) $attach_id;
	}
	$attrs    = $id ? sprintf( ' {"id":%d}', $id ) : '';
	$class_id = $id ? sprintf( ' wp-image-%d', $id ) : '';

	if ( $existing_html ) {
		// Existing wrapper (e.g., <a>...</a>) — use it as-is inside a figure.
		return "<!-- wp:image{$attrs} -->\n<figure class=\"wp-block-image\">{$existing_html}</figure>\n<!-- /wp:image -->";
	}

	$img_tag = sprintf( '<img src="%s" alt="%s"%s/>',
		esc_url( $src ),
		esc_attr( $alt ),
		$class_id ? ' class="' . $class_id . '"' : ''
	);
	return "<!-- wp:image{$attrs} -->\n<figure class=\"wp-block-image\">{$img_tag}</figure>\n<!-- /wp:image -->";
}

function lc_inner_html( DOMDocument $dom, DOMNode $node ) {
	$html = '';
	foreach ( $node->childNodes as $c ) {
		$html .= $dom->saveHTML( $c );
	}
	return $html;
}

function lc_outer_html( DOMDocument $dom, DOMNode $node ) {
	return $dom->saveHTML( $node );
}

/* ------------------------------------------------------------------------
 * Main loop
 * --------------------------------------------------------------------- */

global $wpdb;

$where = "post_status = 'publish' AND post_type IN ('page','post') AND post_content != '' AND post_content NOT LIKE '%<!-- wp:%'";
if ( $target_id ) {
	$rows = $wpdb->get_results( $wpdb->prepare(
		"SELECT ID, post_title, post_type, post_content FROM {$wpdb->posts} WHERE ID = %d",
		$target_id
	) );
} else {
	$rows = $wpdb->get_results(
		"SELECT ID, post_title, post_type, post_content FROM {$wpdb->posts} WHERE {$where} ORDER BY ID ASC"
	);
}

$converted = 0;
$skipped   = 0;
$samples   = 0;
$failures  = [];

foreach ( $rows as $row ) {
	$old = $row->post_content;
	try {
		$new = lc_html_to_blocks( $old );
	} catch ( Throwable $e ) {
		$failures[] = sprintf( "ID %d (%s): %s", $row->ID, $row->post_title, $e->getMessage() );
		continue;
	}

	if ( $new === '' || strpos( $new, '<!-- wp:' ) === false ) {
		$skipped++;
		continue;
	}

	if ( $dry_run ) {
		if ( $samples < 3 || $target_id ) {
			echo "\n========== ID {$row->ID}: {$row->post_title} ==========\n";
			echo "--- ORIGINAL (first 600 chars) ---\n";
			echo substr( $old, 0, 600 ) . ( strlen( $old ) > 600 ? "...\n" : "\n" );
			echo "--- CONVERTED (first 1500 chars) ---\n";
			echo substr( $new, 0, 1500 ) . ( strlen( $new ) > 1500 ? "...\n" : "\n" );
			$samples++;
		}
		$converted++;
	} else {
		// wp_update_post creates a revision automatically; pass via slashes-encoded API.
		$result = wp_update_post( [
			'ID'           => $row->ID,
			'post_content' => wp_slash( $new ),
		], true );
		if ( is_wp_error( $result ) ) {
			$failures[] = sprintf( "ID %d (%s): %s", $row->ID, $row->post_title, $result->get_error_message() );
		} else {
			$converted++;
		}
	}
}

echo "\n=== SUMMARY ===\n";
echo "Mode:      " . ( $dry_run ? 'DRY-RUN (no writes)' : 'APPLY' ) . "\n";
echo "Converted: {$converted}\n";
echo "Skipped:   {$skipped}\n";
echo "Failures:  " . count( $failures ) . "\n";
foreach ( $failures as $f ) echo "  - {$f}\n";
