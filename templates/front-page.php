<?php
/**
 * Template Name: Majoka Home
 *
 * Front page — rebuilt from index.html.
 *
 * @package Majoka
 */
get_header();

$phone_link = majoka_option( 'phone_link' );
$wa_link    = majoka_option( 'whatsapp_link' );
$reach      = get_page_by_path( 'reach-us' );
$products   = get_page_by_path( 'products' );
$reach_url  = $reach    ? get_permalink( $reach->ID )    : '#';
$products_url = $products ? get_permalink( $products->ID ) : '#';
?>

<!-- ============ HERO ============ -->
<section class="hero">
	<div class="container">
		<div class="hero-grid">
			<div class="reveal">
				<div class="hero-badge">
					<i class="ti ti-truck-delivery"></i>
					<?php esc_html_e( 'Delivered anywhere in Botswana', 'majoka' ); ?>
				</div>
				<h1><?php esc_html_e( 'We deliver.', 'majoka' ); ?><br><span class="blue"><?php esc_html_e( 'Nation', 'majoka' ); ?></span><?php esc_html_e( 'wide.', 'majoka' ); ?></h1>
				<p class="hero-lede"><?php esc_html_e( "From Kasane to Tsabong — Majoka Hardware brings building materials to your site, your village, your project. One bag of cement or a full truckload, we'll get it there.", 'majoka' ); ?></p>
				<div class="hero-cta">
					<a href="<?php echo esc_url( $reach_url ); ?>" class="btn btn-red"><?php esc_html_e( 'Request delivery', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
					<a href="<?php echo esc_url( $products_url ); ?>" class="btn btn-outline"><?php esc_html_e( 'Browse products', 'majoka' ); ?></a>
				</div>
			</div>
			<div class="map-card reveal" data-delay="1">
				<div class="map-tag"><?php esc_html_e( 'DELIVERY ZONE', 'majoka' ); ?></div>
				<svg viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
					<path d="M 65 75 L 85 65 L 130 60 L 180 58 L 215 55 L 240 50 L 248 58 L 245 72 L 230 78 L 215 82 L 218 95 L 232 110 L 245 130 L 252 158 L 246 188 L 232 215 L 210 238 L 178 252 L 145 256 L 118 248 L 105 230 L 92 205 L 80 178 L 70 148 L 62 118 L 60 95 Z" fill="#EAF4FB" stroke="#1F7AC9" stroke-width="2"/>
					<g stroke="#E1251B" stroke-width="1.3" fill="none" opacity="0.6">
						<line class="route" x1="178" y1="155" x2="158" y2="225"/>
						<line class="route" x1="178" y1="155" x2="215" y2="195"/>
						<line class="route" x1="178" y1="155" x2="110" y2="115"/>
						<line class="route" x1="178" y1="155" x2="235" y2="68"/>
						<line class="route" x1="178" y1="155" x2="85" y2="160"/>
						<line class="route" x1="178" y1="155" x2="200" y2="90"/>
					</g>
					<circle cx="158" cy="225" r="3.5" fill="#1F7AC9"/>
					<circle cx="215" cy="195" r="3.5" fill="#1F7AC9"/>
					<circle cx="110" cy="115" r="3.5" fill="#1F7AC9"/>
					<circle cx="235" cy="68" r="3.5" fill="#1F7AC9"/>
					<circle cx="85" cy="160" r="3.5" fill="#1F7AC9"/>
					<circle cx="200" cy="90" r="3.5" fill="#1F7AC9"/>
					<circle class="pulse-1" cx="178" cy="155" r="9" fill="#E1251B" opacity="0.55"/>
					<circle class="pulse-2" cx="178" cy="155" r="9" fill="#E1251B" opacity="0.55"/>
					<circle cx="178" cy="155" r="9" fill="#E1251B"/>
					<text x="178" y="178" text-anchor="middle" font-size="9" font-weight="700" fill="#E1251B">PALAPYE</text>
					<text x="158" y="240" text-anchor="middle" font-size="8" fill="#1F7AC9" font-weight="500">Gaborone</text>
					<text x="237" y="65" text-anchor="start"  font-size="8" fill="#1F7AC9" font-weight="500">Kasane</text>
					<text x="75"  y="162" text-anchor="end"   font-size="8" fill="#1F7AC9" font-weight="500">Ghanzi</text>
					<text x="217" y="192" text-anchor="start" font-size="8" fill="#1F7AC9" font-weight="500">F'town</text>
					<text x="100" y="115" text-anchor="end"   font-size="8" fill="#1F7AC9" font-weight="500">Maun</text>
					<text x="202" y="86"  text-anchor="start" font-size="8" fill="#1F7AC9" font-weight="500">Nata</text>
				</svg>
			</div>
		</div>

		<!-- TOWNS -->
		<div class="towns reveal">
			<div class="eyebrow"><?php esc_html_e( 'Delivering to', 'majoka' ); ?></div>
			<div class="chip-list">
				<?php
				$towns = array(
					'FRANCISTOWN','MAUN','KASANE','SEROWE','PALAPYE','MAHALAPYE','SELEBI-PHIKWE',
					'TONOTA','ORAPA','NATA','GHANZI','KAZUNGULA','SHASHE','BOBONONG','GABORONE',
					'MOGODITSHANE','MOLEPOLOLE','KANYE','LOBATSE','JWANENG','TSABONG',
				);
				foreach ( $towns as $town ) {
					echo '<span class="chip">' . esc_html( $town ) . '</span>';
				}
				?>
				<span class="chip chip-accent"><?php esc_html_e( '+ EVERY VILLAGE IN BETWEEN', 'majoka' ); ?></span>
			</div>

			<!-- STATS -->
			<div class="stats">
				<div class="stat">
					<div class="stat-num"><?php esc_html_e( 'All of', 'majoka' ); ?> <span class="red">BW</span></div>
					<div class="stat-label"><?php esc_html_e( 'Delivery coverage', 'majoka' ); ?></div>
				</div>
				<div class="stat">
					<div class="stat-num"><span data-count="15">0</span><span class="red">+</span></div>
					<div class="stat-label"><?php esc_html_e( 'Years in Palapye', 'majoka' ); ?></div>
				</div>
				<div class="stat">
					<div class="stat-num"><span data-count="3600">0</span><span class="red">m²</span></div>
					<div class="stat-label"><?php esc_html_e( 'Distribution centre', 'majoka' ); ?></div>
				</div>
				<div class="stat">
					<div class="stat-num"><span data-count="12">0</span><span class="red">+</span></div>
					<div class="stat-label"><?php esc_html_e( 'Product categories', 'majoka' ); ?></div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="how" id="how">
	<div class="container">
		<div class="how-head reveal">
			<div class="eyebrow white"><?php esc_html_e( 'How it works', 'majoka' ); ?></div>
			<h2><?php esc_html_e( 'Order from anywhere in Botswana', 'majoka' ); ?></h2>
		</div>
		<div class="how-grid">
			<div class="step reveal" data-delay="1">
				<div class="step-num">01</div>
				<div class="step-title"><?php esc_html_e( 'Call or message us', 'majoka' ); ?></div>
				<p class="step-body"><?php esc_html_e( 'Tell us what you need. Our team will confirm stock, pricing, and delivery cost upfront — no surprises.', 'majoka' ); ?></p>
			</div>
			<div class="step reveal" data-delay="2">
				<div class="step-num">02</div>
				<div class="step-title"><?php esc_html_e( 'We load and dispatch', 'majoka' ); ?></div>
				<p class="step-body"><?php esc_html_e( 'Materials pulled from our 3,600m² distribution centre and loaded for transport — anywhere in the country.', 'majoka' ); ?></p>
			</div>
			<div class="step reveal" data-delay="3">
				<div class="step-num">03</div>
				<div class="step-title"><?php esc_html_e( 'Delivered to site', 'majoka' ); ?></div>
				<p class="step-body"><?php esc_html_e( 'Your order arrives where you are. No driving to Palapye. No multiple trips. No middleman.', 'majoka' ); ?></p>
			</div>
		</div>
		<div class="how-cta reveal">
			<a href="<?php echo esc_attr( $phone_link ); ?>" class="btn btn-red"><i class="ti ti-phone"></i> <?php esc_html_e( 'CALL', 'majoka' ); ?></a>
			<a href="<?php echo esc_url( $wa_link ); ?>" class="btn btn-outline-white"><i class="ti ti-brand-whatsapp"></i><?php esc_html_e( 'WhatsApp', 'majoka' ); ?></a>
		</div>
	</div>
</section>

<!-- ============ PRODUCTS ============ -->
<section class="products">
	<div class="container">
		<div class="section-head reveal">
			<div>
				<div class="eyebrow"><?php esc_html_e( 'What we stock', 'majoka' ); ?></div>
				<h2><?php esc_html_e( 'Product categories', 'majoka' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( $products_url ); ?>" class="see-all"><?php esc_html_e( 'SEE ALL', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
		</div>
		<div class="product-grid reveal">
			<?php
			$cards = array(
				array( '01', 'blocks',          'Cement & Building', 'Blocks, sand, aggregates' ),
				array( '02', 'home-2',          'Steel & Roofing',   'IBR, corrugated, tiles' ),
				array( '03', 'wood',            'Timber & Trusses',  'Rafters, purlins, gumpoles' ),
				array( '04', 'bath',            'Plumbing & Sanitary','Pipes, fittings, bathrooms' ),
				array( '05', 'bulb',            'Electrical & Cabling','Wire, switches, sockets' ),
				array( '06', 'bucket-droplet',  'Paints & Finishes', 'Tinted to order' ),
			);
			foreach ( $cards as $c ) : ?>
				<div class="product-card">
					<div class="product-num"><?php echo esc_html( $c[0] ); ?></div>
					<i class="ti ti-<?php echo esc_attr( $c[1] ); ?> product-icon"></i>
					<div class="product-title"><?php echo esc_html( $c[2] ); ?></div>
					<div class="product-sub"><?php echo esc_html( $c[3] ); ?></div>
					<i class="ti ti-arrow-narrow-right product-arrow"></i>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ WHY MAJOKA ============ -->
<section class="why" id="why">
	<div class="container">
		<div class="why-head reveal">
			<div class="eyebrow centered"><?php esc_html_e( 'Why Majoka', 'majoka' ); ?></div>
			<h2><?php esc_html_e( 'Built for the trade', 'majoka' ); ?></h2>
		</div>
		<div class="why-grid">
			<div class="why-card reveal" data-delay="1">
				<div class="why-num">01 — REACH</div>
				<div class="why-title"><?php esc_html_e( 'We come to you', 'majoka' ); ?></div>
				<p class="why-body"><?php esc_html_e( 'Nationwide delivery to any town, village, or site in Botswana.', 'majoka' ); ?></p>
			</div>
			<div class="why-card reveal" data-delay="2">
				<div class="why-num">02 — RANGE</div>
				<div class="why-title"><?php esc_html_e( 'Widest range in town', 'majoka' ); ?></div>
				<p class="why-body"><?php esc_html_e( 'Cement, steel, timber, tools, paints — likely on the shelf.', 'majoka' ); ?></p>
			</div>
			<div class="why-card reveal" data-delay="3">
				<div class="why-num">03 — PRICE</div>
				<div class="why-title"><?php esc_html_e( 'Built on better pricing', 'majoka' ); ?></div>
				<p class="why-body"><?php esc_html_e( 'Bulk buying power passed on. Fair prices, no games.', 'majoka' ); ?></p>
			</div>
			<div class="why-card reveal" data-delay="3">
				<div class="why-num">04 — TRUST</div>
				<div class="why-title"><?php esc_html_e( 'A name that holds up', 'majoka' ); ?></div>
				<p class="why-body"><?php esc_html_e( 'Palapye has built with us since 2009.', 'majoka' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- ============ LOCATION ============ -->
<section class="location">
	<div class="container" style="padding-right:0;">
		<div class="location-inner">
			<div class="location-info reveal">
				<div class="eyebrow"><?php esc_html_e( 'Visit the store', 'majoka' ); ?></div>
				<h2><?php echo esc_html( majoka_option( 'address_line' ) ); ?></h2>
				<p class="location-lede"><?php esc_html_e( "Prefer to walk in? Come see us. Otherwise, we'll bring it to you.", 'majoka' ); ?></p>
				<div class="location-list">
					<div><i class="ti ti-map-pin"></i><?php echo esc_html( majoka_option( 'address_line' ) ); ?></div>
					<div><i class="ti ti-phone"></i><?php echo esc_html( majoka_option( 'phone_label' ) ); ?></div>
					<div><i class="ti ti-clock"></i><?php echo esc_html( majoka_option( 'hours_line' ) ); ?></div>
				</div>
				<div class="location-cta">
					<a href="https://www.google.com/maps/dir/?api=1&destination=Majoka+Hardware+Palapye+Botswana" target="_blank" rel="noopener" class="btn btn-red"><?php esc_html_e( 'Get directions', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
					<a href="<?php echo esc_attr( $phone_link ); ?>" class="btn btn-outline"><?php esc_html_e( 'Call store', 'majoka' ); ?></a>
				</div>
			</div>
			<div class="map-embed reveal" data-delay="1">
				<div class="map-pin" style="z-index:2;"><i class="ti ti-map-pin"></i>MAP</div>
				<iframe
					src="https://maps.google.com/maps?q=Majoka+Hardware+Palapye+Botswana&t=&z=15&ie=UTF8&iwloc=&output=embed"
					title="<?php esc_attr_e( 'Majoka Hardware, Main Road, Palapye, Botswana', 'majoka' ); ?>"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					allowfullscreen=""
					style="position:absolute;inset:0;width:100%;height:100%;border:0;"></iframe>
			</div>
		</div>
	</div>
</section>

<!-- ============ CTA ============ -->
<section class="cta">
	<i class="ti ti-truck-delivery cta-truck"></i>
	<div class="container">
		<div class="cta-grid">
			<div class="reveal">
				<div class="eyebrow red"><?php esc_html_e( 'Delivered anywhere in Botswana', 'majoka' ); ?></div>
				<h2><?php esc_html_e( 'Got a project?', 'majoka' ); ?> <span class="blue"><?php esc_html_e( "We'll bring it.", 'majoka' ); ?></span></h2>
				<p class="cta-lede"><?php esc_html_e( 'Walk in, call, or message — we deliver nationwide.', 'majoka' ); ?></p>
			</div>
			<div class="cta-buttons reveal" data-delay="1">
				<a href="<?php echo esc_attr( $phone_link ); ?>" class="btn btn-red"><?php esc_html_e( 'Request delivery', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
				<a href="<?php echo esc_url( $reach_url ); ?>" class="btn btn-outline"><?php esc_html_e( 'Contact us', 'majoka' ); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
