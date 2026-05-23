<?php
/**
 * Living Classroom FSE — Theme Functions
 *
 * Minimal theme functions. Most config lives in theme.json.
 * What's here: pattern category registration, shortcodes ported from
 * the classic theme, breadcrumb helpers used in templates, ACF options
 * block binding, and a [lc_year] token for the footer copyright.
 *
 * @package livingclassroom-fse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* -------------------------------------------------------------------------
 * Theme setup
 * ---------------------------------------------------------------------- */

add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
} );

/* -------------------------------------------------------------------------
 * Enqueue styles
 * ---------------------------------------------------------------------- */

add_action( 'wp_enqueue_scripts', function () {
	$style_path = get_stylesheet_directory() . '/style.css';
	$ver        = file_exists( $style_path ) ? (string) filemtime( $style_path ) : wp_get_theme()->get( 'Version' );
	wp_enqueue_style(
		'livingclassroom-fse',
		get_stylesheet_uri(),
		array(),
		$ver
	);
} );

/* -------------------------------------------------------------------------
 * Pattern category
 * ---------------------------------------------------------------------- */

add_action( 'init', function () {
	register_block_pattern_category( 'livingclassroom', array(
		'label'       => __( 'Living Classroom', 'livingclassroom-fse' ),
		'description' => __( 'Patterns specific to The Living Classroom programme.', 'livingclassroom-fse' ),
	) );
} );

/* -------------------------------------------------------------------------
 * Block binding source: ACF options
 *
 * Usage in a block:
 *   {"metadata":{"bindings":{"content":{"source":"livingclassroom/option","args":{"key":"testimonials_banner_label"}}}}}
 *
 * Reads a field from the ACF "options" page. Returns empty string if
 * ACF isn't active or the field is missing.
 * ---------------------------------------------------------------------- */

add_action( 'init', function () {
	if ( ! function_exists( 'register_block_bindings_source' ) ) {
		return; // WP < 6.5
	}

	register_block_bindings_source( 'livingclassroom/option', array(
		'label'              => __( 'ACF Option', 'livingclassroom-fse' ),
		'get_value_callback' => function ( $source_args ) {
			if ( ! function_exists( 'get_field' ) ) {
				return '';
			}
			$key = isset( $source_args['key'] ) ? sanitize_key( $source_args['key'] ) : '';
			if ( ! $key ) {
				return '';
			}
			$value = get_field( $key, 'options' );
			return is_string( $value ) ? $value : '';
		},
		'uses_context'       => array(),
	) );

	register_block_bindings_source( 'livingclassroom/acf-field', array(
		'label'              => __( 'ACF Post Field', 'livingclassroom-fse' ),
		'get_value_callback' => function ( $source_args, $block ) {
			if ( ! function_exists( 'get_field' ) ) {
				return '';
			}
			$key     = isset( $source_args['key'] ) ? sanitize_key( $source_args['key'] ) : '';
			$post_id = isset( $block->context['postId'] ) ? (int) $block->context['postId'] : get_the_ID();
			if ( ! $key || ! $post_id ) {
				return '';
			}
			$value = get_field( $key, $post_id );
			return is_string( $value ) ? $value : '';
		},
		'uses_context'       => array( 'postId' ),
	) );
} );

/* -------------------------------------------------------------------------
 * Shortcodes ported from the classic theme
 * ---------------------------------------------------------------------- */

/**
 * [lc_year] — outputs the current year. Used in the footer copyright.
 */
add_shortcode( 'lc_year', function () {
	return esc_html( gmdate( 'Y' ) );
} );

/**
 * [lc_breadcrumb] — renders the breadcrumb nav. Use inside a
 * core/shortcode block in templates that need a breadcrumb.
 */
add_shortcode( 'lc_breadcrumb', function () {
	ob_start();
	lc_breadcrumb();
	return ob_get_clean();
} );

/**
 * [button class="..." href="..." title="..."]
 *
 * Ported verbatim from the classic theme so existing content using
 * [button] continues to render. Markup matches the old theme's CSS
 * hooks so site CSS can keep targeting .button etc.
 */
