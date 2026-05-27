<?php
/**
 * Title: Featured news strip (1 large + 2 small)
 * Slug: livingclassroom/featured-news-strip
 * Categories: livingclassroom
 * Description: Top-of-news layout — one large hero card on the left, two stacked smaller cards on the right. Pulls latest posts via a single Query Loop; CSS makes the first card span both rows. Use at the top of /news-and-events/ or as a homepage news teaser.
 * Keywords: news, featured, posts, hero card, query loop
 * Block Types: core/query
 */
?>
<!-- wp:query {"className":"lc-featured-news","queryId":2,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"constrained"}} -->
<div class="wp-block-query lc-featured-news">

	<!-- wp:post-template {"className":"lc-featured-news__grid","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->

		<!-- wp:group {"className":"lc-featured-news__card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","color":"var:preset|color|primary-20","width":"1px"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
		<div class="wp-block-group lc-featured-news__card has-border-color has-surface-background-color has-background" style="border-color:var(--wp--preset--color--primary-20);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"border":{"radius":"6px"}}} /-->

			<!-- wp:post-date {"fontSize":"xs","textColor":"muted","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} /-->

			<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"700","lineHeight":"1.3"}},"fontSize":"lg"} /-->

			<!-- wp:post-excerpt {"fontSize":"sm","excerptLength":30,"moreText":"Read more →","showMoreOnNewLine":true,"style":{"typography":{"lineHeight":"1.55"}}} /-->
		</div>
		<!-- /wp:group -->

	<!-- /wp:post-template -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph {"align":"center","fontSize":"base"} -->
		<p class="has-text-align-center has-base-font-size">No news posts yet. Check back soon.</p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
