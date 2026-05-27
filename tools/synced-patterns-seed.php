<?php
/**
 * One-shot seed for LC synced patterns. Idempotent: re-running on the same
 * site is a no-op if the slugs already exist. Designed to be run via
 * `wp eval-file lc-synced-patterns-seed.php`.
 */

$patterns = array(
	'lc-funder-attribution-row' => array(
		'title' => 'LC Funder Attribution Row',
		'content' => <<<'BLOCK'
<!-- wp:columns {"className":"lc-funder-row","isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns is-stacked-on-mobile lc-funder-row">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:paragraph {"fontSize":"xs","className":"lc-funder-row__label"} -->
		<p class="lc-funder-row__label has-xs-font-size">Funded by</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"}},"metadata":{"bindings":{"content":{"source":"livingclassroom/link","args":{"label_key":"brand_partner_funded_label","url_key":"brand_partner_funded_url","class":"lc-footer__link","external":true}}}}} -->
		<p class="has-sm-font-size" style="font-weight:600;line-height:1.4"></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:paragraph {"fontSize":"xs","className":"lc-funder-row__label"} -->
		<p class="lc-funder-row__label has-xs-font-size">Led by</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"}},"metadata":{"bindings":{"content":{"source":"livingclassroom/link","args":{"label_key":"brand_partner_led_label","url_key":"brand_partner_led_url","class":"lc-footer__link","external":true}}}}} -->
		<p class="has-sm-font-size" style="font-weight:600;line-height:1.4"></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:paragraph {"fontSize":"xs","className":"lc-funder-row__label"} -->
		<p class="lc-funder-row__label has-xs-font-size">In partnership with</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"}},"metadata":{"bindings":{"content":{"source":"livingclassroom/link","args":{"label_key":"brand_partner_with_label","url_key":"brand_partner_with_url","class":"lc-footer__link","external":true}}}}} -->
		<p class="has-sm-font-size" style="font-weight:600;line-height:1.4"></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
BLOCK,
	),
	'lc-programme-tagline' => array(
		'title' => 'LC Programme Tagline',
		'content' => <<<'BLOCK'
<!-- wp:paragraph {"align":"center","fontSize":"lg","textColor":"anchor","style":{"typography":{"fontStyle":"italic","lineHeight":"1.4"}},"className":"lc-programme-tagline"} -->
<p class="lc-programme-tagline has-text-align-center has-anchor-color has-text-color has-lg-font-size" style="font-style:italic;line-height:1.4">Unlock the potential. Open the door to the Living Classroom.</p>
<!-- /wp:paragraph -->
BLOCK,
	),
);

foreach ( $patterns as $slug => $data ) {
	$existing = get_page_by_path( $slug, OBJECT, 'wp_block' );
	if ( $existing ) {
		printf( "Already exists: %s (ID %d)\n", $slug, $existing->ID );
		continue;
	}

	$post_id = wp_insert_post( array(
		'post_type'    => 'wp_block',
		'post_status'  => 'publish',
		'post_title'   => $data['title'],
		'post_name'    => $slug,
		'post_content' => $data['content'],
	), true );

	if ( is_wp_error( $post_id ) ) {
		printf( "ERROR creating %s: %s\n", $slug, $post_id->get_error_message() );
	} else {
		printf( "Created %s as wp_block ID %d\n", $slug, $post_id );
	}
}
