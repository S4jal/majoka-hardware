<?php
/**
 * Default page template (used when a Page has no specific template assigned).
 *
 * @package Majoka
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="hero">
		<div class="container">
			<div class="hero-inner reveal">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</section>

	<section class="intro">
		<div class="container">
			<div class="reveal">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
<?php endwhile; ?>

<?php get_footer();
