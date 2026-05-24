<?php
/**
 * Small helpers used by template files.
 *
 * @package Majoka
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Echo the brand block — logo (custom_logo if set, otherwise theme PNG fallback) + tagline.
 */
function majoka_brand( $with_tagline = true ) {
	$home = esc_url( home_url( '/' ) );
	$name = esc_attr( get_bloginfo( 'name' ) );
	?>
	<a href="<?php echo $home; ?>" class="brand" aria-label="<?php echo $name; ?> home">
		<?php if ( has_custom_logo() ) :
			$logo_id  = get_theme_mod( 'custom_logo' );
			$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );
			if ( $logo_src ) : ?>
				<img src="<?php echo esc_url( $logo_src[0] ); ?>" alt="<?php echo $name; ?>" class="brand-logo">
			<?php endif;
		else : ?>
			<img src="<?php echo esc_url( MAJOKA_URI . 'assets/img/logo.png' ); ?>" alt="<?php echo $name; ?>" class="brand-logo">
		<?php endif; ?>
		<?php if ( $with_tagline ) :
			$tagline = majoka_option( 'tagline' );
			if ( $tagline ) : ?>
				<span class="brand-tagline"><?php echo esc_html( $tagline ); ?></span>
			<?php endif;
		endif; ?>
	</a>
	<?php
}

/**
 * Output drawer-foot contact links (phone / whatsapp / email) using customizer values.
 */
function majoka_drawer_contacts() { ?>
	<div class="drawer-foot">
		<?php
		$phone_label = majoka_option( 'phone_label' );
		$phone_link  = majoka_option( 'phone_link' );
		$wa_label    = majoka_option( 'whatsapp_label' );
		$wa_link     = majoka_option( 'whatsapp_link' );
		$email_label = majoka_option( 'email_label' );
		$email_link  = majoka_option( 'email_link' );
		?>

		<?php if ( $phone_label ) : ?>
			<a class="drawer-link" href="<?php echo esc_attr( $phone_link ); ?>"><i class="ti ti-phone"></i> <?php echo esc_html( $phone_label ); ?></a>
		<?php endif; ?>

		<?php if ( $wa_label ) : ?>
			<a class="drawer-link" href="<?php echo esc_url( $wa_link ); ?>" target="_blank" rel="noopener"><i class="ti ti-brand-whatsapp"></i> <?php echo esc_html( $wa_label ); ?></a>
		<?php endif; ?>

		<?php if ( $email_label ) : ?>
			<a class="drawer-link" href="<?php echo esc_attr( $email_link ); ?>"><i class="ti ti-mail"></i> <?php echo esc_html( $email_label ); ?></a>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Fallback callback for wp_nav_menu — runs when no menu is assigned yet.
 * Outputs a simple list of all top-level pages.
 */
function majoka_menu_fallback() {
	$pages = get_pages( array( 'sort_column' => 'menu_order,post_title', 'parent' => 0 ) );
	if ( ! $pages ) {
		return;
	}
	echo '<ul class="menu-items">';
	foreach ( $pages as $page ) {
		$active = is_page( $page->ID ) ? ' class="active"' : '';
		printf(
			'<li><a href="%s"%s>%s</a></li>',
			esc_url( get_permalink( $page->ID ) ),
			$active,
			esc_html( strtoupper( $page->post_title ) )
		);
	}
	echo '</ul>';
}

/**
 * Page hero header used on inner pages.
 */
function majoka_page_hero( $eyebrow = '', $title = '', $lede = '' ) {
	if ( empty( $title ) ) {
		$title = get_the_title();
	}
	?>
	<section class="hero">
		<div class="container">
			<div class="hero-inner reveal">
				<?php if ( $eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>
				<h1><?php echo wp_kses_post( $title ); ?></h1>
				<?php if ( $lede ) : ?>
					<p class="hero-lede"><?php echo wp_kses_post( $lede ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}
