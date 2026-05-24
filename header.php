<?php
/**
 * Header template — used by every page.
 *
 * @package Majoka
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo esc_url( MAJOKA_URI . 'assets/css/fonts/tabler-icons.woff2' ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ============ NAV ============ -->
<header class="nav" id="nav">
	<div class="container nav-inner">
		<?php majoka_brand( true ); ?>

		<nav class="menu" aria-label="<?php esc_attr_e( 'Primary', 'majoka' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '%3$s', // walker emits raw <a> tags
					'walker'         => new Majoka_Primary_Walker(),
					'depth'          => 1,
				) );
			} else {
				majoka_menu_fallback();
			}
			?>
		</nav>

		<button class="nav-toggle" id="navToggle" aria-label="<?php esc_attr_e( 'Open menu', 'majoka' ); ?>" type="button" aria-expanded="false">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</button>
	</div>
</header>

<!-- ============ MOBILE DRAWER ============ -->
<div class="nav-backdrop" id="navBackdrop"></div>
<aside class="nav-drawer" id="navDrawer" aria-hidden="true">
	<div class="drawer-head">
		<?php majoka_brand( false ); ?>
		<button class="drawer-close" id="drawerClose" aria-label="<?php esc_attr_e( 'Close menu', 'majoka' ); ?>" type="button"><i class="ti ti-x"></i></button>
	</div>
	<nav class="drawer-menu" aria-label="<?php esc_attr_e( 'Mobile', 'majoka' ); ?>">
		<?php
		$drawer_location = has_nav_menu( 'mobile' ) ? 'mobile' : ( has_nav_menu( 'primary' ) ? 'primary' : '' );
		if ( $drawer_location ) {
			wp_nav_menu( array(
				'theme_location' => $drawer_location,
				'container'      => false,
				'items_wrap'     => '%3$s',
				'walker'         => new Majoka_Drawer_Walker(),
				'depth'          => 1,
			) );
		} else {
			majoka_menu_fallback();
		}
		?>
	</nav>
	<?php majoka_drawer_contacts(); ?>
</aside>
