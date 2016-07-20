<?php
/*
Template Name: Homepage
*/
get_header(); ?>


<?php do_action( 'foundationpress_before_content' ); ?>

<p> I AM THE HEADER </p>
<div id="page-full-width" role="main">
<?php
// all our content is loaded at the beginning :) 
  $gov_array = array( 'category_name' => 'government_contracts'); 
  $government_contracts = get_posts($gov_array);
  $white_collar_array = array('category_name' => 'white_collar');
  $white_collar = get_posts($white_collar_array);
  $news_array = array('category_name' => 'in_the_news');
  $in_news = get_posts($news_array);
  $insights_array = array('category_name' => 'insights');
  $insights = get_posts($insights_array);
  // iterate and get info from our content for our grid display :)
  foreach ($insights as $dog=>$cat):
    echo $cat->post_title;
  endforeach;
  foreach ($government_contracts as $dog=>$cat):
    echo $cat->post_title;
  endforeach;
  foreach ($white_collar as $dog=>$cat):
    echo $cat->post_title;
  endforeach; 
  foreach ($in_news as $dog=>$cat):
    echo $cat->post_title;
  endforeach;
?>
  <section class ="homepage-slider">
    <?php if( have_rows('homepage_slider') ): ?>
      <?php $count = 0; ?>
						<div class="orbit" role="region" aria-label="Latest Updates from Brown Rudnick" data-orbit>
						  <ul class="orbit-container">
						    <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
						    <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
						    <?php while(have_rows('homepage_slider') ):
						    	the_row();
										$slider_image = get_sub_field('homepage_slider_image');
                    $slider_title = get_sub_field('homepage_slider_title');
                    $slider_content = get_sub_field('homepage_slider_description');
                  ?>
        <li class="<?php if ($count == 0) { ?>is-active<?php } ?> orbit-slide <?php if( !empty($slider_image) ) { ?>has-image<?php } else { ?>no-image<?php } ?> <?php echo $slider_color; ?>">
          <?php if( !empty($slider_image) ): ?>
          <div class="homepage-slider-image">
            <img class="orbit-image" src="<?php echo $slider_image['url']; ?>" alt="<?php echo $slider_image['alt'] ?>" />
          </div>
          <?php endif; ?>
          <div class="orbit-content">
            <h5 class="homepage-slider-title"><?php echo $slider_title; ?></h5>
            <?php echo $slider_content; ?>
          </div>
        </li>
        <?php $count++; ?>
        <?php endwhile; ?>
      </ul>
      <nav class="orbit-bullets">
        <?php $count = 0; ?>
        <?php while( have_rows('homepage_slider') ): the_row(); 
          $slider_title = get_sub_field('homepage_slider_title');
        ?>
        <button class="<?php if ($count == 0) { ?>is-active<?php } ?>" data-slide="<?php echo $count; ?>"><span class="show-for-sr">
        <?php echo $slider_title; ?></span><?php if ($count == 0) { ?><span class="show-for-sr">Current Slide</span><?php } ?></button>
        <?php $count++; ?>
        <?php endwhile; ?>
      </nav>
		</div>
					<?php endif; ?>
	</section>

  <div class = "grids">
  <p>Repeaters</p>
  </div>

    <div class= "public-interest">
      <?php $background_img = get_field_object('public_interest_background'); ?>
      <img src ="<?php echo $background_img['value'];?>">
    </div>
  </div>



<?php do_action( 'foundationpress_after_content' ); ?>


<?php get_footer();