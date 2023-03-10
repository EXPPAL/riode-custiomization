<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}
?>
<li class="product-list-sm product product-loop">
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
	<a class="product-media" href="<?php echo esc_url( $product->get_permalink() ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo riode_strip_script_tags( $product->get_image() ); ?>
	</a>
	<div class="product-details">
		<a class="product-title" href="<?php echo esc_url( $product->get_permalink() ); ?>"
			title="<?php echo esc_attr( $product->get_title() ); ?>">
			<?php echo esc_html( $product->get_title() ); ?>
		</a>
		<?php if ( ! empty( $show_rating ) ) : ?>
			<?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php endif; ?>
		<?php echo riode_escaped( $product->get_price_html() );  // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>
	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
