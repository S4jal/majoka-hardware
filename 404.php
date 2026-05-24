<?php
/**
 * 404 template.
 *
 * @package Majoka
 */
get_header();
?>

<section class="hero">
	<div class="container">
		<div class="hero-inner reveal">
			<div class="eyebrow"><?php esc_html_e( 'Page not found', 'majoka' ); ?></div>
			<h1>404 — <span class="blue"><?php esc_html_e( 'Nothing here.', 'majoka' ); ?></span></h1>
			<p class="hero-lede"><?php esc_html_e( 'The page you were looking for has moved or never existed.', 'majoka' ); ?></p>
			<div class="hero-cta">
				<a class="btn btn-red" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
