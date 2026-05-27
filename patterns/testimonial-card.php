<?php
/**
 * Title: Testimonial card (single quote)
 * Slug: livingclassroom/testimonial-card
 * Categories: livingclassroom
 * Description: Pull-quote panel with avatar, name, role, and Living Classroom location. Use inline in content to break up long-form text with a real voice.
 * Keywords: testimonial, quote, story, voice, student, partner
 * Block Types: core/group
 */
$placeholder = esc_url( get_theme_file_uri( 'assets/img/placeholder-square.svg' ) );
?>
<!-- wp:group {"className":"lc-testimonial","backgroundColor":"panel","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|60","right":"var:preset|spacing|60"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}},"border":{"left":{"color":"var:preset|color|secondary","width":"6px","style":"solid"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-testimonial has-panel-background-color has-background" style="border-left-color:var(--wp--preset--color--secondary);border-left-style:solid;border-left-width:6px;margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:quote {"className":"lc-testimonial__quote"} -->
	<blockquote class="wp-block-quote lc-testimonial__quote">
		<!-- wp:paragraph {"fontSize":"base","style":{"typography":{"fontStyle":"italic","lineHeight":"1.55"}}} -->
		<p class="has-base-font-size" style="font-style:italic;line-height:1.55">Working with Sunnyside has been amazing. Living Classroom life was a beautiful experience, something truly new and special. It was the first time learning didn't feel limited to books or walls.</p>
		<!-- /wp:paragraph -->
	</blockquote>
	<!-- /wp:quote -->

	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"className":"lc-testimonial__attribution","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center lc-testimonial__attribution" style="margin-top:var(--wp--preset--spacing--40)">

		<!-- wp:column {"verticalAlignment":"center","width":"64px","className":"lc-testimonial__avatar-col"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-testimonial__avatar-col" style="flex-basis:64px">
			<!-- wp:image {"width":"64px","height":"64px","sizeSlug":"thumbnail","style":{"border":{"radius":"50%"}},"className":"lc-testimonial__avatar"} -->
			<figure class="wp-block-image size-thumbnail is-resized has-custom-border lc-testimonial__avatar"><img src="<?php echo $placeholder; ?>" alt="" style="border-radius:50%;width:64px;height:64px;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"lc-testimonial__meta-col"} -->
		<div class="wp-block-column is-vertically-aligned-center lc-testimonial__meta-col">
			<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontWeight":"600","lineHeight":"1.3"}},"className":"lc-testimonial__name"} -->
			<p class="lc-testimonial__name has-sm-font-size" style="font-weight:600;line-height:1.3">Student name</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"xs","textColor":"muted","className":"lc-testimonial__role"} -->
			<p class="lc-testimonial__role has-muted-color has-text-color has-xs-font-size">PSW Student · Sunnyside Home — WCDSB Living Classroom</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
