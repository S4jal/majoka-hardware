<?php
/**
 * Template Name: Majoka Products
 *
 * @package Majoka
 */
get_header();
$phone_link = majoka_option( 'phone_link' );
$wa_link    = majoka_option( 'whatsapp_link' );
$reach      = get_page_by_path( 'reach-us' );
$reach_url  = $reach ? get_permalink( $reach->ID ) : '#';
$img        = MAJOKA_URI . 'assets/img/';
?>

<!-- HERO -->
<section class="hero">
	<div class="container">
		<div class="hero-inner reveal">
			<div class="eyebrow"><?php esc_html_e( 'What We Stock', 'majoka' ); ?></div>
			<h1><?php esc_html_e( 'Everything you need', 'majoka' ); ?> <span class="blue"><?php esc_html_e( 'to build.', 'majoka' ); ?></span></h1>
			<p class="hero-lede"><?php printf( wp_kses_post( __( 'Twelve categories. Hundreds of products. From a single nail to a full house build — and we deliver it all, %1$snationwide%2$s.', 'majoka' ) ), '<strong>', '</strong>' ); ?></p>
			<div class="hero-cta">
				<a class="btn btn-red" href="#need"><?php esc_html_e( 'REQUEST A QUOTE', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
				<a class="btn btn-outline" href="<?php echo esc_attr( $phone_link ); ?>"><i class="ti ti-phone"></i> <?php esc_html_e( 'CALL', 'majoka' ); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- INTRO -->
<section class="intro">
	<div class="container">
		<p class="reveal"><?php esc_html_e( "If you're building, renovating, or just fixing something at home, you'll find it at Majoka. Below is the breakdown of what we carry. Can't see exactly what you need? Call us — chances are we either have it on the shelf, in the warehouse, or can get it in for you.", 'majoka' ); ?></p>
	</div>
</section>

<!-- CATEGORY CHIP STRIP -->
<div class="chip-strip-wrap">
	<div class="container">
		<div class="chip-strip reveal">
			<?php
			$strip = array(
				array( '01', 'Cement' ), array( '02', 'Steel & Roofing' ),
				array( '03', 'Timber' ), array( '04', 'Plumbing' ),
				array( '05', 'Electrical' ), array( '06', 'Paints' ),
				array( '07', 'Tiles' ), array( '08', 'Tools' ),
				array( '09', 'Hardware' ), array( '10', 'Doors & Windows' ),
				array( '11', 'Fencing' ), array( '12', 'Water Tanks' ),
			);
			foreach ( $strip as $s ) :
				printf(
					'<a class="chip" href="#cat-%1$s"><span class="num">%1$s</span> %2$s</a>',
					esc_attr( $s[0] ),
					esc_html( $s[1] )
				);
			endforeach;
			?>
		</div>
	</div>
</div>

<!-- CATEGORY LIST -->
<section class="cats">
	<div class="container">
		<?php
		$cats = array(
			array(
				'num' => '01', 'img' => $img . 'cement.jpeg', 'alt' => 'Cement and building materials',
				'title' => 'Cement & Building Materials',
				'desc' => 'The essentials for any build. Available in retail bags or bulk truckloads through our distribution centre.',
				'chips' => array( 'Cement', 'Blocks', 'Sand & aggregates', 'Building lime' ),
			),
			array(
				'num' => '02', 'img' => $img . 'roofing.webp', 'alt' => 'Steel roofing sheets',
				'title' => 'Steel & Roofing',
				'chips' => array( 'IBR sheets', 'Corrugated sheets', 'Steel roof tiles', 'Structural steel' ),
			),
			array(
				'num' => '03', 'img' => $img . 'timber.jpg', 'alt' => 'Timber and roof trusses',
				'title' => 'Timber & Trusses',
				'chips' => array( 'Roof trusses (made to order)', 'Rafters', 'Branderings', 'Purlins', 'Gumpoles', 'Boards & sheeting' ),
			),
			array(
				'num' => '04', 'img' => $img . 'plumbing.jpg', 'alt' => 'Plumbing pipes and sanitary fittings',
				'title' => 'Plumbing & Sanitary',
				'chips' => array( 'Plumbing fittings (incl. copper)', 'uPVC pipes', 'HDPE pipes', 'Irrigation fittings', 'Gutters & fittings', 'Bathroom sets', 'Shower rooms & sets', 'Basins, toilets, taps' ),
			),
			array(
				'num' => '05', 'img' => $img . 'electrical.jpg', 'alt' => 'Electrical wires and cabling',
				'title' => 'Electrical & Cabling',
				'chips' => array( 'House wire', 'Armoured cables', 'Switches & sockets', 'General electrical fittings', 'Cable accessories' ),
			),
			array(
				'num' => '06', 'img' => 'https://images.unsplash.com/photo-1585676737728-432f58d5fdba?w=600&q=80&auto=format&fit=crop', 'alt' => 'Paints and finishes',
				'title' => 'Paints & Finishes',
				'desc' => 'Full range of interior and exterior paints, primers, sealers, and finishing accessories.',
			),
			array(
				'num' => '07', 'img' => $img . 'tiles.jpeg', 'alt' => 'Ceramic and porcelain tiles',
				'title' => 'Tiles',
				'chips' => array( 'Porcelain tiles', 'Ceramic tiles', 'Adhesives & grouts', 'Tiling accessories' ),
			),
			array(
				'num' => '08', 'img' => 'https://images.unsplash.com/photo-1731694411560-050e5b91e943?w=600&q=80&auto=format&fit=crop', 'alt' => 'Hand tools and power tools',
				'title' => 'Tools',
				'chips' => array( 'Hand tools', 'Power tools', 'Generators', 'Chain saws & circular saws', 'Water pumps' ),
			),
			array(
				'num' => '09', 'img' => 'https://images.unsplash.com/photo-1704732061018-3ac738176c20?w=600&q=80&auto=format&fit=crop', 'alt' => 'Hardware screws bolts and fasteners',
				'title' => 'Hardware & Fasteners',
				'desc' => 'The small things that hold a build together — nails, screws, bolts, hinges, locks, handles, latches.',
			),
			array(
				'num' => '10', 'img' => 'https://images.unsplash.com/photo-1490717164730-d639c415a82a?w=600&q=80&auto=format&fit=crop', 'alt' => 'Doors and windows',
				'title' => 'Doors & Windows',
				'chips' => array( 'Wooden door frames', 'Steel door frames', 'Sliding doors', 'Steel window frames', 'Wooden window frames', 'Window panes' ),
			),
			array(
				'num' => '11', 'img' => $img . 'gumpoles.png', 'alt' => 'Fencing and gumpoles',
				'title' => 'Fencing & Gumpoles',
				'chips' => array( 'Fencing materials', 'Gumpoles', 'Fencing wire' ),
			),
			array(
				'num' => '12', 'img' => $img . 'water-tanks.webp', 'alt' => 'Water storage tanks',
				'title' => 'Water Tanks',
				'desc' => 'Range of sizes for domestic and industrial use.',
			),
		);

		foreach ( $cats as $c ) : ?>
			<article class="cat reveal" id="cat-<?php echo esc_attr( $c['num'] ); ?>">
				<div class="cat-left">
					<div class="cat-num"><?php echo esc_html( $c['num'] ); ?></div>
					<div class="cat-img"><img src="<?php echo esc_url( $c['img'] ); ?>" alt="<?php echo esc_attr( $c['alt'] ); ?>" loading="lazy"></div>
				</div>
				<div class="cat-body">
					<h3 class="cat-title"><?php echo esc_html( $c['title'] ); ?></h3>
					<?php if ( ! empty( $c['desc'] ) ) : ?>
						<p class="cat-desc"><?php echo esc_html( $c['desc'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $c['chips'] ) ) : ?>
						<div class="cat-chips">
							<?php foreach ( $c['chips'] as $chip ) : ?>
								<span class="cat-chip"><?php echo esc_html( $chip ); ?></span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<!-- NEED SOMETHING SPECIFIC -->
<section class="need" id="need">
	<div class="container">
		<div class="need-inner">
			<div class="reveal">
				<div class="eyebrow red"><?php esc_html_e( "Can't find it?", 'majoka' ); ?></div>
				<h2><?php esc_html_e( 'Need something specific?', 'majoka' ); ?></h2>
				<p><?php esc_html_e( "We carry hundreds of items not listed above. If we don't have it on the shelf, we'll order it in. Tell us what you need and we'll get back to you with availability and pricing.", 'majoka' ); ?></p>
			</div>
			<div class="need-actions reveal" data-delay="1">
				<a class="btn btn-blue" href="<?php echo esc_url( $wa_link ); ?>" target="_blank" rel="noopener"><i class="ti ti-brand-whatsapp"></i> <?php esc_html_e( 'WHATSAPP', 'majoka' ); ?></a>
				<a class="btn btn-outline" href="<?php echo esc_url( $reach_url ); ?>#contact"><?php esc_html_e( 'REQUEST A QUOTE', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<!-- DELIVERY CTA -->
<section class="deliver">
	<div class="container">
		<div class="deliver-grid">
			<div class="reveal">
				<i class="ti ti-truck-delivery head"></i>
				<h2><?php esc_html_e( "Wherever you are in Botswana — we'll deliver it.", 'majoka' ); ?></h2>
				<p><?php esc_html_e( 'From a single bag of cement to a full truckload. Building anywhere from Tsabong to Kasane, give us a call.', 'majoka' ); ?></p>
			</div>
			<div class="deliver-action reveal" data-delay="1">
				<a class="btn btn-red" href="<?php echo esc_attr( $phone_link ); ?>"><?php esc_html_e( 'REQUEST DELIVERY', 'majoka' ); ?> <i class="ti ti-arrow-narrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
