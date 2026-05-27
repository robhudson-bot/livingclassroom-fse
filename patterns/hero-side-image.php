<?php
/**
 * Title: Hero — text + side image
 * Slug: livingclassroom/hero-side-image
 * Categories: livingclassroom
 * Description: Equal-weight text and image laid side-by-side at the top of an explainer page (For Students / For Partners). Text column carries the H1; image stacks beneath text on mobile by default.
 * Keywords: hero, header, banner, side image, explainer
 * Block Types: core/columns
 */
?>
<!-- wp:group {"className":"lc-hero-side","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-hero-side" style="margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center is-stacked-on-mobile">

		<!-- wp:column {"verticalAlignment":"center","width":"55%","className":"lc-hero-side__text"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-hero-side__text" style="flex-basis:55%">
			<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"300"}}} -->
			<h1 class="wp-block-heading" style="font-weight:300">Replace with the page headline</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"base","style":{"typography":{"lineHeight":"1.55"}}} -->
			<p class="has-base-font-size" style="line-height:1.55">Two to three sentences setting up what this page is about and who it's for. Keep it conversational and concrete.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
				<!-- wp:button {"backgroundColor":"primary","textColor":"surface"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-surface-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Primary action</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%","className":"lc-hero-side__media"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-hero-side__media" style="flex-basis:45%">
			<!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"8px"}},"className":"lc-hero-side__image"} -->
			<figure class="wp-block-image size-large has-custom-border lc-hero-side__image"><img src="" alt="Replace with a description of the image content" style="border-radius:8px"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