add_shortcode( 'button', function ( $atts ) {
	$atts = shortcode_atts( array(
		'class' => 'lc-button',
		'href'  => '#',
		'title' => '',
	), $atts, 'button' );

	return sprintf(
		'<a class="%1$s" href="%2$s" title="%3$s">%4$s <span class="lc-button__chevron" aria-hidden="true">&rsaquo;</span></a>',
		esc_attr( $atts['class'] ),
		esc_url( $atts['href'] ),
		esc_attr( wp_strip_all_tags( $atts['title'] ) ),
		esc_html( $atts['title'] )
	);
} );

/**
 * [testimonial_list] — building-block testimonial grid.
 *
 * Ported from the classic theme. Reads ACF options for the four "lines"
 * of testimonial relationships and renders them as a grid of cards with
 * popup content. Visual treatment will be modernised via CSS in style.css.
 */
add_shortcode( 'testimonial_list', function () {
	if ( ! function_exists( 'get_field' ) ) {
		return '';
	}

	$lines = array(
		array( 'key' => 'fourth_line_testimonial', 'class' => 'lc-bb__line lc-bb__line--4', 'start' => 1 ),
		array( 'key' => 'third_line_testimonial',  'class' => 'lc-bb__line lc-bb__line--3', 'start' => 4 ),
		array( 'key' => 'second_line_testimonial', 'class' => 'lc-bb__line lc-bb__line--2', 'start' => 7 ),
		array( 'key' => 'first_line_testimonial',  'class' => 'lc-bb__line lc-bb__line--1', 'start' => 10 ),
	);

	ob_start();
	$current_id = get_the_ID();
	?>
	<div class="lc-bb">
		<div class="lc-bb__inner">
		<?php foreach ( $lines as $line ) :
			$posts = get_field( $line['key'], 'options' );
			if ( ! $posts ) {
				continue;
			}
			?>
			<ul class="<?php echo esc_attr( $line['class'] ); ?>">
				<?php if ( ! empty( $line['pad_start'] ) ) : ?>
					<li class="lc-bb__box lc-bb__box--spacer" aria-hidden="true"></li>
				<?php endif; ?>
				<?php $n = (int) $line['start']; foreach ( $posts as $tp ) :
					if ( ! ( $tp instanceof WP_Post ) ) {
						continue;
					}
					$is_active = ( (int) $tp->ID === (int) $current_id );
					$thumb_url = has_post_thumbnail( $tp->ID ) ? wp_get_attachment_image_url( get_post_thumbnail_id( $tp->ID ), 'medium' ) : '';
					$popup     = (string) get_field( 'popup_content', $tp->ID );
					?>
					<li class="lc-bb__box<?php echo $is_active ? ' is-active' : ''; ?>">
						<a class="lc-bb__trigger" href="#" data-target="lc-bb-popup-<?php echo (int) $tp->ID; ?>" title="<?php echo esc_attr( $tp->post_title ); ?>">
							<span class="lc-bb__num"><?php echo (int) $n; ?>.</span>
							<span class="lc-bb__label"><?php echo esc_html( $tp->post_title ); ?></span>
						</a>
						<div class="lc-bb__popup" id="lc-bb-popup-<?php echo (int) $tp->ID; ?>" hidden>
							<h2><?php echo (int) $n; ?>. <?php echo esc_html( $tp->post_title ); ?></h2>
							<?php if ( $thumb_url ) : ?>
								<div class="lc-bb__popup-img"><img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $tp->post_title ); ?>"></div>
							<?php endif; ?>
							<div class="lc-bb__popup-content"><?php echo wp_kses_post( $popup ); ?></div>
							<a class="lc-bb__more" href="<?php echo esc_url( get_permalink( $tp->ID ) ); ?>">Read more &rsaquo;</a>
						</div>
					</li>
					<?php $n++; endforeach; ?>
				<?php if ( ! empty( $line['pad_end'] ) ) : ?>
					<li class="lc-bb__box lc-bb__box--spacer" aria-hidden="true"></li>
				<?php endif; ?>
			</ul>
		<?php endforeach; ?>
		<?php
		$tagline = function_exists( 'get_field' ) ? (string) get_field( 'living_classroom_label', 'options' ) : '';
		if ( $tagline ) :
			?>
			<p class="lc-bb__tagline"><?php echo esc_html( $tagline ); ?></p>
		<?php endif; ?>
		</div>
		<p class="lc-bb__intro"><?php esc_html_e( 'Unlock the potential. Open the door to the living classroom.', 'livingclassroom-fse' ); ?></p>
	</div>
	<?php
	$html = ob_get_clean();
	// Strip inter-tag whitespace so wpautop / inline contexts do not insert <br>.
	$html = preg_replace( '/>\s+</', '><', $html );
	return $html;
} );

