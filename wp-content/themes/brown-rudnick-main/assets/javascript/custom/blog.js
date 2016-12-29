var BLOG = {
	addListeners: function(){
		// change filters based on selected category
		$('#blogTagSelect').change(function(event) {
			var selectedTag = $(this);
			var slugs = location.pathname;
			var selectedTagValue = $(selectedTag).val();
			var splitUrl = new String;
			// building URL on basis of selected tags
			if ($(selectedTag).hasClass('unfiltered') && $()) {
				var tag = selectedTagValue.toLowerCase();
				var url = $.url();
				if (slugs.split('/').length >= 6) {
					splitUrl = (url.attr('source').slice(0, url.attr('source').length-7) +"filtered-by-category?tag= ").split('=');
				} else {
					splitUrl = (url.attr('source')+"filtered-by-category?tag= ").split('=');
				}
				splitUrl[1] = tag.replace(/\s+/g, '-').toLowerCase();
				var newUrl = splitUrl.join('=');
			} else if ( $(this).hasClass('monthly-archive') ) {
				var tag = selectedTagValue.toLowerCase();
				var url = $.url();
				var segments = url.segment();
				var newUrl = "/" + [segments[0],segments[1]].join('/')+"/filtered-by-category?tag="+tag.replace(/\s+/g, '-');
			} else {
				var tag = selectedTagValue.toLowerCase();
				var url = $.url();
				var splitUrl = url.attr('source').split('=');
				splitUrl[1] = tag.replace(/\s+/g, '-');
				var newUrl = splitUrl.join('=');
			}
			if ( newUrl !== url.attr('source') ){
				// remove pagination on page refresh by parsing out /page/pageNumber
				window.location.replace(newUrl);
			} else {
				return false;
			}
		});

		// refresh page on the basis of selected date ranges
		$('#blogDateSelect, #blogDateSelectCenterContent').change(function(event) {
			var selectedTag = $(this);
			var slugs = location.pathname;
			var selectedTagValue = $(selectedTag).val();
			var splitUrl = new String;
			if ($(selectedTag).hasClass('unfiltered')) {
				var date = selectedTagValue.toLowerCase();
				var url = $.url();
				if (slugs.split('/').length >= 6) {
					splitUrl = (url.attr('source').slice(0, url.attr('source').length-7) +"filtered-by-category?tag= ").split('=');
				} else { 
					splitUrl = (url.attr('source')+"monthly-archive?date_query= ").split('=');
				}
				splitUrl[1] = date.replace(/\s+/g, '-').toLowerCase();
				var newUrl = splitUrl.join('=');
			} else if ( $(this).hasClass('filtered-by-category') ) {
				var date = selectedTagValue.toLowerCase();
				var url = $.url();
				var segments = url.segment();
				var newUrl = "/" + [segments[0],segments[1]].join('/')+"/monthly-archive?date_query="+date.replace(/\s+/g, '-'); 
			} else {
				var date = selectedTagValue.toLowerCase();
				var url = $.url();
				var splitUrl = url.attr('source').split('=');
				splitUrl[1] = date.replace(/\s+/g, '-');
				var newUrl = splitUrl.join('=');
			}
			if ( newUrl !== url.attr('source') ){
				window.location.replace(newUrl);
			} else {
				return false;
			}
		});
		$('#clearCategoriesSidebar').click(function(event) {
			var url = $.url();
			if (Object.getOwnPropertyNames(url.param()).length > 0){
				var segments = url.segment();
				var newUrl = "/" + [segments[0],segments[1]].join('/');
				window.location.replace(newUrl);
			} else {
				return false;
			}
		});
	}
}

$(document).ready(function(){
		BLOG.addListeners();
});