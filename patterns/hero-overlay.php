<?php
/**
 * Title: Hero — image with overlay
 * Slug: livingclassroom/hero-overlay
 * Categories: livingclassroom
 * Description: Full-bleed photo with a teal-to-transparent gradient and a bottom-aligned h1. Use at the top of persona pages and content pages where the hero is photographic rather than text-only.
 * Keywords: hero, header, banner, photo
 * Block Types: core/cover
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-placeholder.jpg' ) ); ?>","dimRatio":0,"customGradient":"linear-gradient(180deg, rgba(0,62,81,0) 40%, rgba(0,62,81,0.7) 100%)","minHeight":420,"contentPosition":"bottom left","align":"full","className":"lc-hero-overlay"} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-left lc-hero-overlay" style="min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><span aria-hidden="true" class="wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(180deg, rgba(0,62,81,0) 40%, rgba(0,62,81,0.7) 100%)"></span><div class="wp-block-cover__inner-container">
	<!-- wp:heading {"level":1,"textColor":"surface","style":{"typography":{"fontWeight":"300"}}} -->
	<h1 class="wp-block-heading has-surface-color has-text-color" style="font-weight:300">Replace with hero headline</h1>
	<!-- /wp:heading -->
</div></div>
<!-- /wp:cover -->
