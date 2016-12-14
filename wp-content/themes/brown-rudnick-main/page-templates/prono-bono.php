<?php
/*
Template Name: Pro Bono
*/
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['banner_image'] = get_field('banner_image');
$sidebar_slug = 'about-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);
$data['parent'] = get_post($post->post_parent);
$data['parent'] = $data['parent']->post_title;
$data['pro_bono_header_text'] = get_field('pro_bono_header_text');
$data['pro_bono_top_content'] = get_field('pro_bono_top_content');
$data['pro_bono_bottom_banner_header'] = get_field('pro_bono_bottom_banner_header');
$data['pro_bono_bottom_banner_text_content'] = get_field('pro_bono_bottom_banner_text_content');
$data['pro_bono_bottom_banner_link_url'] = get_field('pro_bono_bottom_banner_link_url');
$data['pro_bono_bottom_banner_image'] = get_field('pro_bono_bottom_banner_image');
$slug = basename(get_permalink());
$data['slug'] = $slug;
$data['parent_link'] = get_permalink( $post->post_parent );
$data['center_link_url'] = get_field('center_link_url');


?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/pro-bono.twig', $data); ?>      
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

