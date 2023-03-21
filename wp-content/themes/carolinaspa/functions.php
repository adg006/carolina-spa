<?php

/***** ENQUEUING ALL STYLE AND SCRIPTS *****/
add_action('wp_enqueue_scripts', 'carolinaspa_scripts');
function carolinaspa_scripts(){
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css', array(), '2.5.6');
	wp_enqueue_style('carolinaspa', get_stylesheet_directory_uri() . '/css/carolinaspa.css', array('parent-style'), '1.0');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.1/css/all.min.css', array(), '5.6.1');
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700,900|Lora:400,700&display=swap', array(), '1.0');
}

/***** ENQUEUING ALL STYLE AND SCRIPTS FOR LOGIN SCREEN ONLY *****/
add_action('login_enqueue_scripts', 'carolinaspa_login_scripts');
function carolinaspa_login_scripts() {
	wp_enqueue_style('carolinaspa-login', get_stylesheet_directory_uri() . '/css/carolinaspa_login.css', array(), '1.0');
}

/***** REDIRECT LOGIN TO HOMEPAGE FROM LOGIN DASHBOARD LOGO *****/
add_filter('login_headerurl', 'carolinaspa_redirect_login');
function carolinaspa_redirect_login() {
	return home_url();
}

/***** RESIZING IMAGES *****/
add_action('after_setup_theme', 'carolinaspa_resizing');
function carolinaspa_resizing() {
	add_image_size('blog_entry', 400, 257, true);
}

/***** REMOVE FEATURE IMAGE FROM HOMEPAGE *****/
add_action('init','remove_storefront_header');
function remove_storefront_header() {
	remove_action('homepage', 'storefront_homepage_content', 10);
}

/***** ADDING FEATURE IMAGE TO HOMEPAGE *****/
add_action('homepage', 'carolinaspa_homepage_coupon', 10);
function carolinaspa_homepage_coupon(){ ?>
	<div class="main-content">
		<?php the_post_thumbnail(); ?>
	</div><!--.main-content-->
<?php }

/***** ADDING FEATURE SLIDER TO HOMEPAGE *****/
add_action('homepage', 'carolinaspa_homepage_slider', 13);
function carolinaspa_homepage_slider(){ ?>
	<div class="shortcode-content">
		<?php echo do_shortcode('[woocommerce_bxSlider]'); ?>
	</div><!--.shortcode-content-->
<?php }

/***** ADDING FEATURES TO HOMEPAGE *****/
add_action('homepage', 'carolinaspa_display_features', 15);
function carolinaspa_display_features() { ?>
		</main><!--#main-->
	</div><!--#primary-->
</div><!--.col-full-->

<div class="home-features">
	<div class="col-full">
		<div class="columns-4">
			<?php the_field('feature_icon_1'); ?>
			<p><?php the_field('feature_content_1'); ?></p>
		</div><!--.columns-4-->
		<div class="columns-4">
			<?php the_field('feature_icon_2'); ?>
			<p><?php the_field('feature_content_2'); ?></p>
		</div><!--.columns-4-->
		<div class="columns-4">
			<?php the_field('feature_icon_3'); ?>
			<p><?php the_field('feature_content_3'); ?></p>
		</div><!--.columns-4-->
	</div><!--.col-full-->
</div><!--.home-features-->

<div class="col-full">
	<div class="content-area">
		<div class="site-main">
<?php }

/***** ADDING HOME KITS CATEGORY TO HOMEPAGE *****/
add_action('homepage', 'carolinaspa_homepage_homekits', 25);
function carolinaspa_homepage_homekits(){ ?>
	<div class="homepage-home-kit-category">
		<div class="content">
			<div class="columns-3">
				<?php $home_kit = get_term(19, 'product_cat', ARRAY_A); ?>
				<h2 class="section-title"><?php echo $home_kit['name']; ?></h2>
				<p><?php echo $home_kit['description']; ?></p>
				<a href="<?php echo get_category_link($home_kit['term_id']); ?>">All Products &raquo; </a>
			</div><!--.columns-3-->
			<?php echo do_shortcode('[product_category category="home-kits" per_page="3" orderby="price" order="desc" columns="9"]'); ?>
		</div><!--.content-->
	</div><!--.homepage-home-kit-category-->
<?php }

/***** ADDING SPOIL BANNER TO HOMEPAGE *****/
add_action('homepage', 'carolinaspa_spoil_banner', 80);
function carolinaspa_spoil_banner() { ?>
	<div class="banner-spoil">
		<div class="columns-4">
			<h3><?php the_field('banner_text'); ?></h3>
		</div><!--.columns-4-->
		<div class="columns-8">
			<img src="<?php the_field('banner_image'); ?>"/>
		</div><!--.columns-8-->	
	</div><!--.banner-spoil-->
<?php }

