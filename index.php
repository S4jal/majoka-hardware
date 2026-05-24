<?php
/**
 * Fallback template — required by WordPress.
 *
 * @package Majoka
 */
get_header();
?>

<section class="hero">
	<div class="container">
		<div class="hero-inner reveal">
			<div class="eyebrow"><?php esc_html_e( 'Latest', 'majoka' ); ?></div>
			<h1><?php single_post_title(); ?></h1>
		</div>
	</div>
</section>

<section class="intro">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div><?php the_excerpt(); ?></div>
				</article>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing here yet.', 'majoka' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer();
