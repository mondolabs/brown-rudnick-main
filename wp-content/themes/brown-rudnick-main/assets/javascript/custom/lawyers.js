var LOCATIONSEARCHER = {
	detectChange: function(){
		// listen for changes in select options element
		$('#locationSelect').change(function(event){
			// build query string
			console.log("selected");
			var keyword = $('#locationSelect').val() || "";			
			var queryStringBase = location.origin + location.pathname;
			var queryString = "" + "?job_location_query="+keyword;
			// reload the page with the keyword as the url
			window.location.replace(queryString);	
		});
	},
	// make select value reflect your most recent search param
	onLoad: function(){
		var jobKeyword = $.url().param('job_location_query', 'strict');
		var locationSelect = $('#locationSelect');
		if (jobKeyword !== undefined) {
			locationSelect.val(decodeURIComponent(jobKeyword));
		}
	}
}

$('document').ready(function(){
	console.log("location searcher loaded");
	LOCATIONSEARCHER.detectChange(); 
	LOCATIONSEARCHER.onLoad();
});