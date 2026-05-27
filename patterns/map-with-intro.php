<?php
/**
 * Title: Map + intro (Champlain Map)
 * Slug: livingclassroom/map-with-intro
 * Categories: livingclassroom
 * Description: Intro heading + paragraph + Champlain Map embed via the [cmp-map] shortcode + a small footnote underneath. Designed for the locations / educators page. Replace the [cmp-map] shortcode arguments with the correct map ID for the page.
 * Keywords: map, locations, champlain, embed, find
 * Block Types: core/group
 */
?>
<!-- wp:group {"className":"lc-map-intro","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-map-intro" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center">Find a Living Classroom near you</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"base","style":{"typography":{"lineHeight":"1.55"}}} -->
	<p class="has-text-align-center has-base-font-size" style="line-height:1.55">Living Classrooms operate across every health region in Ontario. Use the map below to find a partner site, an educator listing, or the closest programme to your community.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"lc-map-intro__map","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group lc-map-intro__map" style="border-radius:8px;margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:shortcode -->
		[cmp-map]
		<!-- /wp:shortcode -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"align":"center","fontSize":"xs","textColor":"muted","style":{"typography":{"fontStyle":"italic"}}} -->
	<p class="has-text-align-center has-muted-color has-text-color has-xs-font-size" style="font-style:italic">Hover or tap a marker to see the partner institution and programme details. New locations are added each funding wave.</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
