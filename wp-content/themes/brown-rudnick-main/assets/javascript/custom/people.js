var PEOPLE = {
	listeners: function(){

		// navigate to letter anchor
		$('.letter__link').click(function(event) {
			
			var letterlLinkInnerWrappers = $('.letter__link--inner-wrapper');
			var letter = $(this).data('letter');
			var letterAnchor = $("div[data-letter-anchor="+ letter +"]");
			if (letterAnchor.offset() !== undefined) { 
				letterlLinkInnerWrappers.removeClass('active');
				var selectedletterlLinkInnerWrapper = $(this).parent();
				selectedletterlLinkInnerWrapper.addClass('active');
				$('html,body').animate({
		          scrollTop: letterAnchor.offset().top - 200
		        }, 1000);
		        console.log("Scrolling to " + letter );  
		        $('.back__to__top').slideToggle();
		        return false;
			} else {
				// handle the case when there is no element with that letter 
				// letter is not clickable
				letterAnchor.click(function(event){
					event.preventDefault();
				})
			}
			
		});
		// $(document).resize(function(event) {
		// 	if ( $(document).width() > 640) {
		// 		PEOPLE.scrollEvents();
		// 		$(document).scroll( function(){
		// 			PEOPLE.scrollEvents();
		// 		});
		// 	}
		// });
		$('#advancedPeopleSearch').click(function(event) {
			PEOPLE.revealAdvancedSearch();
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
	// scrollEvents: function(){
	// 	var heightAdjustment;
	// 	if ( $('.page-template-people').length > 0 &&  $('.people__details--container').height() > $('.sidebar__on-scroll--fixed').height() ){
	// 		heightAdjustment = 800;
	// 	} else {
	// 		heightAdjustment = 263;
	// 	}
	// 	var scrollStopperOffset = $('#masthead').height() + $('.body__wrapper').height() - heightAdjustment;
	// 	if ( $(window).scrollTop() >= ($('#featuredImage').height()) && $(window).scrollTop() <= scrollStopperOffset ) {
	// 		PEOPLE.stickSideBar('top');
	// 	} else if ( $(window).scrollTop() >= scrollStopperOffset ) {
	// 		PEOPLE.stickSideBar('bottom');
	// 		console.log('bottom sticker');
	// 	} else {
	// 		PEOPLE.unstickSideBar();
	// 	}
	// },
	// stickSideBar: function(location) {
	// 	var sideBarWidth;
	// 	if ( location === 'top' ) {	
	// 		if ( $(window).width() < 1000 ) {
	// 			sideBarWidth = 'calc(75em / 4)';
	// 		} else {
	// 			sideBarWidth = 'calc(75em / 6)';
	// 		}
	// 		PEOPLE.stickySideBar.css({
	// 			position: 'fixed',
	// 			width: sideBarWidth,
	// 			top: '160px'
	// 		});
	// 	} else {
	// 		if ( $(window).width() < 1000 ) {
	// 			sideBarWidth = '25%';
	// 		} else {
	// 			sideBarWidth = '16.66667%';
	// 		}
	// 		PEOPLE.stickySideBar.css({
	// 			position: 'absolute',
	// 			width: sideBarWidth,
	// 			top: 'initial',
	// 			bottom: '60px'
	// 		});
	// 	}	
	// },
	// unstickSideBar: function() {
	// 	var sideBarWidth;
	// 	if ( $(window).width() < 1000 ) {
	// 		sideBarWidth = '25%';
	// 	} else {
	// 		sideBarWidth = '16.66667%';
	// 	}
	// 	PEOPLE.stickySideBar.css({
	// 		position: 'relative',
	// 		width: sideBarWidth,
	// 		top: 'initial'			
	// 	});
	// },
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
	// if ( $(document).width() > 640) {
	// 	PEOPLE.scrollEvents();
	// 	$(document).scroll( function(){
	// 		PEOPLE.scrollEvents();
	// 	});
	// }
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
	$(window).keydown(function(e){
		if (e.keyCode == 13){
			e.preventDefault();
			return false;
		}
	});


	$(document).bind('scroll', function(){
		var  closestText = $('.sidebar__on-scroll--fixed').nearest('.letter__anchor--indicator').text();
		for (var i= 0; i < $('.letter__link').length; i++) {
			var elem = $('.letter__link')[i];
			if ($.trim($(elem).text()) === $.trim(closestText)) {
				$('.active').removeClass('active');
				$(elem).parent().addClass('active');
			}
		}
	});

	$(window).trigger('resize');
});