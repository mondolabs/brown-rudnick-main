var LOCATIONSEARCHER = {
	detectChange: function(){
		$('#locationSelect').change(function(event){
			// build query string
			var keyword = $('#locationSelect').val() || "";			
			var queryStringBase = location.origin + location.pathname;
			var queryString = "" + "?job_location_query="+keyword;
			
			window.location.replace(queryString);
			
		});
	},
	onLoad: function(){
		var jobKeyword = $.url().param('job_location_query', 'strict');
		var locationSelect = $('#locationSelect');
		locationSelect.val(decodeURIComponent(jobKeyword));
	}
}

$('document').ready(function(){
	LOCATIONSEARCHER.detectChange(); 
	LOCATIONSEARCHER.onLoad();
});