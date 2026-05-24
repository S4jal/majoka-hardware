<?php
/**
 * Contact Form 7 integration.
 *
 *  - Auto-creates the "Majoka Reach Us" CF7 form when CF7 is available.
 *  - Stores the form ID in the option `majoka_cf7_form_id` so the template
 *    can render it via `[contact-form-7 id="..."]`.
 *  - Adds the `.form` CSS class to CF7's <form> element so all existing
 *    form styles apply automatically.
 *  - Runs on theme activation AND when CF7 is activated, so the form is
 *    created whichever order the user installs things in.
 *
 * @package Majoka
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lookup the saved CF7 form ID — verifies the underlying post still exists.
 */
function majoka_get_cf7_form_id() {
	$id = (int) get_option( 'majoka_cf7_form_id' );
	if ( ! $id ) {
		return 0;
	}
	$post = get_post( $id );
	if ( ! $post || 'wpcf7_contact_form' !== $post->post_type ) {
		return 0;
	}
	return $id;
}

/**
 * Create the CF7 form if CF7 is active and the form doesn't already exist.
 *
 * @return int Form ID on success, 0 on failure / skipped.
 */
function majoka_ensure_cf7_form() {
	if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
		return 0;
	}

	// Already created and still around → nothing to do.
	$existing = majoka_get_cf7_form_id();
	if ( $existing ) {
		return $existing;
	}

	$form_body = <<<'CF7'
<div class="field">
<label for="f-name">Name <span class="req">*</span></label>
[text* f-name id:f-name placeholder "Your name"]
</div>

<div class="field">
<label for="f-phone">Phone <span class="req">*</span></label>
[tel* f-phone id:f-phone placeholder "+267 …"]
</div>

<div class="field full">
<label for="f-email">Email</label>
[email f-email id:f-email placeholder "you@email.com"]
</div>

<div class="field full">
<label for="f-subject">What's it about?</label>
[select f-subject id:f-subject "General enquiry" "Bulk / trade pricing" "Delivery request" "Product availability" "Something else"]
</div>

<div class="field full">
<label for="f-message">Your Message <span class="req">*</span></label>
[textarea* f-message id:f-message placeholder "Tell us what you need…"]
</div>

<div class="form-foot">
<span class="note">We'll get back to you within one business day.</span>
[submit class:btn class:btn-red "SEND MESSAGE"]
</div>
CF7;

	$site_name = get_bloginfo( 'name' );
	$admin_em  = get_option( 'admin_email' );
	$host      = wp_parse_url( home_url(), PHP_URL_HOST );
	if ( ! $host ) {
		$host = 'example.com';
	}

	$cf7 = WPCF7_ContactForm::get_template( array(
		'title' => __( 'Majoka Reach Us', 'majoka' ),
	) );

	if ( ! $cf7 ) {
		return 0;
	}

	$properties           = $cf7->get_properties();
	$properties['form']   = $form_body;
	$properties['mail']   = array(
		'active'             => true,
		'subject'            => sprintf( '[f-subject] — %s contact form', $site_name ),
		'sender'             => sprintf( '"%s" <wordpress@%s>', $site_name, $host ),
		'recipient'          => $admin_em,
		'body'               => "Name: [f-name]\nPhone: [f-phone]\nEmail: [f-email]\nSubject: [f-subject]\n\nMessage:\n[f-message]\n\n--\nSent via the Majoka Hardware website contact form.",
		'additional_headers' => 'Reply-To: [f-email]',
		'attachments'        => '',
		'use_html'           => false,
		'exclude_blank'      => false,
	);

	if ( method_exists( $cf7, 'set_properties' ) ) {
		$cf7->set_properties( $properties );
	} else {
		// Fallback for older CF7 — direct property assignment.
		foreach ( $properties as $k => $v ) {
			$cf7->{$k} = $v;
		}
	}

	$cf7->save();

	$form_id = (int) $cf7->id();
	if ( $form_id ) {
		update_option( 'majoka_cf7_form_id', $form_id );
		return $form_id;
	}
	return 0;
}

// Try after theme activation (in case CF7 is already active).
add_action( 'after_switch_theme', 'majoka_ensure_cf7_form', 20 );

// Try when CF7 itself is activated (covers "theme activated before plugin").
add_action( 'activated_plugin', function ( $plugin ) {
	if ( false !== strpos( $plugin, 'contact-form-7' ) ) {
		// CF7 just activated; its classes may not be loaded in this request, so
		// schedule on init of the next request instead via a transient flag.
		set_transient( 'majoka_pending_cf7_create', 1, HOUR_IN_SECONDS );
	}
} );

// Pick up the deferred create on the next admin/init load.
add_action( 'init', function () {
	if ( get_transient( 'majoka_pending_cf7_create' ) && class_exists( 'WPCF7_ContactForm' ) ) {
		delete_transient( 'majoka_pending_cf7_create' );
		majoka_ensure_cf7_form();
	}
}, 20 );

/**
 * Add the `form` CSS class onto CF7's <form> element so all existing
 * `.form` styles in main.css apply to it untouched.
 */
add_filter( 'wpcf7_form_class_attr', function ( $class ) {
	if ( false === strpos( $class, ' form' ) ) {
		$class .= ' form';
	}
	return $class;
} );
