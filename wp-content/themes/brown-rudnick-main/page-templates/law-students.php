<?php
/*
Template Name: Law Students
*/
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$sidebar_slug = 'careers-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['header_text'] = get_field('header_text');
$data['top_text_content'] = get_field('top_text_content');
$data['ceo'] = get_field('ceo');
$data['tiles_header'] = get_field('tiles_header');
$data['tiles'] = get_field('tiles');
$data['bottom_banner_text'] = get_field('bottom_banner_text');
$data['bottom_banner_image'] = get_field('bottom_banner_image');
$data['middle_text_content'] = get_field('middle_text_content');

$slug = basename(get_permalink());
$data['slug'] = $slug;
$post_type_args = array(
  'post_type' => 'job-opening',
  'numberposts' => -1
);
$job_opening_posts = get_posts($post_type_args);
$ids = [];
foreach ( $job_opening_posts as $post ) {
  array_push($ids, $post->ID);
}
$data['locations'] = wp_get_object_terms( $ids, 'locations' );
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/law-students.twig', $data); ?> 
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div> 
        </div> 
      </div> 
    </div> 
  </body>
</html>