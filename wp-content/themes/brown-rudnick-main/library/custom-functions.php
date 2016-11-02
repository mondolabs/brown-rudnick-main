<?php


	class MyJobPosts extends TimberPost {

		var $_location;

		public function location(){
			$locations = $this->get_terms('locations');
			if (	is_array($locations) && count($locations) ){
				return $locations[0];
			}
		}

	}


?>