<?php
/**
 * Title: Partner logos row
 * Slug: livingclassroom/partner-logos
 * Categories: livingclassroom
 * Description: Horizontal strip of partner organisation logos, greyscale by default and full colour on hover/focus. Every logo image MUST have alt text equal to the organisation's name — that's the link text screen readers will read.
 * Keywords: partners, logos, sponsors, trust, attribution
 * Block Types: core/group
 */
?>
<!-- wp:group {"className":"lc-partner-logos","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-partner-logos" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"eyebrow","textColor":"muted","style":{"typography":{"letterSpacing":"0.1em","textTransform":"uppercase","fontWeight":"700"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<h3 class="wp-block-heading has-text-align-center has-muted-color has-text-color has-eyebrow-font-size" style="margin-bottom:var(--wp--preset--spacing--50);font-weight:700;letter-spacing:0.1em;text-transform:uppercase">Our partners</h3>
	<!-- /wp:heading -->

	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center is-stacked-on-mobile">

		<!-- wp:column {"verticalAlignment":"center","className":"lc-partner-logos__col"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-partner-logos__col">
			<!-- wp:image {"sizeSlug":"medium","className":"lc-partner-logos__logo"} -->
			<figure class="wp-block-image size-medium lc-partner-logos__logo"><img src="" alt="Replace with partner organisation name"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"lc-partner-logos__col"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-partner-logos__col">
			<!-- wp:image {"sizeSlug":"medium","className":"lc-partner-logos__logo"} -->
			<figure class="wp-block-image size-medium lc-partner-logos__logo"><img src="" alt="Replace with partner organisation name"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"lc-partner-logos__col"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-partner-logos__col">
			<!-- wp:image {"sizeSlug":"medium","className":"lc-partner-logos__logo"} -->
			<figure class="wp-block-image size-medium lc-partner-logos__logo"><img src="" alt="Replace with partner organisation name"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"lc-partner-logos__col"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-partner-logos__col">
			<!-- wp:image {"sizeSlug":"medium","className":"lc-partner-logos__logo"} -->
			<figure class="wp-block-image size-medium lc-partner-logos__logo"><img src="" alt="Replace with partner organisation name"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
