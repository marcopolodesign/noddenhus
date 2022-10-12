<?php 
get_header();
?>
<main id="main" class="home" data-barba="container"  data-barba-namespace="home">
    <div class="flex home-starter items-stretch relative overflow-hidden min-h-100-vh">
        <div class="w-50-ns bg-main-dark flex home-starter-text">
            <div class="mt-auto mb0 relative z-3 pa5 flex flex-column ">
                <?php echo get_field('home_text');?>
            </div>
        </div>

        <div class="w-50-ns relative video-container">
        <?php if (wp_is_mobile()): ?>
        <video class="home-video" autoplay="" loop="" playsinline=""  autopictureinpicture=""  muted=""  src="/wp-content/uploads/2021/09/Reel.mp4"></video>
         <?php else: ?>
            <video class="home-video" autoplay="" loop="" playsinline=""  autopictureinpicture=""   src="/wp-content/uploads/2021/09/Reel.mp4"></video>
        <?php endif;?>

             
        </div>
        <!-- <div class="black-overlay absolute-cover"></div> -->

    </div>

    <div class="hygge-home flex row-reverse w-100 column-mobile">
        <div class="bg-main-dark pa5 w-50-ns flex">
        <div class="m-auto pa4">
           <?php the_field('hygge_text');?>
        </div>
        </div>

        <div class="w-50-ns hygge-img relative">
            <div class="absolute-cover bg-center" style="background-image: url(<?php the_field('hygge_image');?>)"></div>
        </div>
    </div>
    


    <div class="home-products pv6 relative cover bg-center no-repeat container" style="background-image: url(<?php the_field('products_bg');?>)">
        <div class="measure-wide center">
         <h1 class="black tc"><?php the_field('home_products_title');?></h1>
        </div>
       
        <div class="home-products-grid flex column-mobile mt2 justify-between relative z-3 ph5-ns">
            <?php $products = get_posts(array('posts_per_page' => -1, 'post_type' => 'product', 'orderby' => 'title', 'order' => 'DESC', 'product_cat' => "Yerba Mate")); 
                foreach ($products as $product): 
                    $p = wc_get_product( $product->ID ); 
                    // $anio = get_post_meta( $product->get_id(), 'anio', true );
                    $image = wp_get_attachment_url( $p->get_image_id());
                ?>
                <div class="home-product mh3">
                    <img src=<?php echo $image;?>>
                    <div class="home-product-description measure center">
                       <h2 class="tc"><?php echo $p->name; ?></h2>
                       <p class="tc mt1 ph4 mb4"><?= $p->post->post_excerpt;?></p>
                       <a href="<?php the_permalink($product->ID);?>" class="main-cta m-auto w-max cta-font bg-black no-deco white flex">Comprar</a>

                    </div>
                </div>
                <?php endforeach; 
            ?> 
          
        </div>
        <div class="absolute bottom-0 left-0 w-100 home-products-overlay bg-main-light z-2"></div>

        <a href="/grid-shop" class="no-deco main-cta w-max cta-font bg-main-dark white relative z-3 flex center mt5">Ver todos los productos</a>

    </div>

    <div class="relative home-aob-image desktop">
        <div class="absolute-cover bg-center cover" style="background-image: url(<?php the_field('home_aob_image');?>)"></div>
    </div>


    <div class="pv6">
     <h1 class="tc f2">Nuestros Blends:</h1>
     <div class="home-blends-section relative">
        
         <?php if( have_rows('blends')) : while ( have_rows('blends') ) : the_row();?>
            <div class="product absolute top-0 left-0 w-100 h-100 pa4 container">
                <img class="mt3" src="<?php the_sub_field('product_image');?>">
                <div class="home-blends-text measure center">             
                    <h1 id="<?php the_sub_field('product_name');?>" class="product-title f1 black tc"><?php the_sub_field('product_name');?></h1>
                    <div class="grey tc mt3 lh-copy center"><?php the_sub_field('product_description');?></div>
                </div>
            </div>
         <?php endwhile; endif; ?>
         </div>

    

         <!-- Acá van los círculos -->

         <div class="flex jic home-blends-index  relative z-3 w-60-ns center">
            <?php if( have_rows('blends')) : while ( have_rows('blends') ) : the_row();?>
                <div class="blend-index product-index anchor flex flex-column items-center">
                    <img src=<?php the_sub_field('index_image');?>>
                    <h2 class="f3 mt3 black tc has-after main-font"><?php the_sub_field('product_name');?></h2>
                </div>
            <?php endwhile; endif; ?>
         </div>
      
           
    </div>

    <div class="home-video-bg relative flex pa5">
        <div class="absolute-cover" style="background-image:url(<?php the_field('video_thumbnail');?>)"></div>
            <div class="m-auto container relative z-2">
                <p class="cta-font white mb3 ttu tc">Espíritu Nøddenhus</p>
                <h1 class="white f1 tc" >Nøddenhus es un despertar. Es darte cuenta, vivir tal y como se presenta, cerrar tus ojos unos segundos, situarte mentalmente en el espacio que ocupás, sentir el aquí y ahora.</h1>
            </div>


    </div>

    <div class="home-aob">
        <div class="bg-white">
        <div class="container dn pt5 pb6 jic">
            <h1 class="black w-40-ns">Lo mejor de las culturas</h1>
            <p class="w-50-ns lh-copy">Productos pensados para resolver necesidades concretas de nuestros usuarios con una propuesta de calidad, invitando a los mismos a tomar distancia y mirar las cosas con perspectiva, vivir y disfrutar el momento.</p>
        </div>
        </div>

        <div class="flex column-mobile container jic relative mv5 pv5 home-ending w-100 overflow-hidden" background-color="white">
            <div class="w-70-ns ph5">
                <img src="<?php the_field('home_ending_image');?>">
            </div>
            <div class="w-40-ns absolute-center">
                <h1 class="black mb3">En Nøddenhus creemos en el valor<br>de la familia.</h1>
                <p class="black lh-copy main-font f3">Creemos en el concepto de hermandad, de unión, nuestra energía compartiendo un sueño y creando momentos únicos.</p>  

                <p class="black mt3 lh-copy">El concepto NØDDENHUS significa un tiempo relajado, acogedor, con amigos, con familia, con uno mismo, un tiempo que es bueno para el alma.

Queremos que el espíritu NØDDENHUS lo sientas, que lo hagas propio, que te transporte a los momentos cálidos de infancia, de risas, de abrazos.</p>
            </div>
        </div>
    </div>

</main><!-- #main -->

<?php
get_footer();