/* -------------------------------------------------------------------------
 * Breadcrumb helpers
 *
 * Ported from the classic theme; called from custom templates.
 * Output is unstyled HTML that style.css will theme.
 * ---------------------------------------------------------------------- */

if ( ! function_exists( 'lc_breadcrumb' ) ) {
	function lc_breadcrumb() {
		global $post;
		$home_url   = home_url( '/' );
		$home_label = __( 'Home', 'livingclassroom-fse' );
		echo '<nav class="lc-breadcrumb" aria-label="' . esc_attr__( 'Breadcrumb', 'livingclassroom-fse' ) . '"><div class="lc-breadcrumb__inner">';
		echo '<a href="' . esc_url( $home_url ) . '">' . esc_html( $home_label ) . '</a>';

		if ( is_page() && ! empty( $post->post_parent ) ) {
			$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
			foreach ( $ancestors as $aid ) {
				echo '<span class="lc-breadcrumb__sep" aria-hidden="true">/</span>';
				echo '<a href="' . esc_url( get_permalink( $aid ) ) . '">' . esc_html( get_the_title( $aid ) ) . '</a>';
			}
		}

		if ( is_singular() || is_page() ) {
			echo '<span class="lc-breadcrumb__sep" aria-hidden="true">/</span>';
			echo '<span class="lc-breadcrumb__current" aria-current="page">' . esc_html( get_the_title() ) . '</span>';
		} elseif ( is_search() ) {
			echo '<span class="lc-breadcrumb__sep" aria-hidden="true">/</span>';
			echo '<span class="lc-breadcrumb__current">' . esc_html__( 'Search results', 'livingclassroom-fse' ) . '</span>';
		} elseif ( is_archive() ) {
			echo '<span class="lc-breadcrumb__sep" aria-hidden="true">/</span>';
			echo '<span class="lc-breadcrumb__current">' . esc_html( get_the_archive_title() ) . '</span>';
		}

		echo '</div></nav>';
	}
}

/* -------------------------------------------------------------------------
 * Lock Site Editor for non-administrators
 *
 * Devs deploy template parts via the theme repo. Allowing content editors
 * to override them in the Site Editor creates a divergent DB copy that
 * silently overrides the file on next deploy. Restrict the Site Editor
 * to administrators.
 * ---------------------------------------------------------------------- */

add_filter( 'map_meta_cap', function ( $caps, $cap, $user_id ) {
	if ( in_array( $cap, array( 'edit_theme_options', 'customize' ), true ) ) {
		return $caps;
	}

	if ( in_array( $cap, array(
		'edit_template',
		'edit_template_part',
		'edit_user_template',
	), true ) ) {
		if ( ! user_can( $user_id, 'manage_options' ) ) {
			return array( 'do_not_allow' );
		}
	}

	return $caps;
}, 10, 3 );

/* -------------------------------------------------------------------------
 * Add page-template body classes so legacy CSS hooks still match
 * ---------------------------------------------------------------------- */

add_filter( 'body_class', function ( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'lc-page-home';
	}
	if ( is_singular( 'testimonial' ) ) {
		$classes[] = 'lc-page-testimonial';
	}
	return $classes;
} );
