<?php
/**
 * Living Classroom FSE - Theme Functions
 *
 * Minimal functions.php -- most configuration lives in theme.json.
 * Only register patterns, enqueue supplementary styles, and add
 * features that can't be expressed in theme.json.
 *
 * @package livingclassroom-fse
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue theme styles.
 */
function lc_fse_enqueue_styles() {
    wp_enqueue_style(
        'livingclassroom-fse-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'lc_fse_enqueue_styles' );

/**
 * Register block pattern categories.
 */
function lc_fse_register_pattern_categories() {
    register_block_pattern_category( 'livingclassroom', array(
        'label' => __( 'Living Classroom', 'livingclassroom-fse' ),
    ) );
}
add_action( 'init', 'lc_fse_register_pattern_categories' );
