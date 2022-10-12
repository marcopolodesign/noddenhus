<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;



?>

<div class="woocommerce-order">

<section header-color="black" bg-color="white" class="bg-main-light container">

<div class="flex justify-between items-start column-mobile pt5">
	<?php if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>


		<?php else : ?>


			<div class="flex flex-column  justify-center list-none w-60-ns pr6-ns" bg-color="white">
			<h1 class="f1 measure-wide mb1 woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h1>
			<p class="mb4 mt2 measure-wide">Vas a recibir un mail con detalles de tu compra. Si elegiste retiro en pick up point nos vamos a poner en contacto por whatsapp para coordinar la entrega. </p>

			<?php if ($order->get_payment_method() == 'bacs') : ?>
				
				<div class="flex justify-between cbu-info-container mb4 pa4">
					<div class="w-20-ns">
						<?php get_template_part('template-parts/content/bank'); ?>
					</div>
					<div class="pl3">
						<h2 class="mb2">Transferencia Bancaria</h2>
						<p>Para poder confirmar tu pedido y procesarlo, por favor enviar dinero a cuenta nuestro CBU <span>1500058900030532737750</span> a nombre de Nøddenhus</p>
						<input value="1500058900030532737750" type="text" class="dn" id="cbu">
						<button class="cbu-copy dn" onclick="myFunction()">Copiar CBU</button>
					</div>
				</div>
				
			<?php endif; ?>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details list-none flex flex-column items-start mb4">
				<div class="border-ty pa4 w-100">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

				</ul>

				


				
				<!-- <h1><?php echo $order->get_payment_method(); ?></h1> -->

		
		

		<?php endif; 



		
		if ($order->get_payment_method() != 'bacs') : 
			 do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); 
		endif; ?>
		</div>
		<div class="w-40-ns">
			<div class="order-product-details">
				<h2 class="mb2">Resumen de tu compra:</h2>
				<?php $items = $order->get_items();
					foreach ( $items as $item ) :
				// echo $item;
				$product_name = $item->get_name();
			
				$product_id = $item->get_product_id();
				$product_variation_id = $item->get_variation_id();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
				?>
				<div class="order-product flex jic">
					<div class="w-30-ns order-product-img">
						<img src="<?php echo $image[0]; ?>" >
					</div>
					<div class="order-product-info" style="flex: 1 0 0;">
						<h2 class="mb2 f4"><?php echo $product_name;?></h2>
						<h2 class="mb2 f4">Cantidad: <?php echo $item->get_quantity();?></h2>
					</div>

					<div class="order-product-price">
						<h2 class="mb2 f6 o-0">N</h2>
						<h2 class="mb2 f3">$<?php echo $item->get_subtotal();?></h2>
					</div>


				</div>
			<?php endforeach ;?>
			
		
			<div class="order-total">
				<div class="flex jic mb2 w-100">
					<h2 class="f4">Subtotal</h2>
					<h2 class="f4">$<?php echo $order->get_subtotal();?></h2>
				</div>

				<div class="flex jic mb2 w-100">
					<h2 class="f4">IVA e impuestos:</h2>
					<h2 class="f4">$<?php echo $order->get_total_tax();?></h2>
				</div>

		

				<div class="flex jic mb2 w-100">
					<h2 class="f4">Precio de envío:</h2>
					<h2 class="f4">$<?php echo $order->get_shipping_total();?></h2>
				</div>
			</div>

			<div class="order-final-total flex jic">
				<h2 class="f2">Total:</h2>
				<h2 class="f2"><?php echo $order->get_formatted_order_total();?></h2>
			</div>
		</div>

			<!-- <?php echo $order;?> -->

			<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?> 
		</div>
	
				
	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

		<?php endif; ?>
		<?php $test_order = new WC_Order(700); ?>
		<h1 class="dn"><?php 
		echo $test_order->get_order_key();
		?></h1>


		</div>
	</div>
</div>




<style>
	.woocommerce-order-details, .order-product-details, .woocommerce-column--shipping-address {
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		margin-bottom: 40px;
		background-color: white;
		padding: 30px;
		border-radius: 8px;
	}

	.woocommerce-order-details, .woocommerce-column--billing-address {
		display: none !important
	}
	.order-product:not(:first-of-type), .order-total, .order-final-total {
		border-top: 1px solid var(--grey);
		margin-top: 20px;
		padding-top: 20px;
	}

	.woocommerce-table--order-details {
		margin: auto;
	}

	.woocommerce-customer-details {
		margin-bottom: 60px;
	}

	.cbu-copy {
		-webkit-apperance: none;
		background-color: var(--mainDarkColor);
		color: white;
		width: 100%;
		padding: 15px 25px;
		margin-top: 25px;
		border: none;
		outline: none;
	}

	.cbu-info-container, .border-ty {
		border: 1px solid var(--mainDarkColor)
	}
</style>
