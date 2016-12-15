var INSIGHTS = {
	listeners: function(){
		// $('#insightsAdvancedSearch').click(function(event) {
		// 	INSIGHTS.revealAdvancedSearchModal();
		// });
		console.log('Insights listeners js loaded');
		$('select.insight').change(function(event) {
			var selects = $('select.insight');
			var queryStringBase = location.origin + location.pathname;
			var queryString = "";
			var filters = [];
			for (var i = selects.length - 1; i >= 0; i--) {
				var select = selects[i];
				if ( $(select).val().length > 0 &&  $(select).val() !== "" ) {
					filters.push($(select));
				}
			}

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
		$('button#advancedSearchSubmit').click(function(event) {
			var selects = $('.advanced');
			var keyword = $("#allKeywordInput").val() || "";
			var queryStringBase = location.origin + "/insights/advanced-search-results";
			var queryString = "";
			var filters = [];
			for (var i = selects.length - 1; i >= 0; i--) {
				var select = selects[i];
				if ( $(select).val().length > 0 &&  $(select).val() !== "" ) {
					filters.push($(select));
				}
			}

			console.log(filters);

			for(var i = filters.length - 1; i >= 0; i--) {
				var paramName = $(filters[i]).attr('name');
				var paramValue = $(filters[i]).val();
				console.log(paramName);
				console.log(paramValue);
				if ( paramValue.length > 0 && i === filters.length - 1 ) {
					queryString = queryStringBase + "?" + paramName + "=" + paramValue;
					console.log(queryString);
				} else if ( paramValue.length > 0 ) {
					queryString = queryString + "&" + paramName + "=" + paramValue;
					console.log(queryString);
				}
			}
		
			if ( queryString.length > 0 ){
				if ( keyword.length > 0 ) {
					queryString = queryString + "&keyword=" + keyword;
				}
			} else {
				if ( keyword.length > 0 ) {
					queryString = queryString + "?keyword=" + keyword;
				}
			}

			console.log(queryString);

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
		var selectedType = $.url().param('type_query', 'strict') || "";

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

		// Set vars for selects for all advanced search params
		var allDateSelect = $('select#allDateSelect');
		var allGeographySelect = $('select#allGeographySelect');
		var allIndustrySelect = $('select#allIndustrySelect');
		var allPracticeSelect = $('select#allPracticeSelect');
		var allDateSelect = $('select#allDateSelect');
		var allTypeSelect = $('select#allTypeSelect');
		var allKeywordInput = $('input#allKeywordInput');
	
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
		allDateSelect.val(decodeURIComponent(selectedDate));
		allGeographySelect.val(decodeURIComponent(selectedGeography));
		allIndustrySelect.val(decodeURIComponent(selectedIndustry));
		allPracticeSelect.val(decodeURIComponent(selectedPractice));
		allTypeSelect.val(decodeURIComponent(selectedType));
		allKeywordInput.val(decodeURIComponent(selectedKeyword));
	},
	revealAdvancedSearchModal: function() {
		console.log('Show advanced search modal for insights.');
	}
}

$(document).ready(function(){
	INSIGHTS.listeners();
	INSIGHTS.onLoad();
})