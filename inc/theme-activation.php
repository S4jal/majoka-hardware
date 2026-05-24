<?php
/**
 * Theme activation hooks.
 *
 * On first activation:
 *   1. Create the four pages (Home, Products, About, Reach Us) and assign each a page template.
 *   2. Mark the static front page so the homepage uses our Home template.
 *   3. Build a navigation menu and assign it to the "primary" location.
 *   4. Also assign the same menu to the "mobile" drawer location.
 *
 * Safe to re-run: each step checks whether it already exists before creating.
 *
 * @package Majoka
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Pages we want to exist after theme activation.
 * Order matters — controls menu order.
 */
function majoka_default_pages() {
	return array(
		array(
			'title'    => 'Home',
			'slug'     => 'home',
			'template' => 'templates/front-page.php',
			'content'  => '<!-- Front page content is rendered by templates/front-page.php -->',
			'is_front' => true,
		),
		array(
			'title'    => 'Products',
			'slug'     => 'products',
			'template' => 'templates/products.php',
			'content'  => '<!-- Products content is rendered by templates/products.php -->',
		),
		array(
			'title'    => 'About',
			'slug'     => 'about',
			'template' => 'templates/about.php',
			'content'  => '<!-- About content is rendered by templates/about.php -->',
		),
		array(
			'title'    => 'Reach Us',
			'slug'     => 'reach-us',
			'template' => 'templates/reach-us.php',
			'content'  => '<!-- Reach Us content is rendered by templates/reach-us.php -->',
		),
	);
}

/**
 * Run on theme switch — creates pages, menu and assigns it to Primary location.
 */
function majoka_on_theme_activate() {
	$created_ids = majoka_create_default_pages();
	majoka_set_static_front_page( $created_ids );
	majoka_create_primary_menu( $created_ids );
}
add_action( 'after_switch_theme', 'majoka_on_theme_activate' );

/**
 * Create the default pages if they don't already exist.
 *
 * @return array Map of slug => page ID
 */
function majoka_create_default_pages() {
	$created = array();

	foreach ( majoka_default_pages() as $page ) {
		$existing = get_page_by_path( $page['slug'] );

		if ( $existing instanceof WP_Post ) {
			$page_id = $existing->ID;
		} else {
			$page_id = wp_insert_post( array(
				'post_title'   => $page['title'],
				'post_name'    => $page['slug'],
				'post_content' => $page['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_author'  => get_current_user_id() ? get_current_user_id() : 1,
				'menu_order'   => 0,
			) );
		}

		if ( $page_id && ! is_wp_error( $page_id ) ) {
			// Always (re)assign the template so theme updates can change a slug → template mapping.
			update_post_meta( $page_id, '_wp_page_template', $page['template'] );
			$created[ $page['slug'] ] = $page_id;
		}
	}

	return $created;
}

/**
 * Use "Home" as the static front page.
 *
 * @param array $pages Map of slug => ID
 */
function majoka_set_static_front_page( $pages ) {
	if ( empty( $pages['home'] ) ) {
		return;
	}
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', (int) $pages['home'] );
}

/**
 * Create / refresh the primary menu and assign it to the primary + mobile locations.
 *
 * @param array $pages Map of slug => ID
 */
function majoka_create_primary_menu( $pages ) {
	$menu_name = 'Majoka Primary Menu';
	$menu      = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
		if ( is_wp_error( $menu_id ) ) {
			return;
		}
	} else {
		$menu_id = (int) $menu->term_id;
	}

	$existing_items = wp_get_nav_menu_items( $menu_id );
	$existing_slugs = array();
	if ( is_array( $existing_items ) ) {
		foreach ( $existing_items as $item ) {
			if ( 'page' === $item->object && $item->object_id ) {
				$existing_slugs[ (int) $item->object_id ] = true;
			}
		}
	}

	$order = 1;
	foreach ( majoka_default_pages() as $page ) {
		if ( empty( $pages[ $page['slug'] ] ) ) {
			continue;
		}
		$page_id = (int) $pages[ $page['slug'] ];

		if ( isset( $existing_slugs[ $page_id ] ) ) {
			$order++;
			continue;
		}

		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'     => $page['title'],
			'menu-item-object'    => 'page',
			'menu-item-object-id' => $page_id,
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
			'menu-item-position'  => $order,
		) );

		$order++;
	}

	// Bind menu to both registered locations.
	$locations             = get_theme_mod( 'nav_menu_locations', array() );
	$locations['primary']  = $menu_id;
	$locations['mobile']   = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}
