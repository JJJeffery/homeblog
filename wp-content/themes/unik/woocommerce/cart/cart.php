<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="table cart-table table-hover" cellspacing="0">
	<thead>
		<tr>
			<th class="product-thumbnail">&nbsp;</th>
			<th class="product-name"><?php _e( 'Product', 'unik' ); ?></th>
			<th class="product-price"><?php _e( 'Price', 'unik' ); ?></th>
			<th class="product-quantity"><?php _e( 'Quantity', 'unik' ); ?></th>
			<th class="product-subtotal"><?php _e( 'Total', 'unik' ); ?></th>
			<th class="product-remove">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					<td class="td-cart-image">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $_product->is_visible() )
								echo $thumbnail;
							else
								printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
						?>
					</td>

					<td class="product-name">
						<?php
							if ( ! $_product->is_visible() )
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							else
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );

               				// Backorder notification
               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'unik' ) . '</p>';
						?>
					</td>

					<td class="product-price">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</td>

					<td class="product-quantity">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
						?>
					</td>

					<td class="product-subtotal">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
					<td class="product-remove td-remove">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><div class="icon-wrapper icon-border-round fa-lg"><i class="fa fa-trash-o"></i></a></div>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'unik' ) ), $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<tr>
			<td colspan="6" class="actions">
				<input type="submit" class="btn btn-primary" name="update_cart" value="<?php _e( 'Update Cart', 'unik' ); ?>" />
				<input type="submit" class="checkout-button btn btn-primary" name="proceed" value="<?php _e( 'Proceed to Checkout', 'unik' ); ?>" />
				
				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			</td>
		</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>
<div class="row"><div class="col-md-12"><div class="blank-spacer padding-small"></div></div></div>

<div class="row">
	<div class="col-md-6">
		<?php if ( WC()->cart->coupons_enabled() ) { ?>
			<div class="panel">
				<div class="panel-heading bg-color-default coupon text-center">
					<label for="coupon_code" class="lead panel-title color-white"><?php _e( 'Discount Code', 'unik' ); ?>:</label> 
				</div>
				<div class="panel-body">
					<p class="text-center"><?php _e( 'Please enter your coupon code if you have one.', 'unik' ); ?></p>
					<div class="form-group">
						<input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'unik' ); ?>" /> 
					</div>
					<input type="submit" class="btn btn-primary aligncenter" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'unik' ); ?>" />
					<?php do_action('woocommerce_cart_coupon'); ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="col-md-6">			
		<div class="cart-collaterals">

			<?php do_action( 'woocommerce_cart_collaterals' ); ?>

			<?php woocommerce_cart_totals(); ?>

			<?php woocommerce_shipping_calculator(); ?>

		</div>
	</div>
</div>
<?php do_action( 'woocommerce_after_cart' ); ?>