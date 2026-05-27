<?php
/**
 * Title: News grid (Query Loop)
 * Slug: livingclassroom/news-grid
 * Categories: livingclassroom
 * Description: Three-column paginated grid of news posts. Drop this into the /news-and-events/ page (or any archive surface). Pulls live post data via core/query so editors don't manage the list manually.
 * Keywords: news, blog, query loop, archive, posts, grid
 * Block Types: core/query
 */
?>
<!-- wp:query {"className":"lc-news-grid","queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"constrained"}} -->
<div class="wp-block-query lc-news-grid">

	<!-- wp:post-template {"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null},"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->

		<!-- wp:group {"className":"lc-news-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","color":"var:preset|color|primary-20","width":"1px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group lc-news-card has-border-color" style="border-color:var(--wp--preset--color--primary-20);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"border":{"radius":"6px"}}} /-->

			<!-- wp:post-date {"fontSize":"xs","textColor":"muted","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} /-->

			<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"700","lineHeight":"1.3"}},"fontSize":"lg"} /-->

			<!-- wp:post-excerpt {"fontSize":"sm","moreText":"Read more →","showMoreOnNewLine":true,"style":{"typography":{"lineHeight":"1.55"}}} /-->
		</div>
		<!-- /wp:group -->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph {"align":"center","fontSize":"base"} -->
		<p class="has-text-align-center has-base-font-size">No news posts yet. Check back soon.</p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
