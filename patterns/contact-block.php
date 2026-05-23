<?php
/**
 * Title: Contact block
 * Slug: livingclassroom/contact-block
 * Categories: livingclassroom
 * Description: Address + phone + email panel. Convert to a synced pattern after first insertion so updates propagate site-wide.
 * Keywords: contact, address, phone, email
 * Block Types: core/group
 */
?>
<!-- wp:group {"className":"lc-contact-block","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","width":"1px","color":"var:preset|color|primary-20"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-contact-block" style="border-color:var(--wp--preset--color--primary-20);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">Contact us</h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Schlegel-UW Research Institute for Aging<br>250 Laurelwood Drive<br>Waterloo, Ontario N2J 0E2</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><strong>Phone:</strong> <a href="tel:519-904-0660">519-904-0660</a></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><strong>Email:</strong> <a href="mailto:livingclassroom@the-ria.ca">livingclassroom@the-ria.ca</a></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
