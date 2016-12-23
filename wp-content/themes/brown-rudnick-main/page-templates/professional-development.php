<?php
/*
Template Name: Professional Development
*/
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";

$sidebar_slug = 'careers-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['header_text'] = get_field('header_text');
$data['first_paragraph'] = get_field('first_paragraph');
$data['second_paragraph'] = get_field('second_paragraph');
$data['third_paragraph'] = get_field('third_paragraph');

$data['highlights_title'] = get_field('highlights_title');
$data['highlights'] = get_field('highlights');
$data['main_body_title'] = get_field('main_body_title');

$slug = basename(get_permalink());
$data['slug'] = $slug;

$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$data['parent_link'] = get_permalink( $post->post_parent );
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div class="animsition"
        data-animsition-in-class="fade-in"
        data-animsition-in-duration="800"
        data-animsition-out-class="fade-out"
        data-animsition-out-duration="800" >
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/professional-development.twig', $data); ?>     
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
