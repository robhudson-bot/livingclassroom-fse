<?php
/**
 * Title: News teaser card
 * Slug: livingclassroom/news-teaser-card
 * Categories: livingclassroom
 * Description: One news/blog post card with 16:9 thumbnail, date|category meta, title link, and excerpt. Drop into pages where you want to feature a single post.
 * Keywords: news, blog, teaser, card, post
 * Block Types: core/group
 */
?>
<!-- wp:group {"className":"lc-news-card lc-news-card--standalone","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","width":"1px","color":"var:preset|color|primary-20"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-news-card lc-news-card--standalone" style="border-color:var(--wp--preset--color--primary-20);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"6px"}}} -->
	<figure class="wp-block-image size-large has-custom-border"><img src="" alt="" style="border-radius:6px"/></figure>
	<!-- /wp:image -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"textColor":"muted","fontSize":"xs"} -->
	<div class="wp-block-group has-muted-color has-text-color has-xs-font-size">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.05em","fontWeight":"700"}}} -->
		<p style="font-weight:700;letter-spacing:0.05em;text-transform:uppercase">Replace date</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph -->
		<p>|</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.05em","fontWeight":"700"}}} -->
		<p style="font-weight:700;letter-spacing:0.05em;text-transform:uppercase">Category</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><a href="#">Replace with the post title</a></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>One- or two-sentence summary of the post. Keep it under 30 words so the card stays tidy.</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
	<p style="font-weight:700"><a href="#">Continue reading &rarr;</a></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
