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
$data['homepage_text_section'] = get_field('homepage_text_section');
$data['have_rows_homepage_slider'] = have_rows('homepage_slider');
$featured_posts_args = array(
    'post_type' =>  array('news', 'emerging_technology', 'event', 'crime_watch', 'government_contract', 'alert'),
    'orderby' => 'date',
    'order' => 'DESC',
    'max_num_pages'=> 5
);
$data['featured_posts'] = Timber::get_posts($featured_posts_args);
?>

  <div id="page-full-width-homepage" class ="full-width" role="main">
    <?php Timber::render('slider.twig', $data); ?>
    <?php Timber::render('blog-tiles.twig', $data); ?>

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

  <?php get_footer(); ?>
  </body>
</html>