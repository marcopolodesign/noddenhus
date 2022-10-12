<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
global $wp_query;
$terms_post = get_the_terms( $post->cat_ID , 'product_cat' );
$cat_name = $terms_post[0]->name;

$category = get_term_by( "name", $cat_name, "product_cat" );
$category_id = $category->term_id;

$thumbnail_id = get_woocommerce_term_meta($category_id, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );  


?>
 

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?> style="background-color: <?php the_field('product_bg_color');?>">

	<div class="product-header flex items-center <?php the_title();?>">
		<div class="featured-images	relative overflow-hidden h-100 w-50-ns">
		<div class="flex absolute-cover <?php if(get_field('siblings')): ;?>bg-bottom<?php else : ?>bg-center <?php endif;?> featured" style="background-image: url('<?php 	the_field('main_image');?>')"> 
			</div>
				<?php
				// $variations = $product->get_available_variations();
				$id = $product->get_id();;
					$attachment_ids = $product->get_gallery_image_ids();
					foreach( $attachment_ids as $attachment_id ) { ?>
							<div class="flex absolute-cover bg-center featured" style="background-image: url('	<?php echo $Original_image_url = wp_get_attachment_url( $attachment_id );?>')"> 
						</div>
				
				<?php 
						// Display Image instead of URL
						// echo wp_get_attachment_image($attachment_id, 'full');
						}
				?>
			
				<div class="absolute top-0 left-0 w-100 h-100 variations-container">
				<!-- <?php foreach ( $variations as $variation ) : ?>

				<div class="absolute-cover dn <?php if(get_field('siblings')): ;?>bg-bottom<?php else : ?>bg-center <?php endif;?>" style="background-image: url('<?php echo $variation['image']['url']; ?>')"></div>

				<?php endforeach ; ?> -->

				</div>
		</div>

	


		<div class="product-info pv7 w-50-ns ph5-ns summary entry-summary">

			<a class="mb3-ns flex items-center relative back-to-shop has-after black no-deco" href="javascript:history.back()">
				<svg width="25" height="25" class="mr2" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M29.9747 15.4941L1.99999 15.494M1.99999 15.494L11.5671 25.0611M1.99999 15.494L11.5671 5.9269" stroke="black" stroke-width="1.5"/></svg>
				Volver al shop
			</a>
			<h1 class=" mt4-ns"><?php the_title();?></h1>
			<div class="flex items-center mt2-ns mb3-ns">
				<h2 class="f4"><?php the_content();?></h2>
			</div>
			<p class="black product-price main-font f2 lh1 fw6 mb3-ns"><span class="f5">$ </span><?php echo $product->price; ?></p>

			<div class="flex flex-column product-header-info">
				<!-- <p class="mt2 lh-copy"><?php echo $product->post->post_content ?></p> -->
				<?php if (get_field('product_details')): ?>
				<div class="product-details mt4 flex items-end justify-between mt3">
					<?php
						if( have_rows('product_details') ): while ( have_rows('product_details') ) : the_row();?>
							<div class="flex flex-column items-center product-detail">
								<div class="product-icon flex mb1">
									<img class="m-auto" src="<?php the_sub_field('detail_icon');?>">
								</div>
								<p class="white tc f5"><?php the_sub_field('detail_name');?></p>
								<p class="white tc f6"><?php the_sub_field('detail_value');?></p>
							</div>
						<?php endwhile; endif; ?>
				</div>
				<?php endif; ?>

				<?php add_filter( 'woocommerce_variation_option_name', 'display_price_in_variation_option_name' );
				function display_price_in_variation_option_name( $term ) {
					global $wpdb, $product;

					if ( empty( $term ) ) return $term;
					if ( empty( $product->id ) ) return $term;

					$id = $product->get_id();

					$result = $wpdb->get_col( "SELECT slug FROM {$wpdb->prefix}terms WHERE name = '$term'" );

					$term_slug = ( !empty( $result ) ) ? $result[0] : $term;

					$query = "SELECT postmeta.post_id AS product_id
											FROM {$wpdb->prefix}postmeta AS postmeta
													LEFT JOIN {$wpdb->prefix}posts AS products ON ( products.ID = postmeta.post_id )
											WHERE postmeta.meta_key LIKE 'attribute_%'
													AND postmeta.meta_value = '$term_slug'
													AND products.post_parent = $id";

					$variation_id = $wpdb->get_col( $query );

					$parent = wp_get_post_parent_id( $variation_id[0] );

					if ( $parent > 0 ) {
							$_product = new WC_Product_Variation( $variation_id[0] );
							return $term . ' (' . wp_kses( woocommerce_price( $_product->get_price() ), array() ) . ')';
					}
					return $term;
					}
				?>
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' ); 
				?>
				
			</div>
		</div>
	</div>


	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );


	

	?>

<section class="order-minsc container pv4">
		<div class="flex items-center justify-between container">
				<div class="shipping-info">
						<div class="shipping-icon flex">
							<!-- <img class="m-auto" src="/wp-content/uploads/2020/02/Group-702.svg"> -->
						</div>
						<p class="black">Productos 100% Agroecológicos</p>
				</div>

				<div class="payment-info">
						<div class="shipping-icon flex">
							<!-- <img class="m-auto" src="/wp-content/uploads/2020/02/Group-704.svg"> -->
						</div>
						<p class="black">Pagá con tarjeta de crédito y en cuotas</p>
				</div>

				<div class="shipping-info">
						<div class="shipping-icon flex">
							<!-- <img class="m-auto" src="/wp-content/uploads/2020/02/Group-705.svg"> -->
						</div>
						<p class="black">Yerba Madre Elaborada con palo</p>
				</div>
		</div>
</section>

	<?php	
	// Content del Product
 	get_template_part("template-parts/product/template-content", get_post_type());
	
	
	do_action( 'woocommerce_after_single_product' ); 
 ?>

