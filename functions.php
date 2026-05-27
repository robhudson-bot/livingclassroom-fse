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
 * Block binding sources
 *
 * Usage in a block:
 *   {"metadata":{"bindings":{"content":{"source":"livingclassroom/option","args":{"key":"brand_address"}}}}}
 *
 * - livingclassroom/option:    reads a value from the ACF "options" page.
 *                              For image fields, pass args.format = url|id|alt.
 * - livingclassroom/acf-field: same but reads from the current post.
 * - livingclassroom/logo:      returns the footer-logo URL/alt/id with a
 *                              fallback to the site custom_logo when the
 *                              footer-specific image is empty. args.field = url|alt|id.
 * - livingclassroom/copyright: returns the localized copyright line built
 *                              from gmdate( 'Y' ) + brand_copyright_org.
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

			// ACF image field returns array; pick which sub-value to render.
			if ( is_array( $value ) ) {
				$format = isset( $source_args['format'] ) ? $source_args['format'] : 'url';
				if ( 'url' === $format && ! empty( $value['url'] ) ) {
					return (string) $value['url'];
				}
				if ( 'id' === $format && ! empty( $value['ID'] ) ) {
					return (string) $value['ID'];
				}
				if ( 'alt' === $format && isset( $value['alt'] ) ) {
					return (string) $value['alt'];
				}
				return '';
			}

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

	register_block_bindings_source( 'livingclassroom/logo', array(
		'label'              => __( 'Logo (variant with site-logo fallback)', 'livingclassroom-fse' ),
		'get_value_callback' => function ( $source_args ) {
			$variant = isset( $source_args['variant'] ) ? sanitize_key( $source_args['variant'] ) : 'footer';
			$field   = isset( $source_args['field'] ) ? sanitize_key( $source_args['field'] ) : 'url';

			// Step 1: try ACF variant-specific logo (e.g. brand_footer_logo).
			if ( function_exists( 'get_field' ) ) {
				$value = get_field( 'brand_' . $variant . '_logo', 'options' );
				if ( is_array( $value ) ) {
					if ( 'url' === $field && ! empty( $value['url'] ) ) return (string) $value['url'];
					if ( 'alt' === $field && isset( $value['alt'] ) )   return (string) $value['alt'];
					if ( 'id'  === $field && ! empty( $value['ID'] ) )  return (string) $value['ID'];
				}
			}

			// Step 2: fall back to Site Identity custom_logo.
			$logo_id = (int) get_theme_mod( 'custom_logo' );
			if ( $logo_id ) {
				if ( 'url' === $field ) {
					$src = wp_get_attachment_image_src( $logo_id, 'full' );
					return $src ? (string) $src[0] : '';
				}
				if ( 'alt' === $field ) {
					return (string) get_post_meta( $logo_id, '_wp_attachment_image_alt', true );
				}
				if ( 'id' === $field ) {
					return (string) $logo_id;
				}
			}
			return '';
		},
		'uses_context'       => array(),
	) );

	register_block_bindings_source( 'livingclassroom/tel', array(
		'label'              => __( 'Phone (clickable)', 'livingclassroom-fse' ),
		'get_value_callback' => function ( $source_args ) {
			if ( ! function_exists( 'get_field' ) ) {
				return '';
			}
			$key = isset( $source_args['key'] ) ? sanitize_key( $source_args['key'] ) : 'brand_phone';
			$phone = (string) get_field( $key, 'options' );
			if ( ! $phone ) {
				return '';
			}
			$digits = preg_replace( '/[^\d+]/', '', $phone );
			return sprintf(
				'<a href="tel:%1$s" class="lc-footer__link">%2$s</a>',
				esc_attr( $digits ),
				esc_html( $phone )
			);
		},
		'uses_context'       => array(),
	) );

	register_block_bindings_source( 'livingclassroom/mailto', array(
		'label'              => __( 'Email (clickable)', 'livingclassroom-fse' ),
		'get_value_callback' => function ( $source_args ) {
			if ( ! function_exists( 'get_field' ) ) {
				return '';
			}
			$key = isset( $source_args['key'] ) ? sanitize_key( $source_args['key'] ) : 'brand_email';
			$email = (string) get_field( $key, 'options' );
			if ( ! $email || ! is_email( $email ) ) {
				return '';
			}
			$class_raw = isset( $source_args['class'] ) ? (string) $source_args['class'] : 'lc-footer__link';
			$class     = implode( ' ', array_filter( array_map( 'sanitize_html_class', explode( ' ', $class_raw ) ) ) );
			return sprintf(
				'<a href="mailto:%1$s" class="%2$s">%1$s</a>',
				esc_attr( $email ),
				esc_attr( $class )
			);
		},
		'uses_context'       => array(),
	) );

	register_block_bindings_source( 'livingclassroom/link', array(
		'label'              => __( 'Linked label (from ACF)', 'livingclassroom-fse' ),
		'get_value_callback' => function ( $source_args ) {
			if ( ! function_exists( 'get_field' ) ) {
				return '';
			}
			$label_key = isset( $source_args['label_key'] ) ? sanitize_key( $source_args['label_key'] ) : '';
			$url_key   = isset( $source_args['url_key'] ) ? sanitize_key( $source_args['url_key'] ) : '';
			if ( ! $label_key || ! $url_key ) {
				return '';
			}
			$label = (string) get_field( $label_key, 'options' );
			$url   = (string) get_field( $url_key, 'options' );
			if ( ! $label ) {
				return '';
			}
			if ( ! $url ) {
				return esc_html( $label );
			}
			$class    = isset( $source_args['class'] ) ? sanitize_html_class( $source_args['class'] ) : 'lc-footer__link';
			$external = isset( $source_args['external'] ) && $source_args['external'];
			return sprintf(
				'<a href="%1$s" class="%2$s"%3$s>%4$s</a>',
				esc_url( $url ),
				esc_attr( $class ),
				$external ? ' target="_blank" rel="noopener"' : '',
				esc_html( $label )
			);
		},
		'uses_context'       => array(),
	) );

	register_block_bindings_source( 'livingclassroom/copyright', array(
		'label'              => __( 'Copyright line', 'livingclassroom-fse' ),
		'get_value_callback' => function () {
			$year = gmdate( 'Y' );
			$org  = function_exists( 'get_field' )
				? (string) get_field( 'brand_copyright_org', 'options' )
				: '';
			if ( ! $org ) {
				$org = 'Schlegel-UW Research Institute for Aging';
			}
			/* translators: 1: year, 2: organisation name */
			return sprintf(
				esc_html__( '© %1$s %2$s. All rights reserved.', 'livingclassroom-fse' ),
				esc_html( $year ),
				esc_html( $org )
			);
		},
		'uses_context'       => array(),
	) );
} );

