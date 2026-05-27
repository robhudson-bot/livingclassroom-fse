<?php
/**
 * Title: Testimonial spotlight (3-up)
 * Slug: livingclassroom/testimonial-spotlight
 * Categories: livingclassroom
 * Description: Three compact testimonial cards in a row — partner-stories style proof-stacking for About and For-Partners pages. Stacks vertically on mobile. Each card carries its own quote, name, and LC location; replace the placeholder content with real testimonials from the testimonial custom post type.
 * Keywords: testimonials, quotes, spotlight, proof, partners
 * Block Types: core/group
 */
$placeholder = esc_url( get_theme_file_uri( 'assets/img/placeholder-square.svg' ) );
?>
<!-- wp:group {"className":"lc-testimonial-spotlight","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group lc-testimonial-spotlight" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)">Voices from the Living Classroom</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns is-stacked-on-mobile">

		<!-- wp:column {"className":"lc-testimonial-spotlight__col"} -->
		<div class="wp-block-column lc-testimonial-spotlight__col">
			<!-- wp:group {"className":"lc-testimonial-spotlight__card","backgroundColor":"panel","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"left":{"color":"var:preset|color|secondary","width":"4px","style":"solid"},"radius":"4px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group lc-testimonial-spotlight__card has-panel-background-color has-background" style="border-left-color:var(--wp--preset--color--secondary);border-left-style:solid;border-left-width:4px;border-radius:4px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontStyle":"italic","lineHeight":"1.55"}}} -->
				<p class="has-sm-font-size" style="font-style:italic;line-height:1.55">"Every moment was alive with curiosity, laughter, and discovery. We weren't just listening or memorizing; we were learning by doing."</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<p class="has-sm-font-size" style="margin-top:var(--wp--preset--spacing--30);font-weight:600;line-height:1.3">PSW Student</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"xs","textColor":"muted"} -->
				<p class="has-muted-color has-text-color has-xs-font-size">Sunnyside Home — WCDSB Living Classroom</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"lc-testimonial-spotlight__col"} -->
		<div class="wp-block-column lc-testimonial-spotlight__col">
			<!-- wp:group {"className":"lc-testimonial-spotlight__card","backgroundColor":"panel","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"left":{"color":"var:preset|color|secondary","width":"4px","style":"solid"},"radius":"4px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group lc-testimonial-spotlight__card has-panel-background-color has-background" style="border-left-color:var(--wp--preset--color--secondary);border-left-style:solid;border-left-width:4px;border-radius:4px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontStyle":"italic","lineHeight":"1.55"}}} -->
				<p class="has-sm-font-size" style="font-style:italic;line-height:1.55">"The Living Classroom turned long-term care from a placement into a programme. Our students now graduate workplace-ready in ways we couldn't deliver before."</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<p class="has-sm-font-size" style="margin-top:var(--wp--preset--spacing--30);font-weight:600;line-height:1.3">PSW Programme Coordinator</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"xs","textColor":"muted"} -->
				<p class="has-muted-color has-text-color has-xs-font-size">Loyalist College — H.J. McFarland Memorial Home</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"lc-testimonial-spotlight__col"} -->
		<div class="wp-block-column lc-testimonial-spotlight__col">
			<!-- wp:group {"className":"lc-testimonial-spotlight__card","backgroundColor":"panel","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"left":{"color":"var:preset|color|secondary","width":"4px","style":"solid"},"radius":"4px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group lc-testimonial-spotlight__card has-panel-background-color has-background" style="border-left-color:var(--wp--preset--color--secondary);border-left-style:solid;border-left-width:4px;border-radius:4px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontStyle":"italic","lineHeight":"1.55"}}} -->
				<p class="has-sm-font-size" style="font-style:italic;line-height:1.55">"Having students in the home week after week has changed how residents experience their day. There's energy, curiosity, and conversation — and that matters."</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
				<p class="has-sm-font-size" style="margin-top:var(--wp--preset--spacing--30);font-weight:600;line-height:1.3">Resident Family Member</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"xs","textColor":"muted"} -->
				<p class="has-muted-color has-text-color has-xs-font-size">Wellington Terrace LTC Home</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
