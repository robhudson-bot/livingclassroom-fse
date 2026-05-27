<?php
/**
 * Title: Feature grid (4 icon cards)
 * Slug: livingclassroom/feature-grid
 * Categories: livingclassroom
 * Description: Four-up grid of lucide icon + heading + body — use to introduce the pillars or benefits of a programme. Icons are decorative; the heading carries the meaning.
 * Keywords: features, benefits, icons, grid, pillars
 * Block Types: core/columns
 */
?>
<!-- wp:columns {"className":"lc-feature-grid","isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns is-stacked-on-mobile lc-feature-grid" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:column {"className":"lc-feature-grid__card"} -->
	<div class="wp-block-column lc-feature-grid__card">
		<!-- wp:lc/icon {"iconName":"sparkles","size":40,"className":"lc-feature-grid__icon"} /-->

		<!-- wp:heading {"level":3,"className":"lc-feature-grid__title"} -->
		<h3 class="wp-block-heading lc-feature-grid__title">Immersive environment</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"sm","className":"lc-feature-grid__body"} -->
		<p class="lc-feature-grid__body has-sm-font-size">Students learn in a real long-term care home — applying skills with residents, families, and care teams every day.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"className":"lc-feature-grid__card"} -->
	<div class="wp-block-column lc-feature-grid__card">
		<!-- wp:lc/icon {"iconName":"users-round","size":40,"className":"lc-feature-grid__icon"} /-->

		<!-- wp:heading {"level":3,"className":"lc-feature-grid__title"} -->
		<h3 class="wp-block-heading lc-feature-grid__title">Team-based culture</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"sm","className":"lc-feature-grid__body"} -->
		<p class="lc-feature-grid__body has-sm-font-size">Faculty, residents, families, and the LTC team all shape the learning. Students become part of a working community, not visitors.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"className":"lc-feature-grid__card"} -->
	<div class="wp-block-column lc-feature-grid__card">
		<!-- wp:lc/icon {"iconName":"shield-check","size":40,"className":"lc-feature-grid__icon"} /-->

		<!-- wp:heading {"level":3,"className":"lc-feature-grid__title"} -->
		<h3 class="wp-block-heading lc-feature-grid__title">Workforce-ready</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"sm","className":"lc-feature-grid__body"} -->
		<p class="lc-feature-grid__body has-sm-font-size">Graduates step into long-term care roles with confidence and clinical fluency from day one.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"className":"lc-feature-grid__card"} -->
	<div class="wp-block-column lc-feature-grid__card">
		<!-- wp:lc/icon {"iconName":"lightbulb","size":40,"className":"lc-feature-grid__icon"} /-->

		<!-- wp:heading {"level":3,"className":"lc-feature-grid__title"} -->
		<h3 class="wp-block-heading lc-feature-grid__title">Innovation in care</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"sm","className":"lc-feature-grid__body"} -->
		<p class="lc-feature-grid__body has-sm-font-size">Each Living Classroom adapts to the home and community it serves — testing new approaches that improve resident quality of life.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
