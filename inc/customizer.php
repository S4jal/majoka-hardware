<?php
/**
 * Customizer settings for header and footer.
 *
 * All header/footer text, contact details, addresses and copyright are exposed here
 * so the site owner can change them from Appearance → Customize.
 *
 * @package Majoka
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default values used both by the Customizer and by template-helpers.
 */
function majoka_customizer_defaults() {
	return array(
		'tagline'           => 'Build with us',
		'phone_label'       => '+267 4922316',
		'phone_link'        => 'tel:+2674922316',
		'whatsapp_label'    => '+267 77771212',
		'whatsapp_link'     => 'https://wa.me/26777771212',
		'email_label'       => 'py@majoka.co.bw',
		'email_link'        => 'mailto:py@majoka.co.bw',
		'address_line'      => 'Main Road, Palapye, Botswana',
		'hours_line'        => 'Mon–Fri 8:00–17:00 · Sat 8:00–13:00',
		'footer_copyright'  => '© MAJOKA HARDWARE · PALAPYE, BOTSWANA · NATIONWIDE DELIVERY',
		'footer_build_line' => 'BUILD WITH US.',
		'show_cookie'       => 1,
		'show_back_to_top'  => 1,
	);
}

/**
 * Convenience accessor.
 */
function majoka_option( $key ) {
	$defaults = majoka_customizer_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'majoka_' . $key, $default );
}

/**
 * Register Customizer sections, settings & controls.
 */
function majoka_customize_register( $wp_customize ) {

	/* ============================================================
	   SECTION 1 — HEADER
	   ============================================================ */
	$wp_customize->add_section( 'majoka_header', array(
		'title'       => __( 'Header (Brand & Contact)', 'majoka' ),
		'priority'    => 30,
		'description' => __( 'Logo, tagline and contact strip shown in the site header and mobile drawer.', 'majoka' ),
	) );

	$header_fields = array(
		'tagline'        => array( 'label' => __( 'Brand Tagline', 'majoka' ),         'type' => 'text' ),
		'phone_label'    => array( 'label' => __( 'Phone Number (display)', 'majoka' ),'type' => 'text' ),
		'phone_link'     => array( 'label' => __( 'Phone Link (tel:)', 'majoka' ),     'type' => 'text' ),
		'whatsapp_label' => array( 'label' => __( 'WhatsApp (display)', 'majoka' ),    'type' => 'text' ),
		'whatsapp_link'  => array( 'label' => __( 'WhatsApp Link (https://wa.me/...)', 'majoka' ), 'type' => 'url' ),
		'email_label'    => array( 'label' => __( 'Email (display)', 'majoka' ),       'type' => 'text' ),
		'email_link'     => array( 'label' => __( 'Email Link (mailto:)', 'majoka' ),  'type' => 'text' ),
		'address_line'   => array( 'label' => __( 'Address Line', 'majoka' ),          'type' => 'text' ),
		'hours_line'     => array( 'label' => __( 'Opening Hours Line', 'majoka' ),    'type' => 'text' ),
	);

	$defaults = majoka_customizer_defaults();

	foreach ( $header_fields as $key => $args ) {
		$setting = 'majoka_' . $key;
		$wp_customize->add_setting( $setting, array(
			'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
			'sanitize_callback' => ( 'url' === $args['type'] ) ? 'esc_url_raw' : 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( $setting, array(
			'label'   => $args['label'],
			'section' => 'majoka_header',
			'type'    => 'url' === $args['type'] ? 'url' : 'text',
		) );
	}

	/* ============================================================
	   SECTION 2 — FOOTER
	   ============================================================ */
	$wp_customize->add_section( 'majoka_footer', array(
		'title'       => __( 'Footer', 'majoka' ),
		'priority'    => 35,
		'description' => __( 'Footer copyright line, build-line and small toggles.', 'majoka' ),
	) );

	$wp_customize->add_setting( 'majoka_footer_copyright', array(
		'default'           => $defaults['footer_copyright'],
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'majoka_footer_copyright', array(
		'label'   => __( 'Copyright line (left)', 'majoka' ),
		'section' => 'majoka_footer',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'majoka_footer_build_line', array(
		'default'           => $defaults['footer_build_line'],
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'majoka_footer_build_line', array(
		'label'   => __( 'Tag line (right)', 'majoka' ),
		'section' => 'majoka_footer',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'majoka_show_cookie', array(
		'default'           => 1,
		'sanitize_callback' => 'majoka_sanitize_checkbox',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'majoka_show_cookie', array(
		'label'   => __( 'Show cookie banner', 'majoka' ),
		'section' => 'majoka_footer',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'majoka_show_back_to_top', array(
		'default'           => 1,
		'sanitize_callback' => 'majoka_sanitize_checkbox',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'majoka_show_back_to_top', array(
		'label'   => __( 'Show "back to top" button', 'majoka' ),
		'section' => 'majoka_footer',
		'type'    => 'checkbox',
	) );
}
add_action( 'customize_register', 'majoka_customize_register' );

/**
 * Checkbox sanitizer.
 */
function majoka_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === (bool) $checked ) ? 1 : 0 );
}
