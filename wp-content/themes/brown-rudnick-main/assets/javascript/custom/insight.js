var INSIGHTS = {
	listeners: function(){
		console.log('Insights listeners js loaded');
		$('select').change(function(event) {
			var selects = $('select');
			var queryStringBase = location.origin + location.pathname;
			var queryString = "";
			var filters = [];
			for (var i = selects.length - 1; i >= 0; i--) {
				var select = selects[i];
				if ( $(select).val().length > 0 ) {
					filters.push($(select));
				}
			}
			console.log(filters);
			for(var i = filters.length - 1; i >= 0; i--) {
				var paramName = $(filters[i]).attr('name');
				var paramValue = $(filters[i]).val();
				if ( paramValue.length > 0 && i === filters.length - 1 ) {
					queryString = queryStringBase + "?" + paramName + "=" + paramValue;
					console.log(queryString);
				} else if ( paramValue.length > 0 ) {
					queryString = queryString + "&" + paramName + "=" + paramValue;
					console.log(queryString);
				}
			}
			window.location.replace(queryString);
		});
	},
	onLoad: function(){
		var selectedGeography = $.url().param('geography_query') || "GEOGRAPHIES";
		var selectedIndustry = $.url().param('industry_query') || "INDUSTRIES";
		var selectedPractice = $.url().param('practice_query') || "PRACTICES";

		var geographySelect = $('select#geographySelect');
		var industrySelect = $('select#industrySelect');
		var practiceSelect = $('select#practiceSelect');

		geographySelect.val(decodeURIComponent(selectedGeography));
		industrySelect.val(decodeURIComponent(selectedIndustry));
		practiceSelect.val(decodeURIComponent(selectedPractice));

	}
}

$(document).ready(function(){
	INSIGHTS.listeners();
	INSIGHTS.onLoad();
})
