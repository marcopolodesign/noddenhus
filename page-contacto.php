<?php 
  /* Template Name: Contacto  */
get_header();
?>
<main id="main" class="contacto" data-barba="container"  data-barba-namespace="contacto mt0">
  <section class="flex row-reverse flex-wrap items-center contact-container bg-main-light">
          <div class="w-40 center m-auto log-in-container ph3 pt5">
              <!-- <h1 class="main-color"><?php the_title();?></h1> -->
              <div class="m-auto">
                <?php while ( have_posts() ) :the_post();
                the_content(); 
                endwhile;?>
              </div>
          </div>

          <div class="w-50 min-h-100-vh relative">
            <div class="absolute-cover" style="background-image: url(<?php the_post_thumbnail_url(26, 'full' ); ?>)">
            </div>
          </div>
        </section>

        <!-- <section class="bg-main-light mv5">
          <div class="container pv4">
            <h1 class="f1 lsf-dark-pink tc mv3 white"><?php the_field('faq_caption');?></h1>
            <div class="secondary-cta center">
              <a href="/faq" class="ttu lsf-dark-pink tc db w-max center no-deco">Ver FAQ</a>
            </div>
          </div>
        </section>
     -->



</main><!-- #main -->

<?php
get_footer();
