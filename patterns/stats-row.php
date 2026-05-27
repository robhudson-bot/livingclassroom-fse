<?php
/**
 * Title: Stats row (4 metrics)
 * Slug: livingclassroom/stats-row
 * Categories: livingclassroom
 * Description: Four large numbers + labels on a dark anchor background — programme reach, partner counts, students trained, regions served. Numbers are paragraphs (visual emphasis only), so they don't pollute the document outline.
 * Keywords: stats, numbers, reach, trust, metrics
 * Block Types: core/group
 */
?>
<!-- wp:group {"tagName":"section","className":"lc-stats-row","backgroundColor":"anchor","textColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group lc-stats-row has-surface-color has-anchor-background-color has-text-color has-background" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--40)">

	<!-- wp:columns {"isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns is-stacked-on-mobile">

		<!-- wp:column {"className":"lc-stats-row__stat"} -->
		<div class="wp-block-column lc-stats-row__stat">
			<!-- wp:paragraph {"align":"center","fontSize":"xxxl","textColor":"secondary","className":"lc-stats-row__num","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
			<p class="lc-stats-row__num has-text-align-center has-secondary-color has-text-color has-xxxl-font-size" style="font-weight:700;line-height:1">150+</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"sm","className":"lc-stats-row__label"} -->
			<p class="lc-stats-row__label has-text-align-center has-sm-font-size">Living Classrooms</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"lc-stats-row__stat"} -->
		<div class="wp-block-column lc-stats-row__stat">
			<!-- wp:paragraph {"align":"center","fontSize":"xxxl","textColor":"secondary","className":"lc-stats-row__num","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
			<p class="lc-stats-row__num has-text-align-center has-secondary-color has-text-color has-xxxl-font-size" style="font-weight:700;line-height:1">14</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"sm","className":"lc-stats-row__label"} -->
			<p class="lc-stats-row__label has-text-align-center has-sm-font-size">Ontario health regions</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"lc-stats-row__stat"} -->
		<div class="wp-block-column lc-stats-row__stat">
			<!-- wp:paragraph {"align":"center","fontSize":"xxxl","textColor":"secondary","className":"lc-stats-row__num","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
			<p class="lc-stats-row__num has-text-align-center has-secondary-color has-text-color has-xxxl-font-size" style="font-weight:700;line-height:1">7</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"sm","className":"lc-stats-row__label"} -->
			<p class="lc-stats-row__label has-text-align-center has-sm-font-size">Partner types</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"lc-stats-row__stat"} -->
		<div class="wp-block-column lc-stats-row__stat">
			<!-- wp:paragraph {"align":"center","fontSize":"xxxl","textColor":"secondary","className":"lc-stats-row__num","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
			<p class="lc-stats-row__num has-text-align-center has-secondary-color has-text-color has-xxxl-font-size" style="font-weight:700;line-height:1">5,000+</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"sm","className":"lc-stats-row__label"} -->
			<p class="lc-stats-row__label has-text-align-center has-sm-font-size">Students trained since 2009</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
