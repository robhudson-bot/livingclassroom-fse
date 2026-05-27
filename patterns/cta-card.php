<?php
/**
 * Title: CTA card (single button)
 * Slug: livingclassroom/cta-card
 * Categories: livingclassroom
 * Description: Mid-page nudge — large heading, one paragraph, one button on a soft gold-tinted background. Use sparingly; pair with content that needs a single clear next step. Button text must describe the action ("Apply for funding"), not "Click here".
 * Keywords: cta, call to action, button, single button, apply
 * Block Types: core/group
 */
?>
<!-- wp:group {"className":"lc-cta-card","backgroundColor":"secondary-10","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|60","right":"var:preset|spacing|60"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-cta-card has-secondary-10-background-color has-background" style="border-radius:8px;margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"textAlign":"center","level":2,"textColor":"anchor"} -->
	<h2 class="wp-block-heading has-text-align-center has-anchor-color has-text-color">Ready to apply for funding?</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"base","textColor":"anchor","style":{"typography":{"lineHeight":"1.5"}}} -->
	<p class="has-text-align-center has-anchor-color has-text-color has-base-font-size" style="line-height:1.5">Applications for the next wave of funding open in the fall. Submit your expression of interest now to be notified as soon as the window opens.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"primary","textColor":"surface"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-surface-color has-primary-background-color has-text-color has-background wp-element-button" href="/fund-application-info/">Apply for funding</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
