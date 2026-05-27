<?php
/**
 * Title: Resource download card
 * Slug: livingclassroom/resource-download-card
 * Categories: livingclassroom
 * Description: Card for offering a downloadable resource (Implementation Guide PDF, programme handbook, application checklist). Includes title, short description, file-type badge, and download button. Use 1-3 stacked on the Implementation Guide page.
 * Keywords: download, resource, pdf, guide, file
 * Block Types: core/group
 */
?>
<!-- wp:group {"className":"lc-resource-card","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","color":"var:preset|color|primary-20","width":"1px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-resource-card has-border-color has-surface-background-color has-background" style="border-color:var(--wp--preset--color--primary-20);border-width:1px;border-radius:8px;margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center is-stacked-on-mobile">

		<!-- wp:column {"verticalAlignment":"center","width":"72px","className":"lc-resource-card__icon-col"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-resource-card__icon-col" style="flex-basis:72px">
			<!-- wp:lc/icon {"iconName":"file-text","size":36,"className":"lc-resource-card__icon"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"lc-resource-card__body"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-resource-card__body">
			<!-- wp:paragraph {"fontSize":"eyebrow","textColor":"muted","className":"lc-resource-card__type","style":{"typography":{"letterSpacing":"0.1em","textTransform":"uppercase","fontWeight":"700"}}} -->
			<p class="lc-resource-card__type has-muted-color has-text-color has-eyebrow-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase">PDF · 12 pages</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"lg","style":{"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} -->
			<h3 class="wp-block-heading has-lg-font-size" style="margin-top:var(--wp--preset--spacing--10);margin-bottom:var(--wp--preset--spacing--10)">Implementation Guide</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"lineHeight":"1.55"}}} -->
			<p class="has-sm-font-size" style="line-height:1.55">Step-by-step setup, roles, faculty training expectations, and a sample first-cohort timeline for new Living Classroom partnerships.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"180px","className":"lc-resource-card__action"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-resource-card__action" style="flex-basis:180px">
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"flex-end"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"primary","textColor":"surface","style":{"typography":{"fontWeight":"700"}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-surface-color has-primary-background-color has-text-color has-background wp-element-button" href="#replace-with-pdf-url" download style="font-weight:700">Download</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
