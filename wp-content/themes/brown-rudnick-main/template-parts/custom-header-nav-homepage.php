<?php
/**
 * Template part for custom header nav for homepage
 *
 */
		$args = array('child_of'=>5, 'post_type'=>'page', 'sort_column'=>'menu_order');
		$child_pages = get_pages($args);
?>


<div class="custom-header-nav">
	<ul class="menu desktop-menu">
		<?php foreach($child_pages as $page=>$page_meta): ?>
			<a href="<?php echo get_permalink($page_meta->ID);?>"><li><?php echo $page_meta->post_title;?></li></a>
	<?php endforeach;?>
		</ul>
</div>