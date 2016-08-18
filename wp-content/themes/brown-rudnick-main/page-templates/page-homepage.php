<?php
/*
Template Name: Homepage
*/

get_header();

$data = Timber::get_context();

$post = new TimberPost();
$data['post'] = $post;
$data['posts'] = Timber::get_posts();
$data['main_image_id'] = $post->contact_us_image;
$data['gov_array'] = array( 'category_name' => 'government_contracts', 'numberposts'=>1); 
$data['government_contracts'] = get_posts($gov_array);
$data['white_collar_array'] = array('category_name' => 'white_collar', 'numberposts'=>1);
$data['white_collar'] = get_posts($white_collar_array);
$data['news_array'] = array('category_name' => 'in_the_news', 'numberposts'=>1);
$data['in_news'] = get_posts($news_array);
$data['insights_array'] = array('category_name' => 'insights', 'numberposts'=>1);
$data['insights'] = get_posts($insights_array);
$data['have_rows_homepage_slider'] = have_rows('homepage_slider');
$data['event_list'] = new WP_Query( array(
    'post_type' => 'event',
    'orderby' => 'date',
    'order' => 'DESC', 
    'max_num_pages'=> 1
));


?>


<?php
// all our content is loaded at the beginning :) 
?>
  <div id="page-full-width-homepage" class ="full-width" role="main">
    <?php Timber::render('slider.twig', $data); ?>
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