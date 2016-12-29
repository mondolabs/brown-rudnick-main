<?php 

/**
 * The template for Brown Rudnick Custom Search
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$action = get_home_url();
$query = get_search_query();

?>

<div class="row body__wrapper small-12 medium-12 large-12">
  <div class="columns small-12 medium-12 large-12">
  	<form role="search" id ="searchform" method="get" action="<?php if ($action){ echo $action;} ?>">
   		<div class="input-group">
   				<div id="enter-search-replace">
	    			<p id="enter-search"></p>
	    		</div>
	    	<div class="columns small-12 medium-8 large-8 no__pad">
	    		<input type="text" class="input-custom-search" value="<?php if ($query){ echo $query;}?>" name ="s" id="s" placeholder='Enter your search'>
	    	</div>
	    	<div class="columns small-12 medium-4 large-4 no__pad">
			    <div class="input-group-button search-button">
			    	<input type="submit" id="searchsubmit" value="Search" class="sites-button">
		    	</div>
		    </div>	
	  	</div>
	</form>
</div>