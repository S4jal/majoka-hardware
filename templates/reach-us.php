<?php
/**
 * Template Name: Majoka Reach Us
 *
 * @package Majoka
 */
get_header();

$phone_label = majoka_option( 'phone_label' );
$phone_link  = majoka_option( 'phone_link' );
$wa_label    = majoka_option( 'whatsapp_label' );
$wa_link     = majoka_option( 'whatsapp_link' );
$email_label = majoka_option( 'email_label' );
$email_link  = majoka_option( 'email_link' );
$address     = majoka_option( 'address_line' );
?>

<!-- HERO -->
<section class="hero">
	<div class="container">
		<div class="hero-inner reveal">
			<div class="eyebrow"><?php esc_html_e( 'Visit or Reach Us', 'majoka' ); ?></div>
			<h1><?php esc_html_e( 'Find us. Call us.', 'majoka' ); ?><span class="blue"><?php esc_html_e( 'Or have us bring it to you.', 'majoka' ); ?></span></h1>
			<p class="hero-lede"><?php esc_html_e( "Walk in on Main Road, Palapye. Or get in touch from anywhere in Botswana — we'll handle the rest.", 'majoka' ); ?></p>
			<div class="hero-cta">
				<a class="btn btn-red" href="#map"><?php esc_html_e( 'GET DIRECTIONS', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
				<a class="btn btn-outline" href="<?php echo esc_attr( $phone_link ); ?>"><i class="ti ti-phone"></i> <?php esc_html_e( 'CALL', 'majoka' ); ?></a>
				<a class="btn btn-wa" href="<?php echo esc_url( $wa_link ); ?>" target="_blank" rel="noopener"><i class="ti ti-brand-whatsapp"></i> <?php esc_html_e( 'WHATSAPP', 'majoka' ); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- INFO CARDS -->
<section class="info">
	<div class="container">
		<div class="info-grid">

			<article class="info-card reveal">
				<div class="info-eyebrow"><i class="ti ti-map-pin"></i> <?php esc_html_e( 'Visit Us', 'majoka' ); ?></div>
				<h3><?php esc_html_e( 'Along Main Road,', 'majoka' ); ?><br><?php esc_html_e( 'Palapye', 'majoka' ); ?></h3>
				<div class="strong-line"><?php bloginfo( 'name' ); ?></div>
				<div class="body-line"><?php echo esc_html( $address ); ?></div>
				<div class="divider"></div>
				<div class="opening-title"><?php esc_html_e( 'Opening Hours', 'majoka' ); ?></div>
				<div class="hours">
					<div class="hours-row"><span class="day"><?php esc_html_e( 'Monday – Friday', 'majoka' ); ?></span><span class="time">8:00 – 17:00</span></div>
					<div class="hours-row"><span class="day"><?php esc_html_e( 'Saturday', 'majoka' ); ?></span><span class="time">8:00 – 13:00</span></div>
					<div class="hours-row"><span class="day"><?php esc_html_e( 'Sunday', 'majoka' ); ?></span><span class="time closed"><?php esc_html_e( 'Closed', 'majoka' ); ?></span></div>
				</div>
				<div class="hours-note"><?php esc_html_e( 'Closed on public holidays unless otherwise announced.', 'majoka' ); ?></div>
			</article>

			<article class="info-card reveal" data-delay="1" id="contact">
				<div class="info-eyebrow"><i class="ti ti-phone"></i> <?php esc_html_e( 'Reach Us', 'majoka' ); ?></div>
				<h3><?php esc_html_e( 'Call, message, or email', 'majoka' ); ?></h3>
				<div class="contact-list">
					<a class="contact-row" href="<?php echo esc_attr( $phone_link ); ?>">
						<div class="contact-icon"><i class="ti ti-phone"></i></div>
						<div class="contact-meta">
							<span class="contact-label"><?php esc_html_e( 'Phone', 'majoka' ); ?></span>
							<span class="contact-value"><?php echo esc_html( $phone_label ); ?></span>
						</div>
					</a>
					<a class="contact-row" href="<?php echo esc_url( $wa_link ); ?>" target="_blank" rel="noopener">
						<div class="contact-icon"><i class="ti ti-brand-whatsapp"></i></div>
						<div class="contact-meta">
							<span class="contact-label"><?php esc_html_e( 'WhatsApp', 'majoka' ); ?></span>
							<span class="contact-value"><?php echo esc_html( $wa_label ); ?></span>
						</div>
					</a>
					<a class="contact-row" href="<?php echo esc_attr( $email_link ); ?>">
						<div class="contact-icon"><i class="ti ti-mail"></i></div>
						<div class="contact-meta">
							<span class="contact-label"><?php esc_html_e( 'Email', 'majoka' ); ?></span>
							<span class="contact-value"><?php echo esc_html( $email_label ); ?></span>
						</div>
					</a>
				</div>
				<div class="divider"></div>
				<p class="contact-blurb"><?php esc_html_e( 'For large orders, bulk pricing, or trade enquiries — the team is happy to help by phone, WhatsApp, or in person.', 'majoka' ); ?></p>
			</article>

		</div>
	</div>
</section>

<!-- FORM (rendered by Contact Form 7) -->
<section class="form-wrap">
	<div class="container">
		<div class="form-head reveal">
			<div class="eyebrow"><?php esc_html_e( 'Send a Message', 'majoka' ); ?></div>
			<h2><?php esc_html_e( 'Drop us a line.', 'majoka' ); ?></h2>
			<p><?php esc_html_e( "Fill in the form and we'll get back to you within one business day.", 'majoka' ); ?></p>
		</div>

		<div class="reveal" data-delay="1">
		<?php
		$cf7_id = function_exists( 'majoka_get_cf7_form_id' ) ? majoka_get_cf7_form_id() : 0;

		if ( $cf7_id && shortcode_exists( 'contact-form-7' ) ) {
			echo do_shortcode( '[contact-form-7 id="' . (int) $cf7_id . '"]' );
		} else {
			echo '<div class="wpcf7-response-output" style="display:block;padding:18px;border:1px solid var(--border);background:var(--bg-soft);font-size:15px;line-height:1.6;">';
			echo '<strong>' . esc_html__( 'Contact form is unavailable.', 'majoka' ) . '</strong><br>';
			if ( current_user_can( 'install_plugins' ) ) {
				echo esc_html__( 'Install and activate the Contact Form 7 plugin — the form will appear automatically.', 'majoka' );
			} else {
				echo esc_html__( 'Please contact us via phone, WhatsApp, or email above.', 'majoka' );
			}
			echo '</div>';
		}
		?>
		</div>
	</div>
</section>

<!-- STORE MAP -->
<section class="store" id="map">
	<div class="container">
		<div class="store-head reveal">
			<div class="eyebrow"><?php esc_html_e( 'Find the Store', 'majoka' ); ?></div>
			<h2><?php esc_html_e( 'Along Main Road, Palapye — easy to spot, easy to pull into.', 'majoka' ); ?></h2>
		</div>
	</div>

	<div class="map-frame reveal" data-delay="1">
		<span class="map-tag"><?php bloginfo( 'name' ); ?></span>
		<a class="map-action" style="z-index:2;" href="https://www.google.com/maps/search/?api=1&query=Majoka+Hardware+Palapye" target="_blank" rel="noopener">
			<i class="ti ti-external-link"></i> <?php esc_html_e( 'Open in Google Maps', 'majoka' ); ?>
		</a>
		<iframe
			src="https://maps.google.com/maps?q=Majoka+Hardware+Palapye+Botswana&t=&z=16&ie=UTF8&iwloc=&output=embed"
			title="<?php esc_attr_e( 'Majoka Hardware, Main Road, Palapye, Botswana', 'majoka' ); ?>"
			loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"
			allowfullscreen=""
			style="position:absolute;inset:0;width:100%;height:100%;border:0;"></iframe>
	</div>
</section>

<!-- DELIVERY CTA -->
<section class="deliver">
	<div class="container">
		<div class="deliver-grid">
			<div class="reveal">
				<i class="ti ti-truck-delivery head"></i>
				<h2><?php esc_html_e( "Not in Palapye? We'll come to you.", 'majoka' ); ?></h2>
				<p><?php esc_html_e( 'Order over the phone or by message — we deliver anywhere in Botswana.', 'majoka' ); ?></p>
			</div>
			<div class="deliver-action reveal" data-delay="1">
				<a class="btn btn-red" href="<?php echo esc_attr( $phone_link ); ?>"><?php esc_html_e( 'REQUEST DELIVERY', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
