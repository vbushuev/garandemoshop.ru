<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php
$_order_total = WC()->cart->get_total();
if(preg_match('/\<span\s*class\="amount"\>(.+?)\</i',$_order_total,$m)){
	$_order_total = $m[1];
}
$formstr='<form method="post" id="garan24-democheckout" action="https://service.garan24.ru/democheckout/checkout">';
$formstr.='<input type="hidden" name="x_secret" value="cs_6fe8837da7fbc5a9c7d242e5741ca0a431dc533b">';
$formstr.='<input type="hidden" name="x_key" value="ck_3dbb47baeb9b805dc48074dbb33f140c904f8901">';
$formstr.='<input type="hidden" name="version" value="1.0">';
$formstr.='<input type="hidden" name="response_url" value="http://garandemoshop.ru">';

$formstr.='<input type="hidden" name="order[order_id]" value="555">';
$formstr.='<input type="hidden" name="order[order_url]" value="https://youronlinestore.com/order/#id">';
$formstr.='<input type="hidden" name="order[order_total]" value="'.$_order_total.'">';
$formstr.='<input type="hidden" name="order[order_currency]" value="RUB">';

$i=0;
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	$_product_img = $_product->get_image();

	if(preg_match("/src\=[\"'](.+?)[\"']/i",$_product_img,$m)){
		$_product_img = $m[1];
	}

	$formstr.='<input type="hidden" name="order[items]['.$i.'][product_id]" value="'.$product_id.'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][title]" value="'.$_product->get_title().'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][description]" value="'.$_product->get_title().'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][product_url]" value="'.htmlspecialchars($_product->get_permalink( $cart_item )) .'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][product_img]" value="'.htmlspecialchars($_product_img).'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][quantity]" value="'.$cart_item['quantity'].'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][weight]" value="'.$_product->get_weight().'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][dimensions][height]" value="'.$_product->get_height().'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][dimensions][width]" value="'.$_product->get_width().'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][dimensions][depth]" value="'.$_product->get_length().'">';
	$formstr.='<input type="hidden" name="order[items]['.$i.'][regular_price]" value="'.$_product->get_regular_price().'">';
	$i++;
}
$formstr.='</form>';

?>
<script type="text/javascript">
	if(jQuery("#garan24-democheckout").length==0){
		console.debug('<?php echo $formstr;?>');
		jQuery('<?php echo $formstr;?>').appendTo('body').submit();
	}
</script>
<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<td class="product-name">
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
							<?php echo WC()->cart->get_item_data( $cart_item ); ?>
						</td>
						<td class="product-total">
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
						</td>
					</tr>
					<?php
				}
			}

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php _e( 'Total', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>
