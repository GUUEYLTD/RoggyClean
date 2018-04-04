<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('single-product-wrap'); ?>>
	<div class="container woo-section-top">
		<div class="row">
			<div class="col-sm-5 col-md-4 col-sm-12 mb-50">
				<?php
					/**
					 * woocommerce_before_single_product_summary hook.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>
			<div class="col-sm-7 col-md-7 col-sm-12 col-md-offset-1 mb-50">
				<div class="woo-summary">
					<?php
						/**
						 * woocommerce_single_product_summary hook.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>
					<div class="woo-bottom-summary clearfix">
						<div class="woo-button-action-wrap clearfix">
							<?php
							/**
							 * wp_elementy_woocommerce_single_bottom_summary
							 *
							 * @hooked woocommerce_template_single_add_to_cart - 10
							 * @hooked wp_elementy_add_to_wishlist_custom_btn - 20
							 *
							 */
								do_action('wp_elementy_woocommerce_single_add_to_cart');
								do_action('wp_elementy_add_to_wishlist_custom_btn');
							?>
						</div>
						<?php
						/**
						 * wp_elementy_woocommerce_single_bottom_summary
						 *
						 * @hooked woocommerce_template_single_meta - 10
						 * @hooked woocommerce_template_single_sharing - 20
						 */
							do_action('wp_elementy_woocommerce_single_bottom_summary'); 
						?>
					</div>
				</div><!-- .summary -->
			</div>
		</div>
	</div>
	<div class="container mb-100">
		<?php
		    /**
		     * woocommerce_after_single_product_summary hook
		     *
		     * @hooked woocommerce_output_product_data_tabs - 10
		     * @hooked woocommerce_upsell_display - 15
		     * @hooked woocommerce_output_related_products - 20
		     */
		    do_action( 'woocommerce_after_single_product_summary' );
    	?>
    </div>

    <div class="single-shop-info-wrap">
    	<?php do_action('wp_elementy_woocommerce_single_shop_info'); ?>
    </div>   

    <div class="single-shop-clients-wrap">
    	<?php do_action('wp_elementy_woocommerce_single_shop_clients_gallery'); ?>
    </div>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
