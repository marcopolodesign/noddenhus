<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
} 

$hasBg = get_field('product_bg_color');
?>


<div 
	<?php if ($hasBg): ?> background-color=<?php echo $hasBg; endif; ?>

class="is-product pv4 mv4 <?php the_title();?>"<?php wc_product_class( '', $product ); 
	$mainImage = get_field('main_image');
	$image1 = get_field('image_1');
	$image2 = get_field('image_2');
?>>

		<div class="img-container relative center center relative ">
		<?php if ($image1) : ?>
			<div class="image-1 absolute top-0 left-0 o-0">
				<img src="<?php the_field('image_1'); ?>">
			</div>
		<?php endif; 
		if ($image2) : ?>
			<div class="image-2 absolute bottom-0 right-0 pr5 o-0">
				<img src="<?php the_field('image_2'); ?>">
			</div>
			<?php endif; 
			
			$variable = get_field('custom_link');
			$link = get_permalink();
			?>

			<a href="
				<?php
					if (get_field('custom_link')) : echo the_field('custom_link');
					else : echo $link; 
					endif;	?>"
				class="product-main flex flex-column center w-70-ns center black no-deco">
				<div class="product-main-img">
					<img src='<?php echo $mainImage; ?>'>
				</div>
			
				<div class="flex items-center justify-between pa4">
					<div>
						<h2 class="f2 black"><?php the_title();?></h2>
						<p class="mt1 f6 pr4-ns"><?php echo wp_trim_words( get_the_excerpt(), 21 , '...' ); ?></p>
					</div>

					<div class="inline-flex">
						<p class="no-deco main-cta w-max cta-font bg-main-light flex m-auto">Comprar</p>
					</div>
				
				</div>
			</a>

		</div>
	

	
</div>
