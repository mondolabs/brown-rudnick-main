<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$data = Timber::get_context();
$search_query = get_search_query();
$search_args = array(
    's' =>  $search_query,
    'posts_per_page'=> -1
);
$data['results'] = Timber::get_posts($search_args);
$data['search_banner_image'] = get_template_directory_uri() . "/assets/images/search-bg.png";
$data['form_action'] = get_home_url();
$data['search_query'] = $search_query;
$alphabet = range('A', 'Z');
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>

<html>
  <head>
    <?php wp_head()?>
  </head>
    <body>
      <?php get_template_part('template-parts/off-canvas-search')?>
              <div id="page-full-width-homepage" class ="full-width" role="main">
                <?php Timber::render('/twig-templates/search-results.twig', $data); ?>
                <div class ="results__container">
                  <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                    <?php endwhile; ?>
                    <?php else : ?>
                      <?php get_template_part( 'template-parts/content', 'none' ); ?>
                  <?php endif;?>
                  <?php do_action( 'foundationpress_before_pagination' ); ?>
                  <?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
                    <nav id="post-nav">
                      <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
                      <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
                    </nav>
                  <?php } ?>                
                  <?php do_action( 'foundationpress_after_content' ); ?>
                  <?php get_footer(); ?>
              </div>
            </div>  
          </div>
      </div>
    </div>
  </body>
</html>