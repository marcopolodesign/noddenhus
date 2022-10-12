<div class="faq-filter sticky w-30-ns pr4 flex flex-column">
  <div class="ph3 pa4">
    <h2 class="f2 mb3 tc">Filtrar por</h2>
    <div class="filters-container w-100 overflow-x-scroll">
      <div class='filters-scroll w-max flex flex-column m-auto'>
      <?php if( have_rows('filters') ):
        while ( have_rows('filters') ) : the_row();?>
        <h2 id="<?php the_sub_field('filter_name');?>" class="grey f4 main-font mb2 inline-flex w-max pointer has-after tc m-auto pt2"><?php the_sub_field('filter_name'); ?></h2>
      <?php endwhile; endif; ?>
      </div>
      </div>
  </div>
</div>

<div class="w-70-ns faq-content pl4">
  <div class="faq-category-container">
    <?php if( have_rows('faq_container') ): while ( have_rows('faq_container') ) : the_row();
      $color = get_sub_field('color');
    ?>
      <div class="faq-category" faq-cat="<?php the_sub_field('faq_cat');?>">
        <h2 class="white pa3 mb3" style="background-color: <?php the_sub_field('color');?>"><?php the_sub_field('faq_cat');?></h1>
          <?php if( have_rows('faq') ): while ( have_rows('faq') ) 
          : the_row(); if (get_sub_field('question')):?>
            <div class="faq-item pa3 mb4 eki-violet-border" area-expanded="false" style="border: 1px solid <?php echo $color; ?>">
              <h2 class="black fw3 faq-question"><?php the_sub_field('question'); ?></h2>
              <div class="faq-answer">
                <?php the_sub_field('answer'); ?>
              </div>
             

            </div> 
          
          <?php endif; endwhile; endif;?>

      </div>

    <?php  endwhile; endif; ?>
  </div>
</div>


<style>

  /* GOE Customs */
    .faq-filter >div {
      border: 1px solid #000;
    }

  
    .faq-answer {
      max-height: 0;
     opacity: 0;
    }

/* General FAQ */

.faq-filter {
  top: 180px;
}

.faq-filter > h2:not(:first-child) {
  color: var(--grey);
}

.faq-filter h2 {
  transition: all 0.3s ease;
}

.faq-filter  h2:hover {
  color: var(--mainDarkColor) !important;
}

.faq-content {
  min-height: 500px;
}

.faq-item {
  position: relative;
}

.faq-item::after {
  position: absolute;
  top: 0;
  right: 0;
  margin-top: 12px;
  margin-right: 20px;
  content: '+';
  color: #000;
  font-size: 24px;
  transition: transform 0.3s ease;
  transform-origin: center;
}

.faq-item[area-expanded='true']::after {
  transform: rotate(45deg);
}

.faq-item p:last-child,
.faq-item p:nth-child(2) {
  color: var(--darkgrey);
  /* margin-top: 10px; */
}

.faq-item {
  max-height: min-content;
  max-height: -moz-min-content;
  max-height: intrinsic;
  /* transition: all 0.3s ease; */
  background-color: var(--lightpink);
  cursor: pointer;
}

.faq-item[area-expanded='true'] {
  max-height: 500px;
}

.faq-item[area-expanded='false'] p:not(:first-child) {
  /* display: none; */
}

.faq-item[area-expanded='true'] p:not(:first-child) {
  /* transition: all 0.3s ease; */
}

.faq-question {
  position: relative;
}

.faq-question::after {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  content: '';
  /* background-image: url('/wp-content/uploads/2020/01/arrow-pink.svg'); */
  height: 100%;
  transition: all 0.3s ease;
  width: 8.5px;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}

.faq-item[area-expanded='true'] .faq-question::after {
  transform: translateY(-50%) rotate(90deg);
}


@media (max-width: 580px) {

  .faq-container {
    flex-direction: column;
  }

  .faq-filter {
    position: relative;
    top: 0;
    flex-direction: row;
    flex-wrap: wrap;
    padding-right: 0;
    width: 100%;
    overflow: hidden;
  }

  .faq-filter > h2:first-child {
    width: 100%;
    margin-bottom: 10px;
  }

  .faq-content {
    padding-left: 0;
    margin-top: 30px;
  }

  .filters-scroll {
    flex-direction: row;
    flex-wrap: wrap;
    width: 100%;
    justify-content: center;
    align-items: center;
  }

  .filters-scroll h2 {
    margin-right: 15px;
    color: #707070;
    font-family: var(--mesina);
    font-size: 16px;
  }

  .faq-question {
    padding-right: 25px;
  }

  /* FAQ Mobile */

  .featured-faq {
    max-width: 100% !important;
    margin-bottom: 30px;
  }

  /* .faq-filter.sticky {
    overflow: visible;
  } */

  .filters-scroll h2:last-child {
    margin-right: auto;
  }

  .faq-answer p {
    line-height: 1.2;
  }


}
</style>