/***** ADDING THREE BLOG POSTS TO HOMEPAGE *****/
add_action('homepage', 'carolinaspa_homepage_blog_entries', 90);
function carolinaspa_homepage_blog_entries() { ?>
	<div class="homepage-blog-entries">
		<h2 class="section-title">Latest Blog Entries</h2>
		<?php
			$args = array(
				'post_type' => 'post',
				'post_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC'
			);
			$entries = new WP_Query($args);
		?>
		<ul>
			<?php while($entries->have_posts()): $entries->the_post(); ?>
				<li>
					<?php the_post_thumbnail('blog_entry'); ?>
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<div class="entry-content">
						<header class="entry-header">
							<p>By: <?php the_author(); ?> | <?php the_time(get_option('date_format')); ?></p>
						</header><!--.entry-header-->
						<?php $content = wp_trim_words(get_the_content(), 50, '.'); ?>
						<p><?php echo $content; ?></p>
						<a class="entry-link" href="<?php the_permalink(); ?>">Read More &raquo; </a>
					</div><!--.entry-content-->
				</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div><!--.homepage-blog-entries-->
	
<?php }

/***** ADDING MAILCHIMP IN THE HOMEPAGE *****/
add_action('storefront_before_footer', 'carolinaspa_mailchimp');
function carolinaspa_mailchimp() { ?>
<?php if(is_page('home')): ?>
	<div class="mailchimp-form">
		<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
		<div id="mc_embed_signup">
			<form action="https://gmail.us18.list-manage.com/subscribe/post?u=08b89b5238a54b671306f4e80&amp;id=5fa68ebb03" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	    		<div id="mc_embed_signup_scroll" class="col-full">
	    			<div class="columns-6">
	    				<label for="mce-EMAIL">Subscribe to the newsletter <em>access to exclusive deals</em></label>
	    			</div><!--.columns-6-->
	    			<div class="columns-6 signup-form">
	    				<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
		    			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_08b89b5238a54b671306f4e80_5fa68ebb03" tabindex="-1" value=""></div>
		    			<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
	    			</div><!--.columns-6-->
				</div><!--#mc_embed_signup_scroll-->
			</form><!--.validate-->
		</div><!--#mc_embed_signup-->
	</div><!--.mailchimp-form-->
<?php endif; ?>
<?php }

/***** REMOVE DEFAULT FOOTER *****/
add_action('init', 'carolinaspa_remove_footer');
function carolinaspa_remove_footer() {
	remove_action('storefront_footer', 'storefront_credit', 20);
}

/***** ADDING A NEW FOOTER *****/
add_action('storefront_after_footer', 'carolinaspa_adding_footer', 20);
function carolinaspa_adding_footer() { ?>
	<div class="reserved">
		<p>All Rights Reserved &copy; <?php echo get_bloginfo('name') . ' ' . get_the_date('Y'); ?></p>
	</div><!--.reserved-->	
<?php }

/***** DISPLAY CURRENCY IN 3 CODE DIGITS *****/
add_filter('woocommerce_currency_symbol', 'carolinaspa_currency', 10, 2);
function carolinaspa_currency($symbol, $currency) {
	$symbol = $currency . '(₹) ';
	return $symbol;
}

/***** CHANGE THE NUMBER OF COLUMNS IN SHOP PAGE *****/
add_filter('loop_shop_columns', 'carolinaspa_shop_columns', 20, 1);
function carolinaspa_shop_columns($columns) {
	return 4;
}

/***** CHANGE THE NUMBER OF PRODUCTS IN SINGLE PAGE *****/
add_filter('loop_shop_per_page', 'carolinaspa_shop_per_page', 20, 1);
function carolinaspa_shop_per_page($products) {
	$products = 8;
	return $products;
}

/***** DISPLAY A PLACEHOLDER IMAGE WHEN FEATURE IMAGE IS NOT AVAILABLE *****/
add_filter('woocommerce_placeholder_img_src', 'carolinaspa_no_feature_image');
function carolinaspa_no_feature_image($image_url) {
	$image_url = get_stylesheet_directory_uri() . '/images/no-image.jpg';
	return $image_url;
}

