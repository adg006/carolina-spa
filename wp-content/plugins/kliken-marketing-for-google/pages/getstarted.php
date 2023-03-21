<?php
/**
 * Get started page.
 *
 * @package Kliken Marketing for Google
 */

defined( 'ABSPATH' ) || exit;

?>

<style>
	#getstarted_btn {
		background-color: #ff6600;
		color: #fff;
		padding: 10px 20px;
		font-size: 14px;
		text-decoration: none;
		font-family: "Lato",sans-serif;
		line-height: 35px;
		font-weight: 700;
		letter-spacing: 2px !important;
		text-transform: uppercase;
	}
</style>

<div class="wrap kk-wrapper">
	<h2><?php esc_html_e( 'AI Powered Marketing', 'kliken-marketing-for-google' ); ?></h2>

	<p><?php esc_html_e( 'Reach beyond your competition on Google, Facebook and the Open Web, and unleash the power of your brand with Kliken.', 'kliken-marketing-for-google' ); ?></p>

	<div class="kk-box">
		<div class="kk-box-header">
			<div class="kk-img-container">
				<img srcset="https://msacdn.s3.amazonaws.com/images/logos/woocommerce/KlikenLogoTagline@2x.png 2x, https://msacdn.s3.amazonaws.com/images/logos/woocommerce/KlikenLogoTagline.png 1x"
					src="https://msacdn.s3.amazonaws.com/images/logos/woocommerce/KlikenLogoTagline.png" 
					alt="Kliken Logo" class="kk-logo-img">
			</div>
		</div>

		<div class="kk-box-content">
			<h1><?php esc_html_e( 'Grow your business with the #1 rated advertising extension on WooCommerce', 'kliken-marketing-for-google' ); ?></h1>

			<p class="subhdr"><?php esc_html_e( 'With Kliken\'s All-In-One Marketing Solution, you can:', 'kliken-marketing-for-google' ); ?></h5>
			<ul>
				<li><?php 
						echo wp_kses (
							__( 'Find ideal customers for your store as they are surfing the <strong>web</strong>, searching on <strong>Google</strong>, or browsing <strong>Facebook</strong>', 'kliken-marketing-for-google' ), 
							[
								'strong' => [],
							] 
						); 
					?>
				</li>
				<li>
					<?php 
						echo wp_kses (
							__( '<strong>Retarget</strong> existing customers and increase your conversion rates and sales', 'kliken-marketing-for-google' ), 
							[
								'strong' => [],
							] 
						); 
					?>
				</li>
				<li>
					<?php 
						echo wp_kses (
							__( 'Leverage Fortune 500 advertising power at a small price - <strong>packages start as low as $5 per day</strong>', 'kliken-marketing-for-google' ), 
							[
								'strong' => [],
							] 
						); 
					?>
				</li>
			</ul>

			<a id="getstarted_btn" href="<?php echo esc_url( \Kliken\WcPlugin\Helper::build_signup_link() ); ?>">
				<?php esc_html_e( 'Get Started', 'kliken-marketing-for-google' ); ?>
			</a>
		</div>
	</div>
</div>
