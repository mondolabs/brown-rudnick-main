var BLOG = {
	addListeners: function(){
		console.log('Blog JS Loaded');
		$('#blogTagSelect').change(function(event) {
			if ($(this).hasClass('unfiltered') ) {
				var tag = $(this).val().toLowerCase();
				var url = $.url();
				var splitUrl = (url.attr('source')+"filtered-by-category?tag= ").split('=');
				splitUrl[1] = tag.replace(/\s+/g, '-').toLowerCase();
				var newUrl = splitUrl.join('=');
			} else if ( $(this).hasClass('monthly-archive') ) {
				var tag = $(this).val().toLowerCase();
				var url = $.url();
				var segments = url.segment();
				var newUrl = "/" + [segments[0],segments[1]].join('/')+"/filtered-by-category?tag="+tag.replace(/\s+/g, '-');
			} else {
				var tag = $(this).val().toLowerCase();
				var url = $.url();
				var splitUrl = url.attr('source').split('=');
				splitUrl[1] = tag.replace(/\s+/g, '-');
				var newUrl = splitUrl.join('=');
				console.log(newUrl);
			}
			if ( newUrl !== url.attr('source') ){
				window.location.replace(newUrl);
			} else {
				return false;
			}
		});
		$('#blogDateSelect').change(function(event) {
			if ($(this).hasClass('unfiltered')) {
				var date = $(this).val().toLowerCase();
				var url = $.url();
				var splitUrl = (url.attr('source')+"monthly-archive?date_query= ").split('=');
				splitUrl[1] = date.replace(/\s+/g, '-').toLowerCase();
				var newUrl = splitUrl.join('=');
			} else if ( $(this).hasClass('filtered-by-category') ) {
				var date = $(this).val().toLowerCase();
				var url = $.url();
				var segments = url.segment();
				var newUrl = "/" + [segments[0],segments[1]].join('/')+"/monthly-archive?date_query="+date.replace(/\s+/g, '-'); 
			} else {
				var date = $(this).val().toLowerCase();
				var url = $.url();
				var splitUrl = url.attr('source').split('=');
				splitUrl[1] = date.replace(/\s+/g, '-');
				var newUrl = splitUrl.join('=');
				console.log(newUrl);
			}
			if ( newUrl !== url.attr('source') ){
				window.location.replace(newUrl);
			} else {
				return false;
			}
		});
		// $('#clearCategoriesSidebar').click(function(event) {
		// 	var url = $.url();
		// 	if (Object.getOwnPropertyNames(url.param()).length > 0){
		// 		var segments = url.segment();
		// 		var newUrl = "/" + [segments[0],segments[1]].join('/');
		// 		window.location.replace(newUrl);
		// 	} else {
		// 		return false;
		// 	}
		// });
	}
}

$(document).ready(function(){
		BLOG.addListeners();
});