/***** ADDING SUBTITLE TO A SINGLE PRODUCT PAGE *****/
add_action('woocommerce_single_product_summary', 'carolinaspa_display_subtitle', 6);
function carolinaspa_display_subtitle() {
	global $post;
	$subtitle = get_field('subtitle', $post->ID); ?>
	<h3 class="subtitle"><?php echo $subtitle; ?></h3>
<?php }

/***** ADDING A NEW TAB WITH A VIDEO *****/
add_filter('woocommerce_product_tabs', 'carolinaspa_video_tab', 11, 1);
function carolinaspa_video_tab($tabs) {
	global $post;
	$video = get_field('video', $post->ID);
	if($video):
		$tabs['video'] = array(
			'title' => 'Video',
			'priority' => 5,
			'callback' => 'carolinaspa_display_video'
		);
	endif;
	return $tabs;

}

function carolinaspa_display_video() {
	global $post;
	$video = get_field('video', $post->ID);
	if($video): ?>
		<video controls autoplay>
			<source src='<?php echo $video; ?>'>
		</video>
	<?php endif;
}

/***** DISPLAY SAVINGS AS PERCENTAGE *****/
add_filter('woocommerce_get_price_html', 'carolinaspa_saved_price', 10, 2);
function carolinaspa_saved_price($price, $product) {
	if($product->get_sale_price()):
		$saved = wc_price($product->get_regular_price() - $product->get_sale_price());
		return $price . sprintf(__('<br> <span class="save-amount"> Save: %s </span>', 'woocommerce'), $saved);
	endif;
	return $price;
}

/***** DISPLAY BANNER IN THE CART PAGE *****/
add_action('woocommerce_check_cart_items', 'carolinaspa_cart_banner');
function carolinaspa_cart_banner() {
	global $post;
	$image_url = get_field('banner', $post->ID);
	if($image_url): ?>
		<div class="coupon-cart">
			<img src="<?php echo $image_url; ?>">
		</div><!--.coupon-cart-->
	<?php endif;
}

/***** DISPLAY BUTTON FOR CLEAR THE CART *****/
add_action('woocommerce_cart_actions', 'carolinaspa_empty_cart_button');
function carolinaspa_empty_cart_button() { ?>
	<a class="button" href="?empty-cart=true">Empty Cart</a>
<?php }

/***** ACTIVATING THE BUTTON FOR CLEAR THE CART *****/
add_action('init', 'carolinaspa_empty_cart');
function carolinaspa_empty_cart() {
	if(isset($_GET['empty-cart'])):
		global $woocommerce;
		$woocommerce->cart->empty_cart();
	endif;
}

/***** REMOVING EXTRA FIELDS FROM CHECKOUT *****/
add_filter('woocommerce_checkout_fields', 'carolinaspa_remove_checkout_fields', 20);
function carolinaspa_remove_checkout_fields($fields) {
	unset($fields['billing']['billing_phone']);
	return $fields;
}

/***** ADDING EXTRA FIELDS FROM CHECKOUT *****/
add_filter('woocommerce_checkout_fields', 'carolinaspa_adding_checkout_fields', 20);
function carolinaspa_adding_checkout_fields($fields) {
	$fields['billing']['itin'] = array(
		'css' => array('form-row-wide'),
		'label' => 'ITIN (Individual Taxpayer Identification Number)',
		'required' => true
	);
	$fields['order']['heard_about_us'] = array(
		'type' =>'select',
		'css' => array('form-row-wide'),
		'label' => 'How Did You Hear About Us ?',
		'options' => array(
			'default' => 'Choose...',
			'tv' => 'Television',
			'radio' =>'Radio',
			'newspaper' => 'Newspaper',
			'internet' => 'Internet',
			'social_media' => 'Social Media'
		),
		'required' => true
	);
	return $fields;
}

/***** ADDING REALTED PRODUCTS IN BLOG POST *****/
add_action('storefront_post_content_after', 'carolinaspa_blog_related_products');
function carolinaspa_blog_related_products() {
	global $post;
	$related_products = get_field('related_products', $post->ID);
	if($related_products):
		$product_ids = join(' ,', $related_products); ?>
		<div class="related-products">
			<h2 class="section-title">Related Products</h2>
			<?php echo do_shortcode('[products ids="'.$product_ids.'"]'); ?>
		</div><!--.related-products-->
	<?php endif;
}

/***** CHANGING ADD TO CART TEXT *****/
add_filter('woocommerce_product_add_to_cart_text', 'carolinaspa_change_add_to_cart_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'carolinaspa_change_add_to_cart_text');
function carolinaspa_change_add_to_cart_text() {
	return "ADD +";
}

?>