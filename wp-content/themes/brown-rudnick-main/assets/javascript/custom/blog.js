var BLOG = {
	addListeners: function(){
		console.log('Blog JS Loaded');
		$('#blogTagSelect').change(function(event) {
			var tag = $(this).val().toLowerCase();
			var url = $.url();
			var splitUrl = url.attr('source').split('=');
			splitUrl[1] = tag.replace(" ", "-");
			var newUrl = splitUrl.join('=');
			console.log(newUrl);
			if ( newUrl !== url ){
				window.location.replace(newUrl);
			}
		});
	}
}

$(document).ready(function(){
		BLOG.addListeners();
});