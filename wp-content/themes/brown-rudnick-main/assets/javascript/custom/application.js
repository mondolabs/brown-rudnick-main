$(document).ready(function(){
	$('a.link').hover( 
		function(){
			var redHover = $(this).find('span');
			$(redHover).animate({"marginBottom":"10px"}, 300);
			$(redHover).animate({"opacity":"1"}, 300);

		},
		function(){
			var redHover = $(this).find('span');
			$(redHover).animate({"marginBottom":"0"}, 300);
			$(redHover).animate({"opacity":"0"}, 300);

		})
})