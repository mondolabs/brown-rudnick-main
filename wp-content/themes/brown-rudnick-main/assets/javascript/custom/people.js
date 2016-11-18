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
			var targetVal = target.data().tag;
			var queryStringBase = location.origin + location.pathname;
			var queryString = "";		
			var filters =[
			$.url().param('date_query', 'strict') || "",
			$.url().param('geography_query', 'strict') || "",
			$.url().param('industry_query', 'strict') || "",
			$.url().param('practice_query', 'strict') || "",
			$.url().param('language_query', 'strict') || "",
			$.url().param('location_query', 'strict') || "",
			$.url().param('admission_query', 'strict') || "",
			$.url().param('education_query', 'strict') || "",
			$.url().param('keyword', 'strict') || ""
			];

	
			for(var y = filters.length - 1; y >= 0; y--) {
				var paramVal = filters[y];
				var paramName = $(filters[y]).data().name;	
				if ( paramName.length > 0 && y === filters.length - 1 ) {
					newUrl = queryString = queryStringBase + "?" + paramName + "=" + paramVal;					
				} else if ( paramName.length > 0 ) {
					newUrl = queryString + "&" + paramName + "=" + paramVal;
				}




				console.log(targetVal);
				if (paramVal == targetVal.toUpperCase()) {
					console.log('match');
				}
							
				
			}
			
			console.log(newUrl);

		// if (newUrl.includes(targetVal)){
		// 		newUrl = newUrl.replace(paramName, "").replace(targetVal, "");
		// 		console.log(newUrl);
		// 	}
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