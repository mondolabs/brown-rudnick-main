 <?php
/*
Template Name: Summer Program
*/

get_header();
$data = Timber::get_context();
$data['post'] = new TimberPost();

// images
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['summer_bottom_banner_image'] = get_field('summer_bottom_banner_image');
$data['summer_committee_tiles'] = get_field('summer_committee_tiles');
$data['summer_committee_description_first'] = get_field('summer_committee_description_first');
$data['summer_committee_description_second'] = get_field('summer_committee_description_second');
$data['trainee_bottom_banner_text'] = get_field('trainee_bottom_banner_text');
$data['summer_committee_questions_title'] = get_field('summer_committee_questions_title');
$data['summer_committee_questions'] = get_field('summer_committee_questions');
$data['header_text'] = get_field('header_text');
$data['summer_commitee_title'] = get_field('summer_commitee_title');
$data['summer_commitee_title_description_first'] = get_field('summer_commitee_title_description_first');
$data['summer_commitee_description_first'] = get_field('summer_commitee_description_first');
$data['summer_commitee_description_second'] = get_field('summer_commitee_description_second');
$data['after_hours_items'] = get_field('after_hours_items');
$data['after_hours_title'] = get_field('after_hours_title');
$data['after_hours_text'] = get_field('after_hours_text');
$data['after_hours_text_second'] = get_field('after_hours_text_second');
$data['trainee_bottom_banner_text'] = get_field('trainee_bottom_banner_text');
$data['summer_first_paragraph'] = get_field('summer_first_paragraph');
$data['summer_recruitment_committee_title'] = get_field('summer_recruitment_committee_title');
$data['tile_paragraph_one'] = get_field('tile_paragraph_one');
$data['tile_paragraph_two'] = get_field('tile_paragraph_two');

$args = array(
    'post_type' =>  'people',
    'posts_per_page'=>-1,
    'order_by'=> 'name',
    'order'=> 'ASC',
    'tax_query' =>array(
    	array(
    		'taxonomy' => 'committee_memberships',
        	'field'=> 'slug',
        	'terms'=>'Summer'
    	),
      ),
);
$data['summer_committee_members'] = Timber::get_posts($args);
$data['summer_committee_members'] = array_unique($data['summer_committee_members']);

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/summer_program.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>