/* -------------------------------------------------------------------------
 * ACF Options page: Brand & Footer Settings
 *
 * Registers a single Options page (under Appearance) holding every
 * brand-level content field that the footer template binds to. Code-
 * defined field group keeps the schema version-controlled; values still
 * live in wp_options and are editable in admin.
 *
 * For WPML/ACFML: text/textarea/email fields default to "Translate"
 * (per-language values) and URL/image fields default to "Copy" (shared).
 * Admins can override per field in WPML → ACFML settings.
 * ---------------------------------------------------------------------- */

add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_add_options_sub_page' ) || ! function_exists( 'acf_add_local_field_group' ) ) {
		return; // ACF Pro not active.
	}

	acf_add_options_sub_page( array(
		'page_title'  => __( 'Brand & Footer Settings', 'livingclassroom-fse' ),
		'menu_title'  => __( 'Brand & Footer', 'livingclassroom-fse' ),
		'menu_slug'   => 'brand-footer-settings',
		'parent_slug' => 'themes.php',
		'capability'  => 'manage_options',
		'position'    => 60,
	) );

	$default_land_ack = 'The Living Classroom programme is delivered across the traditional, ancestral, and treaty lands of Indigenous peoples throughout Ontario. We acknowledge the Anishinaabe, Haudenosaunee, and Attawandaron (Neutral) peoples on whose territory the RIA is located, and we commit to learning from Indigenous ways of knowing in long-term care.';

	acf_add_local_field_group( array(
		'key'                   => 'group_lc_brand_settings',
		'title'                 => __( 'Brand & Footer Settings', 'livingclassroom-fse' ),
		'description'           => __( 'Every field below is bound to the footer template part. Update once here, render everywhere.', 'livingclassroom-fse' ),
		'location'              => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'brand-footer-settings',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'fields'                => array(

			// Organisation block
			array( 'key' => 'field_lc_brand_org_legal_name', 'label' => __( 'Organisation legal name', 'livingclassroom-fse' ), 'name' => 'brand_org_legal_name', 'type' => 'text', 'default_value' => 'Schlegel-UW Research Institute for Aging', 'wrapper' => array( 'width' => '100' ) ),
			array( 'key' => 'field_lc_brand_address', 'label' => __( 'Mailing address', 'livingclassroom-fse' ), 'instructions' => __( 'Use new lines for visual line breaks (rendered as <br>).', 'livingclassroom-fse' ), 'name' => 'brand_address', 'type' => 'textarea', 'default_value' => "Schlegel-UW Research Institute for Aging\n250 Laurelwood Drive\nWaterloo, Ontario  N2J 0E2", 'new_lines' => 'br', 'rows' => 4 ),
			array( 'key' => 'field_lc_brand_phone', 'label' => __( 'Phone (display)', 'livingclassroom-fse' ), 'instructions' => __( 'Display format only — the tel: link is derived automatically.', 'livingclassroom-fse' ), 'name' => 'brand_phone', 'type' => 'text', 'default_value' => '519-904-0660', 'wrapper' => array( 'width' => '50' ) ),
			array( 'key' => 'field_lc_brand_email', 'label' => __( 'Email', 'livingclassroom-fse' ), 'name' => 'brand_email', 'type' => 'email', 'default_value' => 'livingclassroom@the-ria.ca', 'wrapper' => array( 'width' => '50' ) ),

			// Social URLs
			array( 'key' => 'field_lc_brand_social_facebook_url', 'label' => __( 'Facebook URL', 'livingclassroom-fse' ), 'name' => 'brand_social_facebook_url', 'type' => 'url', 'default_value' => 'https://www.facebook.com/SchlegelUWRIA/', 'wrapper' => array( 'width' => '33' ) ),
			array( 'key' => 'field_lc_brand_social_x_url', 'label' => __( 'X / Twitter URL', 'livingclassroom-fse' ), 'name' => 'brand_social_x_url', 'type' => 'url', 'default_value' => 'https://twitter.com/SchlegelUW_RIA', 'wrapper' => array( 'width' => '33' ) ),
			array( 'key' => 'field_lc_brand_social_linkedin_url', 'label' => __( 'LinkedIn URL', 'livingclassroom-fse' ), 'name' => 'brand_social_linkedin_url', 'type' => 'url', 'default_value' => 'https://www.linkedin.com/company/schlegel-uw-research-institute-for-aging/', 'wrapper' => array( 'width' => '33' ) ),

			// Partner attributions (label + URL pairs)
			array( 'key' => 'field_lc_brand_partner_funded_label', 'label' => __( 'Funded by — label', 'livingclassroom-fse' ), 'name' => 'brand_partner_funded_label', 'type' => 'text', 'default_value' => 'Ontario Ministry of Long-Term Care', 'wrapper' => array( 'width' => '50' ) ),
			array( 'key' => 'field_lc_brand_partner_funded_url', 'label' => __( 'Funded by — URL', 'livingclassroom-fse' ), 'name' => 'brand_partner_funded_url', 'type' => 'url', 'default_value' => 'https://www.ontario.ca/page/ministry-long-term-care', 'wrapper' => array( 'width' => '50' ) ),
			array( 'key' => 'field_lc_brand_partner_led_label', 'label' => __( 'Led by — label', 'livingclassroom-fse' ), 'name' => 'brand_partner_led_label', 'type' => 'text', 'default_value' => 'Schlegel-UW Research Institute for Aging (RIA)', 'wrapper' => array( 'width' => '50' ) ),
			array( 'key' => 'field_lc_brand_partner_led_url', 'label' => __( 'Led by — URL', 'livingclassroom-fse' ), 'name' => 'brand_partner_led_url', 'type' => 'url', 'default_value' => 'https://the-ria.ca/', 'wrapper' => array( 'width' => '50' ) ),
			array( 'key' => 'field_lc_brand_partner_with_label', 'label' => __( 'In partnership with — label', 'livingclassroom-fse' ), 'name' => 'brand_partner_with_label', 'type' => 'text', 'default_value' => 'CESBA — Adult & Continuing Education School Board Administrators', 'wrapper' => array( 'width' => '50' ) ),
			array( 'key' => 'field_lc_brand_partner_with_url', 'label' => __( 'In partnership with — URL', 'livingclassroom-fse' ), 'name' => 'brand_partner_with_url', 'type' => 'url', 'default_value' => 'https://cesba.com/', 'wrapper' => array( 'width' => '50' ) ),

			// Land acknowledgement
			array( 'key' => 'field_lc_brand_land_acknowledgement', 'label' => __( 'Land acknowledgement', 'livingclassroom-fse' ), 'name' => 'brand_land_acknowledgement', 'type' => 'textarea', 'default_value' => $default_land_ack, 'rows' => 6, 'new_lines' => '' ),

			// Copyright org
			array( 'key' => 'field_lc_brand_copyright_org', 'label' => __( 'Copyright organisation name', 'livingclassroom-fse' ), 'instructions' => __( 'Appears in the © line. Year is added automatically.', 'livingclassroom-fse' ), 'name' => 'brand_copyright_org', 'type' => 'text', 'default_value' => 'Schlegel-UW Research Institute for Aging' ),

			// Footer logo (image)
			array( 'key' => 'field_lc_brand_footer_logo', 'label' => __( 'Footer logo (optional)', 'livingclassroom-fse' ), 'instructions' => __( 'Upload a white/inverse variant of the logo for the dark footer. Leave empty to use the standard Site Identity logo.', 'livingclassroom-fse' ), 'name' => 'brand_footer_logo', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'mime_types' => 'png,jpg,jpeg,svg,webp' ),
		),
	) );
} );

