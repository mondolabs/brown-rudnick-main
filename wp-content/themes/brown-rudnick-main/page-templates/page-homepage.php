<?php
/*
Template Name: Homepage
*/
get_header(); ?>



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

 <div id="page-full-width-homepage" class ="full-width" role="main">

  <?php do_action( 'foundationpress_before_content' ); ?>



  <div class = "slider-container" label="Latest Updates from Brown Rudnick" > 
    <?php if( have_rows('homepage_slider') ): ?>
      <?php $count = 0; ?>
      <?php while(have_rows('homepage_slider') ):
        the_row();
        $slider_image = get_sub_field('homepage_slider_image');
        $slider_title = get_sub_field('homepage_slider_title');
        $slider_content = get_sub_field('homepage_slider_description'); 
        $slider_cta_text = get_sub_field('homepage_slider_cta_text');
        $slider_cta_link = get_sub_field('homepage_slider_cta_link');
        ?>
      <?php if (!empty($slider_image)):?>
    <!-- start slider container -->
      <p class="prev-slider-home">prev</p>
      <p class="next-slider-home">next</p>
      <div class="human-icon"></div> 
      <!-- slide -->
       <div class="slide" style="background-image:url('<?php echo $slider_image['url']; ?>');">      
        <div class="slide-description">
            <h2 class="homepage-slider-title"><?php echo $slider_title; ?></h2>
            <div class="slide-description-heading">
            </div>
            <?php $abbreviation = substr($slider_content, 0, 60); ?>
          <p><?php echo $abbreviation; ?></p>
          <a href="<?php echo $slider_cta_link;?>"><button class="home-button"><?php echo $slider_cta_text; ?></button></a>
      <?php endif;?>
      </div>
     </div> <!-- end slide -->
    <?php $count++;?>    
    <?php endwhile; ?>
  <?php endif; ?>
    <div class="slider-svg">
      <?php get_template_part('assets/images/homepage', 'slider.svg'); ?>
    </div>
  </div> <!-- end of slider container -->

  

  <div class="stay-current">
    <h4><?php echo get_field('homepage_text_section'); ?></h4>
  </div> <!-- stay current -->
 
    <?php if ($insights):?>
      <?php foreach ($insights as $dog=>$cat):?>
            <?php $category = get_the_category($cat->ID);?>
    <div class="row"> <!-- row-->
      <div class="medium-4 large-8 columns homepage-grid-element insights-grid"> <!-- 2/3 column -->
            <img class="insights-image" src ="<?php echo get_field('insights_image');?>">
            <div class="insights-text-container">
              <?php foreach ($category as $bunny=>$rabbit):?>
            
              <div class="homepage-header-container">
                <p class="homepage-header-text"><?php echo $rabbit->name; ?></p>
              </div>
              <?php endforeach; ?>
              <p><?php echo str_replace('-','/',substr($cat->post_date, 0,10)); ?></p>
              <h4 class="homepage-element-body"><?php echo $cat->post_title; ?></h4>
          </div>
      <?php endforeach;?>
    <?php endif;?>
      </div>

      <?php if ($in_news):?>
      <div class="medium-8 large-4 columns homepage-grid-element"> <!-- 1/3 column -->
        <div class="homepage-grid-interior">      
          <div class="homepage-header-container">
            <p class="homepage-header-text">PLACEHOLDER CATEGORY</p>
          </div>
          <?php foreach ($in_news as $dog=>$cat):?>
          <p><?php echo str_replace('-','/',substr($cat->post_date, 0,10));?></p>
          <h5 class="homepage-element-body"><?php echo $cat->post_title; ?></h5>
          <?php endforeach;?>
          <?php endif;?>
        </div>
      </div>
    </div>
  

    <div class = "row"> <!-- row --> 

      <div class ="medium-4 columns homepage-grid-element"> <!-- 1/3 column -->
        <div class="homepage-grid-interior">
        <?php if ($white_collar):?>
         <?php foreach ($white_collar as $dog=>$cat):?>
          <?php $category = get_the_category($cat->ID);?>
          <?php foreach($category as $blog_category=>$name):?>         
             <div class="homepage-header-container">
               <p class="homepage-header-text"> Blog: <?php echo $name->name;?> </p>
             </div>
          <?php endforeach;?>
          <p><?php echo str_replace('-','/',substr($cat->post_date, 0,10)); ?></p>
          <h5 class="homepage-element-body"><?php echo $cat->post_title;?></h5>
        <?php endforeach;?> 
        <?php endif;?>
        </div>
      </div>

      <div class ="medium-4 columns  homepage-grid-element blog-grid"> <!-- 1/3 column -->
        <img class="blog-grid-img" src ="<?php echo get_field('blog_header');?>">
         <div class="homepage-grid-interior">         
          <div class="homepage-header-container">
            <p class="homepage-header-text">Blog: PLACEHOLDER CATEGORY</p>
          </div>
          <?php if ($government_contracts):?>
            <?php foreach ($government_contracts as $dog=>$cat):?>
              <p><?php echo str_replace('-','/',substr($cat->post_date, 0,10)); ?></p>
              <h5 class="homepage-element-body" ><?php echo $cat->post_title;?></h5>
            <?php endforeach;?>
          <?php endif;?>
          </div>
      </div>

      <div class ="medium-4 columns homepage-grid-element blog-grid"> <!-- 1/3 column -->
        <?php if(get_field('events_header')):?>
        <img src ="<?php echo get_field('events_header');?>">
        <?php endif; ?>
        <div class="homepage-grid-interior">
          <div class="homepage-header-container">      
            <p class="homepage-header-text"> PLACEHOLDER CATEGORY </p>
          </div>
          <p><?php echo str_replace('-','/',substr($cat->post_date, 0,10)); ?></p>
          <?php if($event_list):?>
            <?php foreach ($event_list as $events => $specific_event):?>
                <h5 class="homepage-element-body"><?php echo $specific_event-> post_title;?></h5>
            <?php endforeach;?>
          <?php endif;?>
        </div>
      </div>
    
    </div>

    <div class ="homepage-full" style="background-image: url('<?php echo get_field('public_interest_background'); ?>');"  >
      
      <div class="public-interest-learn-more">
        <h5>center for the public interest</h5>
        <div class ="pub-interest-title">
        </div>
        <p><?php echo get_field('center_for_public_interest_description'); ?></p>
        <button class="public-interest-btn" href="<?php echo get_field('center_for_public_interest_url');?>">Learn More</button>
      </div>
    
    </div>

</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();