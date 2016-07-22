<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

<?php
// all our content is loaded at the beginning :) 
  $gov_array = array( 'category_name' => 'government_contracts', 'numberposts'=>1); 
  $government_contracts = get_posts($gov_array);
  $white_collar_array = array('category_name' => 'white_collar', 'numberposts'=>1);
  $white_collar = get_posts($white_collar_array);
  $news_array = array('category_name' => 'in_the_news', 'numberposts'=>1);
  $in_news = get_posts($news_array);
  $insights_array = array('category_name' => 'insights', 'numberposts'=>1);
  $insights = get_posts($insights_array);

  // get only the most recent event from all events :)
  $event_list = new WP_Query( array(
      'post_type' => 'event',
      'orderby' => 'date',
      'order' => 'DESC', 
      'max_num_pages'=> 1
  ));
?>

 <div class ="full-width">

  <div class = "slider-container" label="Latest Updates from Brown Rudnick" > <!-- start slider container -->
    <?php if( have_rows('homepage_slider') ): ?>
      <?php $count = 0; ?>
      <?php while(have_rows('homepage_slider') ):
        the_row();
        $slider_image = get_sub_field('homepage_slider_image');
        $slider_title = get_sub_field('homepage_slider_title');
        $slider_content = get_sub_field('homepage_slider_description'); ?>
      <?php if (!empty($slider_image)):?>
      <p class="prev-slider-home">prev</p>
      <p class="next-slider-home">next</p>
      <div class="human-icon"></div> 
      <!-- slide -->
      <div class="slide" style="background-image:url('<?php echo $slider_image['url']; ?>');">
        <div class="slide-description">
            <h2 class="homepage-slider-title"><?php echo $slider_title; ?></h2>
            <div class="slide-description-heading">
            </div>
            <?php $abbreviation = substr($slider_content, 0, 60);?>
          <p><?php echo $abbreviation; ?></p>
          <button class="home-button">Learn More</button>
    <?php endif;?>
      </div>
     </div> <!-- end slide -->
    <?php $count++;?>    
    <?php endwhile; ?>
  <?php endif; ?>
  </div> <!-- end of slider container -->

    <?php if ($insights):?>
      <?php foreach ($insights as $dog=>$cat):?>
            <?php $category = get_the_category($cat->ID);?>
    <div class="row display homepage-row">
      <div class="medium-4 large-8 columns homepage-grid-element">
          <img class="insights-image" src ="<?php echo get_field('insights_image');?>">
            <?php foreach ($category as $bunny=>$rabbit):?>
            <p class="homepage-header-text"><?php echo $rabbit->name;?></p>
            <div class="homepage-header-container">
            </div>
          <?php endforeach; ?>
          <p><?php echo str_replace('-','/',substr($cat->post_date, 0,10));?></p>
          <h5><?php echo $cat->post_title;?></h5>
      <?php endforeach;?>
    <?php endif;?>
      </div>

      <?php if ($in_news):?>
      <div class="medium-8 large-4 columns homepage-grid-element">
        <p class="homepage-header-text">PLACEHOLDER CATEGORY</p>
        <div class="homepage-header-container">
        </div>
        <?php foreach ($in_news as $dog=>$cat):?>
        <p><?php echo str_replace('-','/',substr($cat->post_date, 0,10));?></p>
        <h5><?php echo $cat->post_title; ?></h5>
        <?php endforeach;?>
      <?php endif;?>
      </div>

    </div>
  

    <div class = "row">

      <div class ="medium-4 homepage-grid-element columns">
        <?php if ($white_collar):?>
         <?php foreach ($white_collar as $dog=>$cat):?>
          <?php $category = get_the_category($cat->ID);?>
          <?php foreach($category as $blog_category=>$name):?>
             <p class="homepage-header-text"> Blog: <?php echo $name->name;?> </p>
          <?php endforeach;?>
          <p><?php echo $cat->post_title;?></p>
        <?php endforeach;?> 
        <?php endif;?>
      </div>

      <div class ="medium-4 homepage-grid-element columns">
        <img src ="<?php echo get_field('blog_header');?>">
          <p class="homepage-header-text">Blog: PLACEHOLDER CATEGORY</p>
          <?php if ($government_contracts):?>
            <?php foreach ($government_contracts as $dog=>$cat):?>
              <p><?php echo $cat->post_title;?></p>
            <?php endforeach;?>
          <?php endif;?>
      </div>

      <div class ="medium-4 homepage-grid-element columns">
        <?php if(get_field('events_header')):?>
        <img src ="<?php echo get_field('events_header');?>">
        <?endif; ?>
        <p class="homepage-header-text"> PLACEHOLDER CATEGORY </p>
          <?php if($event_list):?>
          <?php foreach ($event_list as $cat=>$dog):?>
              <p><?php echo $dog-> post_title;?></p>
          <?php endforeach;?>
        <?php endif;?>
      </div>
    
    </div>

    <div class ="homepage-full row" style="background-image: url('<?php echo get_field('public_interest_background'); ?>');"  >
      <div class="public-interest-learn-more">
        <p><?php echo get_field('center_for_public_interest_description'); ?></p>
        <button class="public-interest-btn" href="<?php echo get_field('center_for_public_interest_url');?>">Learn More</button>
      </div>
    </div>

</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();