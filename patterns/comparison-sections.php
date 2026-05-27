<?php
/**
 * Title: Comparison sections (expandable)
 * Slug: livingclassroom/comparison-sections
 * Categories: livingclassroom
 * Description: Two or more side-by-side expandable sections — use to compare PSW vs PN pathways, or "For Students / For Partners / For Residents" overviews on a single page. Built on native core/details so disclosure is keyboard-accessible and screen-reader correct without ARIA scaffolding.
 * Keywords: comparison, tabs, accordion, details, disclosure, pathways
 * Block Types: core/columns
 */
?>
<!-- wp:group {"className":"lc-comparison","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-comparison" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)">PSW or PN — which pathway is right for you?</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns is-stacked-on-mobile">

		<!-- wp:column {"className":"lc-comparison__column"} -->
		<div class="wp-block-column lc-comparison__column">
			<!-- wp:details {"className":"lc-comparison__details","showContent":true} -->
			<details class="wp-block-details lc-comparison__details" open>
				<summary>Personal Support Workers (PSW)</summary>

				<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"lineHeight":"1.55"}}} -->
				<p class="has-sm-font-size" style="line-height:1.55">PSWs are foundational members of the long-term care team. Beyond daily-living support, they're the primary observers of resident health and the champions of social and emotional well-being.</p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"fontSize":"sm"} -->
				<ul class="wp-block-list has-sm-font-size">
					<!-- wp:list-item -->
					<li>Direct support with daily activities</li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li>Observation + reporting on resident health</li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li>Workplace-ready from day one</li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

				<!-- wp:paragraph {"fontSize":"sm","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<p class="has-sm-font-size" style="margin-top:var(--wp--preset--spacing--30)"><a href="/for-students/" class="lc-comparison__link">Learn about the PSW pathway →</a></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"lc-comparison__column"} -->
		<div class="wp-block-column lc-comparison__column">
			<!-- wp:details {"className":"lc-comparison__details"} -->
			<details class="wp-block-details lc-comparison__details">
				<summary>Practical Nursing (PN)</summary>

				<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"lineHeight":"1.55"}}} -->
				<p class="has-sm-font-size" style="line-height:1.55">Practical Nursing students later become Registered Practical Nurses (RPNs), blending advanced clinical skills with interprofessional leadership across complex care settings.</p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"fontSize":"sm"} -->
				<ul class="wp-block-list has-sm-font-size">
					<!-- wp:list-item -->
					<li>Specialized medical treatments + assessments</li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li>Clinical leadership in care teams</li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li>Lasting relationships across long-term care</li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

				<!-- wp:paragraph {"fontSize":"sm","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<p class="has-sm-font-size" style="margin-top:var(--wp--preset--spacing--30)"><a href="/resources-pn/" class="lc-comparison__link">Learn about the PN pathway →</a></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