/**
 * Helper for filters / non-block contexts: build the tel: URL from
 * the display phone, stripping anything that isn't a digit or "+".
 */
if ( ! function_exists( 'lc_brand_phone_href' ) ) {
	function lc_brand_phone_href() {
		$phone = function_exists( 'get_field' ) ? (string) get_field( 'brand_phone', 'options' ) : '';
		if ( ! $phone ) {
			return 'tel:519-904-0660';
		}
		$digits = preg_replace( '/[^\d+]/', '', $phone );
		return 'tel:' . $digits;
	}
}

/* -------------------------------------------------------------------------
 * One-time seed of Brand & Footer Settings
 *
 * ACF's default_value only populates the admin FORM; get_field() returns
 * empty until the row exists in wp_options. To make first-deploy render
 * the historical hardcoded values, we write the defaults to wp_options
 * once, gated by an "already seeded" flag.
 *
 * Idempotent: bumping the version constant re-runs the seed against any
 * fields that are still empty (existing values are never overwritten).
 * ---------------------------------------------------------------------- */

add_action( 'acf/init', function () {
	if ( ! function_exists( 'update_field' ) || ! function_exists( 'get_field' ) ) {
		return;
	}

	$seed_version = '2026-05-27.1';
	if ( get_option( 'lc_brand_settings_seeded' ) === $seed_version ) {
		return;
	}

	$defaults = array(
		'brand_org_legal_name'         => 'Schlegel-UW Research Institute for Aging',
		'brand_address'                => "Schlegel-UW Research Institute for Aging\n250 Laurelwood Drive\nWaterloo, Ontario  N2J 0E2",
		'brand_phone'                  => '519-904-0660',
		'brand_email'                  => 'livingclassroom@the-ria.ca',
		'brand_social_facebook_url'    => 'https://www.facebook.com/SchlegelUWRIA/',
		'brand_social_x_url'           => 'https://twitter.com/SchlegelUW_RIA',
		'brand_social_linkedin_url'    => 'https://www.linkedin.com/company/schlegel-uw-research-institute-for-aging/',
		'brand_partner_funded_label'   => 'Ontario Ministry of Long-Term Care',
		'brand_partner_funded_url'     => 'https://www.ontario.ca/page/ministry-long-term-care',
		'brand_partner_led_label'      => 'Schlegel-UW Research Institute for Aging (RIA)',
		'brand_partner_led_url'        => 'https://the-ria.ca/',
		'brand_partner_with_label'     => 'CESBA — Adult & Continuing Education School Board Administrators',
		'brand_partner_with_url'       => 'https://cesba.com/',
		'brand_land_acknowledgement'   => 'The Living Classroom programme is delivered across the traditional, ancestral, and treaty lands of Indigenous peoples throughout Ontario. We acknowledge the Anishinaabe, Haudenosaunee, and Attawandaron (Neutral) peoples on whose territory the RIA is located, and we commit to learning from Indigenous ways of knowing in long-term care.',
		'brand_copyright_org'          => 'Schlegel-UW Research Institute for Aging',
	);

	foreach ( $defaults as $key => $value ) {
		$existing = get_field( $key, 'options' );
		if ( '' === $existing || null === $existing || false === $existing ) {
			update_field( $key, $value, 'options' );
		}
	}

	update_option( 'lc_brand_settings_seeded', $seed_version );
}, 99 );

