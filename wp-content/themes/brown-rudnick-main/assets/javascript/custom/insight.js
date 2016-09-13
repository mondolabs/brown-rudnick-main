var INSIGHTS = {
	listeners: function(){
		console.log('Insights listeners js loaded');
		$('select').change(function(event) {
			var filters = $('select');
			var queryString = location.href;
			for(var i = filters.length - 1; i >= 0; i--) {
				var paramName = $(filters[i]).attr('name');
				var paramValue = $(filters[i]).val();
				if ( paramValue.length > 0 && i === 0 ) {
					queryString = queryString + "?" + paramName + "=" + paramValue;
				} else if ( paramValue.length > 0 ) {
					queryString = queryString + "&" + paramName + "=" + paramValue;
				}
			}

			window.location.replace(queryString);
		});
	},
	onLoad: function(){
		var selectedGeography = $.url().param('geography_query') || "";
		var selectedIndustry = $.url().param('industry_query') || "";
		var selectedPractice = $.url().param('practice_query') || "";

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
