<?php
/**
 * Title: FAQ — accordion
 * Slug: livingclassroom/faq-accordion
 * Categories: livingclassroom
 * Description: Q/A list using native <details>/<summary>. No JavaScript, AODA-clean. Insert above the page content so search engines see the question text.
 * Keywords: faq, accordion, questions, answers
 * Block Types: core/group
 */
?>
<!-- wp:group {"className":"lc-faq","layout":{"type":"constrained"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-group lc-faq" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading">Frequently asked questions</h2>
	<!-- /wp:heading -->

	<!-- wp:html -->
	<details class="lc-faq__item">
		<summary>What is the Living Classroom?</summary>
		<div class="lc-faq__body"><p>Replace with the answer to this question.</p></div>
	</details>
	<details class="lc-faq__item">
		<summary>Who can take part?</summary>
		<div class="lc-faq__body"><p>Replace with the answer to this question.</p></div>
	</details>
	<details class="lc-faq__item">
		<summary>How do I get started?</summary>
		<div class="lc-faq__body"><p>Replace with the answer to this question.</p></div>
	</details>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
