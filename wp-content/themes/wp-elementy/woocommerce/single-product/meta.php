<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product-meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<ul class="product-meta-inner">
		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<li class="sku_wrapper">
				<label><?php esc_html_e( 'SKU:', 'wp-elementy' ); ?></label>
				<span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'wp-elementy' ); ?></span>
			</li>
		<?php endif; ?>
		<?php echo balanceTags($product->get_categories( ', ', '<li class="posted_in">' . _n( '<label>Category:</label>', '<label>Categories:</label>', $cat_count, 'wp-elementy' ) . ' ', '</li>' )); ?>
		<?php echo balanceTags($product->get_tags( ', ', '<li class="tagged_as">' . _n( '<label>Tag:</label>', '<label>Tags:</label>', $tag_count, 'wp-elementy' ) . ' ', '</li>' )); ?>
	</ul>
	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>