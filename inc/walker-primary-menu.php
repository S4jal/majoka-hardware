<?php
/**
 * Custom Walker classes so the WordPress menu output matches the original markup exactly.
 *
 * @package Majoka
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Desktop primary menu walker.
 *
 * Original markup looked like:
 *   <nav class="menu">
 *     <a href="..." class="active">HOME</a>
 *     <a href="...">PRODUCTS</a>
 *     ...
 *   </nav>
 *
 * So we drop the <ul>/<li> structure entirely and emit only <a> tags.
 */
class Majoka_Primary_Walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		// no sub-menus on the desktop bar
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		// no sub-menus on the desktop bar
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$is_active = in_array( 'current-menu-item', $classes, true )
			|| in_array( 'current_page_item', $classes, true )
			|| in_array( 'current-menu-ancestor', $classes, true );

		$class = $is_active ? ' class="active"' : '';
		$url   = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
		$label = strtoupper( apply_filters( 'the_title', $item->title, $item->ID ) );

		$output .= sprintf( '<a href="%s"%s>%s</a>', $url, $class, esc_html( $label ) );
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		// no closing tag — start_el emits the full <a>
	}
}

/**
 * Mobile drawer walker — numbered list, matches drawer-menu CSS in main.css.
 */
class Majoka_Drawer_Walker extends Walker_Nav_Menu {

	private $counter = 0;

	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$this->counter++;
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$is_active = in_array( 'current-menu-item', $classes, true )
			|| in_array( 'current_page_item', $classes, true )
			|| in_array( 'current-menu-ancestor', $classes, true );

		$class = $is_active ? ' class="active"' : '';
		$url   = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
		$label = apply_filters( 'the_title', $item->title, $item->ID );
		$num   = str_pad( (string) $this->counter, 2, '0', STR_PAD_LEFT );

		$output .= sprintf(
			'<a href="%1$s"%2$s><span class="num">%3$s</span> <span class="label">%4$s</span> <i class="ti ti-arrow-right"></i></a>',
			$url,
			$class,
			esc_html( $num ),
			esc_html( $label )
		);
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}
