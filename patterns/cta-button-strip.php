<?php
/**
 * Title: Call-to-action — button strip
 * Slug: livingclassroom/cta-button-strip
 * Categories: livingclassroom
 * Description: Centered CTA panel: short headline, sentence of context, then a gold primary button and a teal text link. Use to close a content section.
 * Keywords: cta, call to action, button, donate, contact
 * Block Types: core/group
 */
?>
<!-- wp:group {"className":"lc-cta-strip","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px"}},"backgroundColor":"primary-10","layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-cta-strip has-primary-10-background-color has-background" style="border-radius:8px;margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center">Ready to bring the Living Classroom to your community?</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"base"} -->
	<p class="has-text-align-center has-base-font-size">Replace with one sentence about the next step you want the reader to take.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"secondary","textColor":"anchor"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-anchor-color has-secondary-background-color has-text-color has-background wp-element-button" href="/contact-us-2/">Contact us</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"is-style-outline","textColor":"primary"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-primary-color has-text-color wp-element-button" href="/about-us-2026/">Learn more</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
