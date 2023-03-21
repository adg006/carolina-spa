<?php
/*
	Plugin Name: bxSlider for woocommerce
	Author: Arindam Dasgupta
	Version: 1.0
	Text-Domain: woocommerce
	Description: Adding BxSlider into Woocommerce
*/

defined('ABSPATH') or die();

/***** ENQUEUING ALL STYLE AND SCRIPTS *****/
add_action('wp_enqueue_scripts', 'wocommerce_bxSlider_scripts');
function wocommerce_bxSlider_scripts(){
	wp_enqueue_style('bxslider-css', plugin_dir_url(__FILE__) . 'css/woocommerce-bxSlider.css', array(), '1.0');
	wp_enqueue_style('woocommerce-bxslider-css', plugin_dir_url(__FILE__) . 'css/jquery.bxslider.css', array(), '4.2.12');
	wp_enqueue_script('bxslider-js', plugin_dir_url(__FILE__) . 'js/jquery.bxslider.js', array(), '4.2.12', true);
	wp_enqueue_script('woocommerce-bxslider-js', plugin_dir_url(__FILE__) . 'js/woocommerce-bxSlider.js', array('bxslider-js'), '1.0', true);
}

/***** CREATING A SHORTCODE FOR BXSLIDER *****/
add_shortcode('woocommerce_bxSlider', 'woocommerce_bxSlider_shortcode');
function woocommerce_bxSlider_shortcode() {
	$args = array(
		'posts_per_page' => 10,
		'post_type' => 'product',
		'meta_key' => '_thumbnail_id',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_visibility',
				'field' => 'name',
				'terms' => 'featured',
				'operator' => 'IN'
			)
		)
	);
	$slider_products = new WP_Query($args); ?>
	<ul class="slider-products">
		<?php while($slider_products->have_posts()): $slider_products->the_post(); ?>
			<li>
				<a href="<?php echo the_permalink(); ?>">
					<?php the_post_thumbnail('shop_catalog'); ?>
					<?php the_title('<h3>', '</h3>'); ?>
				</a>
			</li>
		<?php endwhile; wp_reset_postdata();	?>
	</ul><!--.slider-products-->
<?php }

?>