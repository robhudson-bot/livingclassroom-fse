<?php
/**
 * Title: Media + text — alternating
 * Slug: livingclassroom/media-text-alternating
 * Categories: livingclassroom
 * Description: Three image+text rows with alternating media position — left, right, left. Use for long-scroll storytelling pages (About, How LC works, Programme journeys). Each row carries its own H2, paragraph, and optional CTA so search engines see real structure, not just a wall of images.
 * Keywords: media text, alternating, story, scroll, journey
 * Block Types: core/group
 */
$placeholder = esc_url( get_theme_file_uri( 'assets/img/placeholder-landscape.svg' ) );
?>
<!-- wp:group {"className":"lc-media-text-alt","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-media-text-alt" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:media-text {"mediaPosition":"left","mediaWidth":50,"isStackedOnMobile":true,"mediaUrl":"<?php echo $placeholder; ?>","className":"lc-media-text-alt__row"} -->
	<div class="wp-block-media-text alignwide is-stacked-on-mobile lc-media-text-alt__row" style="grid-template-columns:50% auto"><figure class="wp-block-media-text__media"><img src="<?php echo $placeholder; ?>" alt="Replace with a description of the image content"/></figure><div class="wp-block-media-text__content">
		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"300"}}} -->
		<h2 class="wp-block-heading" style="font-weight:300">A real classroom, with real residents</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"fontSize":"base","style":{"typography":{"lineHeight":"1.55"}}} -->
		<p class="has-base-font-size" style="line-height:1.55">Students don't just study long-term care — they live in it. Each Living Classroom embeds learning inside a working home, so practice and care happen at the same table, every day.</p>
		<!-- /wp:paragraph -->
	</div></div>
	<!-- /wp:media-text -->

	<!-- wp:media-text {"mediaPosition":"right","mediaWidth":50,"isStackedOnMobile":true,"mediaUrl":"<?php echo $placeholder; ?>","className":"lc-media-text-alt__row"} -->
	<div class="wp-block-media-text has-media-on-the-right alignwide is-stacked-on-mobile lc-media-text-alt__row" style="grid-template-columns:auto 50%"><div class="wp-block-media-text__content">
		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"300"}}} -->
		<h2 class="wp-block-heading" style="font-weight:300">Built for the partnership in front of you</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"fontSize":"base","style":{"typography":{"lineHeight":"1.55"}}} -->
		<p class="has-base-font-size" style="line-height:1.55">No two Living Classrooms look the same. We work alongside each LTC home, college, school board, and Indigenous institute to shape a model that fits the residents, the students, and the community.</p>
		<!-- /wp:paragraph -->
	</div><figure class="wp-block-media-text__media"><img src="<?php echo $placeholder; ?>" alt="Replace with a description of the image content"/></figure></div>
	<!-- /wp:media-text -->

	<!-- wp:media-text {"mediaPosition":"left","mediaWidth":50,"isStackedOnMobile":true,"mediaUrl":"<?php echo $placeholder; ?>","className":"lc-media-text-alt__row"} -->
	<div class="wp-block-media-text alignwide is-stacked-on-mobile lc-media-text-alt__row" style="grid-template-columns:50% auto"><figure class="wp-block-media-text__media"><img src="<?php echo $placeholder; ?>" alt="Replace with a description of the image content"/></figure><div class="wp-block-media-text__content">
		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"300"}}} -->
		<h2 class="wp-block-heading" style="font-weight:300">Graduates ready on day one</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"fontSize":"base","style":{"typography":{"lineHeight":"1.55"}}} -->
		<p class="has-base-font-size" style="line-height:1.55">Living Classroom graduates step into PSW and PN roles already fluent in long-term care — confident with residents, comfortable in care teams, and prepared for the realities of the work.</p>
		<!-- /wp:paragraph -->
	</div></div>
	<!-- /wp:media-text -->
</div>
<!-- /wp:group -->
