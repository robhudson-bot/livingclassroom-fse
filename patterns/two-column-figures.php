<?php
/**
 * Title: Two-column figure pair
 * Slug: livingclassroom/two-column-figures
 * Categories: livingclassroom
 * Description: Side-by-side image + caption columns. Matches the PSW/PN pattern on the homepage and the persona-page class-photo pairs.
 * Keywords: figures, two column, students, photos
 * Block Types: core/columns
 */
?>
<!-- wp:columns {"isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns is-stacked-on-mobile" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"8px"}}} -->
		<figure class="wp-block-image size-large has-custom-border"><img src="" alt="" style="border-radius:8px"/></figure>
		<!-- /wp:image -->
		<!-- wp:heading {"level":3,"textAlign":"center"} -->
		<h3 class="wp-block-heading has-text-align-center">First column heading</h3>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">One- to two-sentence description.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"8px"}}} -->
		<figure class="wp-block-image size-large has-custom-border"><img src="" alt="" style="border-radius:8px"/></figure>
		<!-- /wp:image -->
		<!-- wp:heading {"level":3,"textAlign":"center"} -->
		<h3 class="wp-block-heading has-text-align-center">Second column heading</h3>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">One- to two-sentence description.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