/* -------------------------------------------------------------------------
 * Substitute social-link URLs from ACF Brand & Footer Settings
 *
 * core/social-link doesn't expose its `url` attribute to block bindings, so
 * we swap it at parse time. This means ANY social-link in the template
 * (header, footer, anywhere) reads from the ACF options page based on its
 * service. Empty ACF value = original template URL is preserved.
 * ---------------------------------------------------------------------- */

add_filter( 'render_block_data', function ( $parsed_block ) {
	if ( empty( $parsed_block['blockName'] ) || 'core/social-link' !== $parsed_block['blockName'] ) {
		return $parsed_block;
	}
	if ( ! function_exists( 'get_field' ) ) {
		return $parsed_block;
	}
	$service = isset( $parsed_block['attrs']['service'] ) ? (string) $parsed_block['attrs']['service'] : '';
	$map = array(
		'facebook' => 'brand_social_facebook_url',
		'x'        => 'brand_social_x_url',
		'twitter'  => 'brand_social_x_url',
		'linkedin' => 'brand_social_linkedin_url',
	);
	if ( isset( $map[ $service ] ) ) {
		$url = (string) get_field( $map[ $service ], 'options' );
		if ( $url ) {
			$parsed_block['attrs']['url'] = $url;
		}
	}
	return $parsed_block;
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
