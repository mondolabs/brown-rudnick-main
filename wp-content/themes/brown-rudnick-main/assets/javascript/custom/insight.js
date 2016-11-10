var INSIGHTS = {
	listeners: function(){
		$('#insightsAdvancedSearch').click(function(event) {
			INSIGHTS.revealAdvancedSearchModal();
		});
		console.log('Insights listeners js loaded');
		$('select.insight').change(function(event) {
			var selects = $('select');
			var queryStringBase = location.origin + location.pathname;
			var queryString = "";
			var filters = [];
			for (var i = selects.length - 1; i >= 0; i--) {
				var select = selects[i];
				if ( $(select).val().length > 0 &&  $(select).val() !== "" ) {
					filters.push($(select));
				}
			}
			console.log("filters" + filters);
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
			// set back the url to the base if there are no queries left
			if( queryString.length > 0) {
				window.location.replace(queryString);
			} else {
				window.location.replace(queryStringBase);
			}
		});
	},
	onLoad: function(){
		// Get search param values from url
		var selectedDate = $.url().param('date_query', 'strict') || "";
		var selectedGeography = $.url().param('geography_query', 'strict') || "";
		var selectedIndustry = $.url().param('industry_query', 'strict') || "";
		var selectedPractice = $.url().param('practice_query', 'strict') || "";
		var selectedLanguage = $.url().param('language_query', 'strict') || "";
		var selectedLocations = $.url().param('location_query', 'strict') || "";
		var selectedAdmission = $.url().param('admission_query', 'strict') || "";
		var selectedEducation = $.url().param('education_query', 'strict') || "";
		var selectedKeyword = $.url().param('keyword', 'strict') || "";

		// Set vars for selects for all search params
		var dateSelect = $('select#dateSelect');
		var geographySelect = $('select#geographySelect');
		var industrySelect = $('select#industrySelect');
		var practiceSelect = $('select#practiceSelect');
		var languageSelect = $('select#languageSelect');
		var locationSelect = $('select#locationSelect');
		var admissionSelect = $('select#admissionSelect');
		var educationSelect = $('select#educationSelect');
		var keywordInput = $('input#keywordInput');

		// Change value of selects based on url params
		dateSelect.val(decodeURIComponent(selectedDate));
		geographySelect.val(decodeURIComponent(selectedGeography));
		industrySelect.val(decodeURIComponent(selectedIndustry));
		practiceSelect.val(decodeURIComponent(selectedPractice));
		languageSelect.val(decodeURIComponent(selectedLanguage));
		locationSelect.val(decodeURIComponent(selectedLocations));
		admissionSelect.val(decodeURIComponent(selectedAdmission));
		educationSelect.val(decodeURIComponent(selectedEducation));
		keywordInput.val(decodeURIComponent(selectedKeyword));
	},
	revealAdvancedSearchModal: function() {
		console.log('Show advanced search modal for insights.');
	}
}

$(document).ready(function(){
	INSIGHTS.listeners();
	INSIGHTS.onLoad();
})
