<?php
/*
Template Name: Homepage
*/
get_header(); ?>


<?php do_action( 'foundationpress_before_content' ); ?>


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
  $events = tribe_get_events();

  // get only the most recent event from all events :)
  $event_list = new WP_Query( array(
      'post_type' => 'event',
      'orderby' => 'date',
      'order' => 'DESC', 
      'max_num_pages'=>1
  ));
?>
  

 <div class ="full-width">

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
          <div class="homepage-full row" style="background-image:url('<?php echo $slider_image['url']; ?>');">
            <div class="orbit-content">
              <h5 class="homepage-slider-title"><?php echo $slider_title; ?></h5>
                <p><?php echo $slider_content; ?></p>

            </div>
          </div>
          <?php endif; ?>
          
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



    <?php if ($insights):?>
    <div class="row display">
      <div class="medium-4 large-8 columns">
        <img src ="<?php echo get_field('insights_image');?>">
          <?php foreach ($insights as $dog=>$cat):?>
          <p><?php echo $cat->post_title;?></p>
          <?php endforeach;?>
      </div>
      <div class="medium-8 large-4 columns">
        <?php foreach ($in_news as $dog=>$cat):?>
        <p><?php echo $cat->post_title; ?></p>
        <?php endforeach;?>
      </div> 
    </div>
    <?php endif;?>

    <div class = "row display">
      <div class ="medium-3 columns">
      <?php if ($white_collar):?>
       <?php foreach ($white_collar as $dog=>$cat):
        echo $cat->post_title;
      endforeach;?> 
      <?endif;?>
      </div>
      <div class ="medium-3 columns">
        <img src ="<?php echo get_field('blog_header');?>">
      <?php if ($government_contracts):?>
        <?php foreach ($government_contracts as $dog=>$cat):
          echo $cat->post_title;
        endforeach;?>
      </div>
      <?endif;?>
      <div class ="medium-3 columns">
        <img src ="<?php echo get_field('events_header');?>">
        <?php if($event_list):?>
        <?php foreach($event_list as $cat=>$dog):?>
          <div class="homepage-slide-title">
            <h5><?php echo $dog-> post_title;?></h5>
          </div>
        <?php endforeach;?>
      <?php endif;?>
      </div>
    </div>

      
    <section class ="homepage-full row" style="background-image: url('<?php echo get_field('public_interest_background'); ?>');"  >
      <div class="public-interest-learn-more">
        <p><?php echo get_field('center_for_public_interest_description');?></p>
        <button><a href="<?php echo get_field('center_for_public_interest_url');?>">Learn More</a></button>
      </div>
    </section>

</div>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_footer();