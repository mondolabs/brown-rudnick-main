var LOCATIONSEARCHER = {
	detectChange: function(){
		$('#locationSelect').change(function(event){
			// build query string
			var keyword = $('#locationSelect').val() || "";
			console.log(keyword);
			var queryStringBase = location.origin + location.pathname;
			var queryString = "" + "?job_location_query="+keyword;
			console.log(queryString);
			window.location.replace(queryString);
		});
	}
}

$('document').ready(function(){
	LOCATIONSEARCHER.detectChange(); 
});