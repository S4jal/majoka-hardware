<?php
/**
 * Template Name: Majoka About
 *
 * @package Majoka
 */
get_header();
$phone_link = majoka_option( 'phone_link' );
?>

<!-- HERO -->
<section class="hero" id="home">
	<div class="container">
		<div class="hero-grid">
			<div class="reveal">
				<div class="eyebrow"><?php esc_html_e( 'About us', 'majoka' ); ?></div>
				<h1><?php esc_html_e( 'Built in Botswana.', 'majoka' ); ?><span class="blue"><?php esc_html_e( 'For Botswana.', 'majoka' ); ?></span></h1>
				<p class="hero-lede"><?php esc_html_e( 'A hardware store that grew up with Palapye — and now delivers to the rest of the country.', 'majoka' ); ?></p>
			</div>
			<div class="story-photo reveal" data-delay="1">
				<div class="photo-inner">
					<img src="<?php echo esc_url( MAJOKA_URI . 'assets/img/about-hero.jpg' ); ?>" alt="<?php esc_attr_e( 'Inside Majoka Hardware — tools and stock on the shelves', 'majoka' ); ?>" loading="lazy">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- STORY -->
<section class="story">
	<div class="container">
		<div class="story-inner">
			<div class="story-head reveal">
				<div class="eyebrow"><?php esc_html_e( 'Our story', 'majoka' ); ?></div>
				<h2><?php esc_html_e( 'From a single store to nationwide reach.', 'majoka' ); ?></h2>
			</div>
			<div class="story-body reveal" data-delay="1">
				<?php
				$page_id = get_queried_object_id();
				$content = $page_id ? get_post_field( 'post_content', $page_id ) : '';
				$content = trim( wp_strip_all_tags( $content ) );
				if ( $content && false === strpos( $content, 'Front page content is rendered' ) && false === strpos( $content, 'rendered by templates' ) ) {
					the_content();
				} else { ?>
					<p><?php printf( wp_kses_post( __( 'Majoka Hardware was founded by %1$sKashmiri Lal Majoka and Vimla Devi%2$s, who started with a single idea: building materials should be available to everyone, at fair prices, anywhere in the country.', 'majoka' ) ), '<strong>', '</strong>' ); ?></p>
					<p><?php esc_html_e( 'What began in 2004 as an electrical-fittings business grew into something bigger. In late 2009, the doors opened on Main Road in Palapye. The town was already competitive — but we backed ourselves on two things: a wider range than anyone else, and prices that respected the customer.', 'majoka' ); ?></p>
					<p><?php esc_html_e( "It worked. Today, Majoka Hardware Palapye is the town's go-to for builders, contractors, and homeowners. Our 3,600m² distribution centre means we can supply jobs of any size — and our trucks reach every corner of Botswana.", 'majoka' ); ?></p>
					<p class="story-tagline"><?php esc_html_e( 'Still on Main Road. Still doing what we set out to do — making it easier for people to build.', 'majoka' ); ?></p>
				<?php }
				?>
			</div>
		</div>
	</div>
</section>

<!-- STATS -->
<section class="stats-wrap reveal">
	<div class="container">
		<div class="stats">
			<div class="stat">
				<div class="stat-num"><span data-count="2004">0</span></div>
				<div class="stat-label"><?php esc_html_e( 'Group founded', 'majoka' ); ?></div>
			</div>
			<div class="stat">
				<div class="stat-num"><span data-count="2009">0</span></div>
				<div class="stat-label"><?php esc_html_e( 'Palapye store opened', 'majoka' ); ?></div>
			</div>
			<div class="stat">
				<div class="stat-num"><span data-count="3600">0</span><span class="small">m²</span></div>
				<div class="stat-label"><?php esc_html_e( 'Distribution centre', 'majoka' ); ?></div>
			</div>
			<div class="stat">
				<div class="stat-num"><?php esc_html_e( 'All of', 'majoka' ); ?> <span class="red">BW</span></div>
				<div class="stat-label"><?php esc_html_e( 'Delivery coverage', 'majoka' ); ?></div>
			</div>
		</div>
	</div>
</section>

<!-- BELIEFS -->
<section class="beliefs">
	<div class="container">
		<div class="beliefs-head reveal">
			<div class="eyebrow centered"><?php esc_html_e( 'What we believe', 'majoka' ); ?></div>
			<h2><?php esc_html_e( 'Three things that shape how we work.', 'majoka' ); ?></h2>
		</div>
		<div class="beliefs-grid">
			<div class="belief-card reveal" data-delay="1">
				<i class="ti ti-home belief-icon"></i>
				<div class="belief-num">01 — VISION</div>
				<div class="belief-title"><?php esc_html_e( 'Housing for all', 'majoka' ); ?></div>
				<p class="belief-body"><?php esc_html_e( 'Quality building materials should be within reach of everyone — not just the people building in the capital.', 'majoka' ); ?></p>
			</div>
			<div class="belief-card reveal" data-delay="2">
				<i class="ti ti-tool belief-icon"></i>
				<div class="belief-num">02 — TRADE</div>
				<div class="belief-title"><?php esc_html_e( 'The trade comes first', 'majoka' ); ?></div>
				<p class="belief-body"><?php esc_html_e( 'Contractors and tradespeople are the lifeblood of any hardware store. We stock deep, supply fast, and know a missing fitting can hold up a whole site.', 'majoka' ); ?></p>
			</div>
			<div class="belief-card reveal" data-delay="3">
				<i class="ti ti-map-pin belief-icon"></i>
				<div class="belief-num">03 — ROOTS</div>
				<div class="belief-title"><?php esc_html_e( 'Local roots, long memory', 'majoka' ); ?></div>
				<p class="belief-body"><?php esc_html_e( "Palapye built us, and we've built with Palapye. Many of our customers have been with us since the day we opened.", 'majoka' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- BLUE CTA -->
<section class="blue-cta">
	<i class="ti ti-truck-delivery bg"></i>
	<div class="container">
		<div class="blue-cta-grid">
			<div class="head reveal">
				<i class="ti ti-truck-delivery"></i>
				<h2><?php esc_html_e( 'Built for the country.', 'majoka' ); ?></h2>
				<p><?php esc_html_e( "Wherever you're building in Botswana, we can help. Walk in, call, or message — we deliver nationwide.", 'majoka' ); ?></p>
			</div>
			<div class="blue-cta-buttons reveal" data-delay="1">
				<a href="<?php echo esc_attr( $phone_link ); ?>" class="btn btn-red"><?php esc_html_e( 'Request delivery', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
