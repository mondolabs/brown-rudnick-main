var INSIGHTS = {
	listeners: function(){
		$('#insightsAdvancedSearch').click(function(event) {
			INSIGHTS.revealAdvancedSearchModal();
		});
		$('select.insight').change(function(event) {
			var selects = $('select.insight');
			var slugs = location.pathname;
			if (slugs.split('/').length <= 4) {
				var queryStringBase = location.origin + location.pathname;
			} else {
				var slugsArray = slugs.split('/');
				slugsArray.splice(0,1);
				var length = slugsArray.length - 1;
				var newSlugsArray = slugsArray.splice(0,2).join('/')
				var slugsWithNoPages = '/' + newSlugsArray + '/';
				var queryStringBase = location.origin + slugsWithNoPages;		
			}
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
				} else if ( paramValue.length > 0 ) {
					queryString = queryString + "&" + paramName + "=" + paramValue;
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

			for(var i = filters.length - 1; i >= 0; i--) {
				var paramName = $(filters[i]).attr('name');
				var paramValue = $(filters[i]).val();
				if ( paramValue.length > 0 && i === filters.length - 1 ) {
					queryString = queryStringBase + "?" + paramName + "=" + paramValue;
				} else if ( paramValue.length > 0 ) {
					queryString = queryString + "&" + paramName + "=" + paramValue;
				}
			}
			var keyword = keyword.replace(' ', '-')
			if ( queryString.length > 0 ){
				if ( keyword.length > 0 ) {
					queryString = queryString + "&keyword=" + keyword;
				}
			} else {
				if ( keyword.length > 0 ) {
					queryString = queryString + "?keyword=" + keyword;
				}
			}
			if ( queryString.length > 0) {
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
		INSIGHTS.engageEnterDownForModalFormSubmission();
	},
	cancelEnterDown: function(){
		if ( $('body').hasClass('page-template-people') || $('body').hasClass('page-template-insights')  ){
			console.log("enter disengaged!");
			$(window).off( "keydown" );
			$(window).keydown(function(e){
				if (e.keyCode == 13){
					e.preventDefault();
					e.stopPropagation();
					return false;
				}
			});
		}
	},
	engageEnterDownForModalFormSubmission: function(){
		console.log("enter engaged!");
		$(window).keydown(function(e){
			if (e.keyCode == 13){
				e.preventDefault();
				e.stopPropagation();
				$('button#advancedSearchSubmit').click();
			} else {
				console.log("not enter");
			}
		});
	}
}

$(document).ready(function(){
	INSIGHTS.listeners();
	INSIGHTS.onLoad();
})