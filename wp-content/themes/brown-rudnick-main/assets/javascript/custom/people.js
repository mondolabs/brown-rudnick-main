var PEOPLE = {
	listeners: function(){
		// navigate to letter anchor
		$('.letter__link').click(function(event) {
			var letterlLinkInnerWrappers = $('.letter__link--inner-wrapper');
			var letter = $(this).data('letter');
			var letterAnchor = $("div[data-letter-anchor="+ letter +"]");
			if (letterAnchor.offset() !== undefined) { 
				letterlLinkInnerWrappers.removeClass('letter--active');
				var selectedletterlLinkInnerWrapper = $(this).parent();
				selectedletterlLinkInnerWrapper.addClass('letter--active');
				$('html,body').animate({
		          scrollTop: letterAnchor.offset().top - 200
		        }, 1000);
		        console.log("Scrolling to " + letter );  
		        $('.back__to__top').slideToggle();
		        return false;
			} else {
				// no element with that letter 
				// letter is not clickable
				letterAnchor.click(function(event){
					event.preventDefault();
				})
			}
			
		});
		$('#advancedPeopleSearch').click(function(event) {
			PEOPLE.revealAdvancedSearch();
		});

		$('.tag__canceller').click(function(event) {
			event.preventDefault();
	
			var target = $(this);
			var queryStringBase = location.origin + location.pathname;
			var queryString = "";
		
			var filters =[];
			var tags = $('.tag__canceller');

			for (var z = tags.length -1; z >=0; z--){	
				var tag = tags[z];
				filters.push(tags[z]);
			}

			for(var y = filters.length - 1; y >= 0; y--) {
				var paramVal = $(filters[y]).data().tag;
				var paramName = $(filters[y]).data().name;
				var targetVal = target.data().tag;
				if ( paramName.length > 0 && y === filters.length - 1 ) {
					queryString = queryStringBase + "?" + paramName + "=" + paramVal;
					if (queryString.includes(targetVal)){
						queryString = queryString.replace(targetVal, "");
					}

				} else if ( paramName.length > 0 ) {
					queryString = queryString + "&" + paramName + "=" + paramVal;
					if (queryString.includes(targetVal)){
						queryString = queryString.replace(targetVal, "");
					}
				}


				if ( queryString.length > 0) {
					window.location.replace(queryString);
				} else {
					window.location.replace(queryStringBase);
				}
				
			}






			// var keywordString = $.url().param('keyword', 'strict') || "";
			// var selectedDate = $.url().param('date_query', 'strict') || "";
			// var selectedGeography = $.url().param('geography_query', 'strict') || "";
			// var selectedIndustry = $.url().param('industry_query', 'strict') || "";
			// var selectedPractice = $.url().param('practice_query', 'strict') || "";
			// var selectedLanguage = $.url().param('language_query', 'strict') || "";
			// var selectedLocations = $.url().param('location_query', 'strict') || "";
			// var selectedAdmission = $.url().param('admission_query', 'strict') || "";
			// var selectedEducation = $.url().param('education_query', 'strict') || "";
			// var selectedKeyword = $.url().param('keyword', 'strict') || "";


















			var paramsArray = new Array;

			var buildArray = function(string) {
				if (string.length > 0) {
					paramsArray.push(string);
				}
			}













			var urlReplacer = function(param){
				var currentUrl = window.location.href;
				var newUrl;
				if ( currentUrl.includes(param) ){
						
					if (currentUrl.includes('keyword')){
						newUrl = currentUrl.replace(param, "").replace('keyword', "");
					}
					if (currentUrl.includes('date_query')){
						newUrl = currentUrl.replace(param, "").replace('date_query', "");
					} 
					if (currentUrl.includes('geography_query')){
						newUrl = currentUrl.replace(param, "").replace('geography_query', "");
					} 
					if (currentUrl.includes('practice_query')){
						newUrl = currentUrl.replace(param, "").replace('practice_query', "");
					} 
					if (currentUrl.includes('language_query')){
						newUrl = currentUrl.replace(param, "").replace('language_query', "");
					} 
					if (currentUrl.includes('location_query')){
						newUrl = currentUrl.replace(param, "").replace('location_query', "");
					} 
					if (currentUrl.includes('admission_query')){
						newUrl = currentUrl.replace(param, "").replace('admission_query', "");
					} 
					if (currentUrl.includes('education_query')){
						newUrl = currentUrl.replace(param, "").replace('education_query', "");
					} 
				} 
			
				console.log(newUrl);
			}




				// buildArray(keywordString);
				// buildArray(selectedDate);
				// buildArray(selectedGeography)
				// buildArray(selectedIndustry)
				// buildArray(selectedPractice)
				// buildArray(selectedLanguage)
				// buildArray(selectedLocations)
				// buildArray(selectedAdmission)
				// buildArray(selectedEducation)
				// buildArray(selectedKeyword);


				// for (var z=0; z <paramsArray.length; z++){
				// 	urlReplacer(paramsArray[z]);
				// }



		});


		$('#peopleAdvancedSearchButton').click(function(event) {
			event.preventDefault();
			var selects = $('select');
			var keyword = $("#keywordInput").val() || "";
			var queryStringBase = location.origin + location.pathname;
			var queryString = "";
			var filters = [];
			// selects values from dropdown options and determines number of filters from these
			for (var i = selects.length - 1; i >= 0; i--) {
				var select = selects[i];
				if ( $(select).val().length > 0 ) {
					filters.push($(select));
				}
			}
			// passes the parameters from each of the selected filters
			for(var i = filters.length - 1; i >= 0; i--) {
				var paramName = $(filters[i]).attr('name');
				var paramValue = $(filters[i]).val();
				if ( paramValue.length > 0 && i === filters.length - 1 ) {
					queryString = queryStringBase + "?" + paramName + "=" + paramValue;
				} else if ( paramValue.length > 0 ) {
					queryString = queryString + "&" + paramName + "=" + paramValue;
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
			// debugger;
			window.location.replace(queryString);
		});
	},
	stickySideBar: $('.sidebar__on-scroll--fixed'),
	revealAdvancedSearch: function(){
		$('#advancedSearchModal').removeClass('hidden').fadeIn('slow');
	},
	hideAdvancedSearch: function(){
		$('#advancedSearchModal').addClass('hidden').fadeOut('slow');
	},

	scrollBackToTop: function(){
		$('.back__to__top').click(function(event){
			$('html,body').animate({
        scrollTop: $('.letter__links_wrapper').offset().top - 200
      }, 1000);
      if ($(this).is(":visible")) {
				$(this).slideToggle();
      }
		});
	},

	scrollToLocationHash: function(){
			var locationHash = window.location.hash;
			var hashAnchor = $("div[data-letter-anchor="+ locationHash.replace(/^#+/i, '') +"]");
			if (hashAnchor.offset() !== undefined) { 
				$('html,body').animate({
		          scrollTop: hashAnchor.offset().top - 200
		        }, 1000);
		        return false;
			} 
		}
};


	$(window).on('resize', function(event) {		
			var headerHeight = $('#mastheadOnScroll').height() + 160;
			var elementToStick = $('.sidebar__on-scroll--fixed');
			if ( $('.sidebar__on-scroll--fixed').length > 0 && $(document).width() >= 768 ){
				console.log("STICKY");
					elementToStick.css('width', '175px !important');
					elementToStick.stick_in_parent({ offset_top: headerHeight });
			}	else {
				elementToStick.trigger("sticky_kit:detach");
			}	

	});

$(document).ready(function(){
	PEOPLE.listeners();
	PEOPLE.scrollBackToTop();
	PEOPLE.scrollToLocationHash();
	var headerHeight = $('#mastheadOnScroll').height() + 160;
	var elementToStick = $('.sidebar__on-scroll--fixed');
		if ( $('.sidebar__on-scroll--fixed').length > 0){
			console.log("STICKY");
			if ($(document).width() >= 768) {
				console.log(headerHeight);
				elementToStick.stick_in_parent({ offset_top: headerHeight });
			} 	
	}	

	// prevent submit on enter
	if ( $('body').hasClass('page-template-people') ){
		$(window).keydown(function(e){
			if (e.keyCode == 13){
				e.preventDefault();
				return false;
			}
		});
	}
	
	$(document).bind('scroll', function(){
		var  closestText = $('.sidebar__on-scroll--fixed').nearest('.letter__anchor--indicator').text();
		for (var i= 0; i < $('.letter__link').length; i++) {
			var elem = $('.letter__link')[i];
			if ($.trim($(elem).text()) === $.trim(closestText)) {
				$('.letter--active').removeClass('letter--active');
				$(elem).parent().addClass('letter--active');
			}
		}
	});

	$(window).trigger('resize');
});