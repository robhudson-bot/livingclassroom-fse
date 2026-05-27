<?php
/**
 * Title: Apply for funding banner (gold accent)
 * Slug: livingclassroom/apply-funding-banner
 * Categories: livingclassroom
 * Description: Gold-accent funding banner — the primary "Apply for funding" ask, designed to break up long content on partner-facing pages without competing with the soft cta-card. Use one per page, max.
 * Keywords: funding, apply, cta, banner, gold
 * Block Types: core/group
 */
?>
<!-- wp:group {"tagName":"section","className":"lc-apply-banner","backgroundColor":"secondary","textColor":"anchor","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group lc-apply-banner has-anchor-color has-secondary-background-color has-text-color has-background" style="border-radius:8px;margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center is-stacked-on-mobile">

		<!-- wp:column {"verticalAlignment":"center","width":"65%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:heading {"level":2,"textColor":"anchor","style":{"typography":{"fontWeight":"700"}}} -->
			<h2 class="wp-block-heading has-anchor-color has-text-color" style="font-weight:700">Apply for Living Classroom funding</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"base","textColor":"anchor","style":{"typography":{"lineHeight":"1.5"}}} -->
			<p class="has-anchor-color has-text-color has-base-font-size" style="line-height:1.5">Long-term care homes and educational institutions can apply for funding to establish or refresh a Living Classroom partnership. Applications open in funding waves throughout the year.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"flex-end","flexWrap":"wrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"anchor","textColor":"surface","style":{"typography":{"fontWeight":"700"}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-surface-color has-anchor-background-color has-text-color has-background wp-element-button" href="/fund-application-info/" style="font-weight:700">Apply for funding</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
