var INSIGHTS = {
	listeners: function(){
		console.log('Insights listeners js loaded');
		$('select.insight').change(function(event) {
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
			console.log(queryString);
			window.location.replace(queryString);
		});
	},
	onLoad: function(){
		// Get search param values from url
		var selectedGeography = $.url().param('geography_query', 'strict') || "GEOGRAPHIES";
		var selectedIndustry = $.url().param('industry_query', 'strict') || "INDUSTRIES";
		var selectedPractice = $.url().param('practice_query', 'strict') || "PRACTICES";
		var selectedLanguage = $.url().param('language_query', 'strict') || "LANGUAGES";
		var selectedLocations = $.url().param('location_query', 'strict') || "LOCATIONS";
		var selectedAdmission = $.url().param('admission_query', 'strict') || "ADMISSIONS";
		var selectedEducation = $.url().param('education_query', 'strict') || "EDUCATION";

		// Set vars for selects for all search params
		var geographySelect = $('select#geographySelect');
		var industrySelect = $('select#industrySelect');
		var practiceSelect = $('select#practiceSelect');
		var languageSelect = $('select#languageSelect');
		var locationSelect = $('select#locationSelect');
		var admissionSelect = $('select#admissionSelect');
		var educationSelect = $('select#educationSelect');

		// Change value of selects based on url params
		geographySelect.val(decodeURIComponent(selectedGeography));
		industrySelect.val(decodeURIComponent(selectedIndustry));
		practiceSelect.val(decodeURIComponent(selectedPractice));
		languageSelect.val(decodeURIComponent(selectedLanguage));
		locationSelect.val(decodeURIComponent(selectedLocations));
		admissionSelect.val(decodeURIComponent(selectedAdmission));
		educationSelect.val(decodeURIComponent(selectedEducation));

	}
}

$(document).ready(function(){
	INSIGHTS.listeners();
	INSIGHTS.onLoad();
})
