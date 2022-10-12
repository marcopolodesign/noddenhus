<?php $mainColor = '#fff';
    $moreSpacing = get_field('mt_true');
?>

<div class="header-title-center center w-70-ns pt5-ns z-4 relative<?php echo $moreSpacing;?>">
  <h1 class="f0 tc mv3 main-font pt5 lh1" style="color:<?php echo $mainColor;?>">
   <?php the_title();?>
  </h1>

  <div class="w-80-ns center tc page-description mb4" style="color=<?php echo $mainColor;?>">
    <?php 
      if(have_posts() ) : while(have_posts() ) : the_post(); 
        the_content();
      endwhile; endif;
    ?>
  </div>
</div>


</style>
