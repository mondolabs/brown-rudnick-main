<?php
/*
Template Name: Single Geography Page
*/
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['geography_header_text'] = get_field('geography_header_text');
$data['text_content_top'] = get_field('text_content_top');
$data['text_content_body'] = get_field('text_content_body');
$data['headlines'] = get_field('headlines');
$data['headline_files'] = get_field('headline_files');
$data['related_experience'] = get_field('related_experience');
$data['geography_group_leaders'] = get_field('geography_group_leaders');
$data['related_people'] = get_field('related_people');
$data['services_header'] = get_field('services_header');
$data['services'] = get_field('services');
$data['breadcrumb_color'] = get_field('breadcrumb_color');
$data['related_people'] = get_field('geography_related_people');
$data['contact_us'] = get_field('contact_us');
$data['news_and_resources'] = get_field('geography_related_news_and_resources');



?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/geography.twig', $data); ?>      
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>