<?php
/**
 * Dashboard page.
 *
 * @package Kliken Marketing for Google
 */

defined( 'ABSPATH' ) || exit;

?>

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
			<h1><?php esc_html_e( 'Your store is connected.', 'kliken-marketing-for-google' ); ?></h1>

			<p class="subhdr"><?php esc_html_e( 'Your WooCommerce store is connected to your Kliken account.', 'kliken-marketing-for-google' ); ?></p>

			<hr>
			
			<div class="kk-link">
				<a class="sub-heading" href="<?php echo esc_url( KK_WC_WOOKLIKEN_BASE_URL . 'smb/shopping/create' ); ?>">
					<?php esc_html_e( 'Create a New Kliken Ads Campaign', 'kliken-marketing-for-google' ); ?>
				</a>
				<p class="sub-note"><?php esc_html_e( 'Build a Kliken Ads campaign in less than 10 minutes, and start reaching customers as they search for your products across the Open Web.', 'kliken-marketing-for-google' ); ?></p>
			</div>

			<div class="kk-link">
				<a class="sub-heading" href="<?php echo esc_url( KK_WC_WOOKLIKEN_BASE_URL . 'smb/shopping/manage' ); ?>">
					<?php esc_html_e( 'Manage Your Kliken Ads Campaigns', 'kliken-marketing-for-google' ); ?>
				</a>
				<p class="sub-note"><?php esc_html_e( 'Make changes to your active campaigns, purchase one you\'ve built, or reinstate your canceled campaigns.', 'kliken-marketing-for-google' ); ?></p>
			</div>

			<div class="kk-link">
				<a class="sub-heading" href="<?php echo esc_url( KK_WC_WOOKLIKEN_BASE_URL . 'smb/shopping/dashboard' ); ?>">
					<?php esc_html_e( 'Kliken Ads Open Web Campaign Dashboard', 'kliken-marketing-for-google' ); ?>
				</a>
				<p class="sub-note"><?php esc_html_e( 'See how your ads are performing by visiting your dashboard.', 'kliken-marketing-for-google' ); ?></p>
			</div>

			<hr>
			
			<div class="kk-link">
				<a class="sub-heading" href="<?php echo esc_url( KK_WC_WOOKLIKEN_BASE_URL . 'smb/openweb/default.aspx/new' ); ?>">
					<?php esc_html_e( 'Create a New Google Shopping Campaign', 'kliken-marketing-for-google' ); ?>
				</a>
				<p class="sub-note"><?php esc_html_e( 'Build a campaign in a few minutes, and sell to customers as they search for your products on Google.', 'kliken-marketing-for-google' ); ?></p>
			</div>

			<div class="kk-link">
				<a class="sub-heading" href="<?php echo esc_url( KK_WC_WOOKLIKEN_BASE_URL . 'smb/openweb/default.aspx/manage' ); ?>">
					<?php esc_html_e( 'Manage Your Google Campaigns', 'kliken-marketing-for-google' ); ?>
				</a>
				<p class="sub-note"><?php esc_html_e( 'Make changes to your active campaigns, purchase ones you\'ve built, or reinstate your canceled campaigns.', 'kliken-marketing-for-google' ); ?></p>
			</div>

			<div class="kk-link">
				<a class="sub-heading" href="<?php echo esc_url( KK_WC_WOOKLIKEN_BASE_URL . 'smb/openweb/default.aspx/stats' ); ?>">
					<?php esc_html_e( 'Google Campaign Dashboard', 'kliken-marketing-for-google' ); ?>
				</a>
				<p class="sub-note"><?php esc_html_e( 'Open your dashboard to review your campaign\'s performance.', 'kliken-marketing-for-google' ); ?></p>
			</div>

			<hr>

			<details class="primer advanced-settings">
				<summary><?php esc_html_e( 'Advanced Options', 'kliken-marketing-for-google' ); ?></summary>

				<div>
					<input type="hidden" name="section" value="<?php echo esc_attr( $this->id ); ?>" />
				</div>
				<table class="form-table">
					<?php
						// NOTE: these methods are only available if this file is included within a WC_Integration extended class.
						$this->generate_settings_html( $this->get_form_fields() ); // WPCS: XSS ok.
					?>
				</table>
                
                <p class="submit">
                    <button type="button" class="button button-default" id="enable-settings-edit"><?php esc_html_e( 'Enable Edit', 'kliken-marketing-for-google' ); ?></button>
                    <button type="submit" class="button-primary woocommerce-save-button" name="save" id="submit" value="Save changes"><?php esc_html_e( 'Save Changes', 'kliken-marketing-for-google' ); ?></button>
                </p>

				<hr>
				<a href="<?php echo esc_url( \Kliken\WcPlugin\Helper::build_authorization_url( $this->account_id, $this->app_token ) ); ?>">
					<button type="button" class="button button-primary" id="authorize-api-access"><?php esc_html_e( 'Authorize API Access', 'kliken-marketing-for-google' ); ?></button>
				</a>
			</details>
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function() {
		// Disable setting inputs, and hide submit button
		jQuery(".advanced-settings input[type=text]").prop("disabled", true);
		jQuery("#submit").prop("disabled", true).hide();

		jQuery("#enable-settings-edit").click(function() {
			jQuery(".advanced-settings input[type=text]").prop("disabled", false);
			jQuery("#submit").prop("disabled", false).show();

			// Hide the button itself
			jQuery(this).hide();
		});
	});
</script>
