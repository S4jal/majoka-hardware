<?php
/**
 * Majoka Hardware theme functions
 *
 * @package Majoka
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MAJOKA_VERSION', '1.0.0' );
define( 'MAJOKA_DIR', trailingslashit( get_template_directory() ) );
define( 'MAJOKA_URI', trailingslashit( get_template_directory_uri() ) );

/**
 * Theme setup.
 */
function majoka_setup() {
	load_theme_textdomain( 'majoka', MAJOKA_DIR . 'languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 128,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'majoka' ),
		'mobile'  => __( 'Mobile Drawer Menu', 'majoka' ),
	) );
}
add_action( 'after_setup_theme', 'majoka_setup' );

/**
 * Enqueue front-end styles and scripts.
 */
function majoka_enqueue_assets() {
	wp_enqueue_style(
		'majoka-fonts',
		'https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&family=Ubuntu+Mono:wght@400;700&family=JetBrains+Mono:wght@500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'majoka-tabler-icons',
		MAJOKA_URI . 'assets/css/tabler-icons.min.css',
		array(),
		MAJOKA_VERSION
	);

	wp_enqueue_style(
		'majoka-main',
		MAJOKA_URI . 'assets/css/main.css',
		array( 'majoka-tabler-icons' ),
		MAJOKA_VERSION
	);

	// Contact Form 7 design overrides — loaded only when CF7 is active.
	if ( function_exists( 'majoka_is_cf7_active' ) && majoka_is_cf7_active() ) {
		wp_enqueue_style(
			'majoka-cf7',
			MAJOKA_URI . 'assets/css/cf7.css',
			array( 'majoka-main' ),
			MAJOKA_VERSION
		);
	}

	// Per-template overrides — each original HTML page had its own inline <style>
	// with values that differed from the shared stylesheet. We mirror that on a
	// per-template basis so each page renders pixel-identical to the original.
	if ( is_page_template( 'templates/front-page.php' ) || is_front_page() ) {
		wp_enqueue_style(
			'majoka-home',
			MAJOKA_URI . 'assets/css/home.css',
			array( 'majoka-main' ),
			MAJOKA_VERSION
		);
	}
	if ( is_page_template( 'templates/about.php' ) ) {
		wp_enqueue_style(
			'majoka-about',
			MAJOKA_URI . 'assets/css/about.css',
			array( 'majoka-main' ),
			MAJOKA_VERSION
		);
	}
	if ( is_page_template( 'templates/products.php' ) ) {
		wp_enqueue_style(
			'majoka-products',
			MAJOKA_URI . 'assets/css/products.css',
			array( 'majoka-main' ),
			MAJOKA_VERSION
		);
	}

	// Empty theme stylesheet (for the WP header / child themes).
	wp_enqueue_style(
		'majoka-style',
		get_stylesheet_uri(),
		array( 'majoka-main' ),
		MAJOKA_VERSION
	);

	wp_enqueue_script(
		'majoka-main',
		MAJOKA_URI . 'assets/js/main.js',
		array(),
		MAJOKA_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'majoka_enqueue_assets' );

/**
 * Add a "skip to content" anchor target.
 */
function majoka_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'majoka_body_classes' );

/* ---------- Includes ---------- */
require_once MAJOKA_DIR . 'inc/customizer.php';
require_once MAJOKA_DIR . 'inc/theme-activation.php';
require_once MAJOKA_DIR . 'inc/template-helpers.php';
require_once MAJOKA_DIR . 'inc/walker-primary-menu.php';
require_once MAJOKA_DIR . 'inc/class-tgm-plugin-activation.php';
require_once MAJOKA_DIR . 'inc/required-plugins.php';
require_once MAJOKA_DIR . 'inc/cf7-integration.php';
