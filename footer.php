<?php
/**
 * Footer template — used by every page.
 *
 * @package Majoka
 */
?>

<!-- ============ BOTTOM FOOTER ============ -->
<footer class="bottom">
	<div class="container">
		<?php
		$copyright  = majoka_option( 'footer_copyright' );
		$build_line = majoka_option( 'footer_build_line' );
		?>
		<?php if ( $copyright ) : ?>
			<span><?php echo esc_html( $copyright ); ?></span>
		<?php endif; ?>
		<?php if ( $build_line ) : ?>
			<span class="build"><?php echo esc_html( $build_line ); ?></span>
		<?php endif; ?>
	</div>
</footer>

<?php if ( (int) majoka_option( 'show_back_to_top' ) === 1 ) : ?>
	<button class="to-top" id="toTop" aria-label="<?php esc_attr_e( 'Back to top', 'majoka' ); ?>" type="button">
		<i class="ti ti-arrow-up"></i>
	</button>
<?php endif; ?>

<?php if ( (int) majoka_option( 'show_cookie' ) === 1 ) : ?>
	<!-- COOKIE BANNER -->
	<aside class="cookie" id="cookie" role="dialog" aria-live="polite" aria-label="<?php esc_attr_e( 'Cookie notice', 'majoka' ); ?>">
		<div class="cookie-head">
			<div class="cookie-icon"><i class="ti ti-cookie"></i></div>
			<div class="cookie-title"><?php esc_html_e( 'A quick note about cookies', 'majoka' ); ?></div>
		</div>
		<div class="cookie-text">
			<?php
			$reach = get_page_by_path( 'reach-us' );
			$reach_url = $reach ? get_permalink( $reach->ID ) : home_url( '/' );
			printf(
				/* translators: %s is the link to the contact page */
				esc_html__( 'We use a few small cookies to remember your preferences and keep things running smoothly — no third-party tracking. %s.', 'majoka' ),
				'<a href="' . esc_url( $reach_url ) . '">' . esc_html__( 'Learn more', 'majoka' ) . '</a>'
			);
			?>
		</div>
		<div class="cookie-actions">
			<button class="cookie-btn decline" id="cookieDecline" type="button"><?php esc_html_e( 'Not now', 'majoka' ); ?></button>
			<button class="cookie-btn accept"  id="cookieAccept"  type="button"><?php esc_html_e( 'Sounds good', 'majoka' ); ?></button>
		</div>
	</aside>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
