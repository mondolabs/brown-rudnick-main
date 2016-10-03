var PEOPLE = {
	listeners: function(){
		console.log('People js loaded');
		$('.letter__link').click(function(event) {
			var letterlLinkInnerWrappers = $('.letter__link--inner-wrapper');
			var letter = $(this).data('letter');
			var letterAnchor = $("div[data-letter-anchor="+ letter +"]");
			letterlLinkInnerWrappers.removeClass('active');
			var selectedletterlLinkInnerWrapper = $(this).parent();
			selectedletterlLinkInnerWrapper.addClass('active');
			$('html,body').animate({
	          scrollTop: letterAnchor.offset().top - 200
	        }, 1000);
	        console.log("Scrolling to " + letter );
	        return false;
		});
		$('#advancedPeopleSearch').click(function(event) {
			PEOPLE.revealAdvancedSearch();
		});
		$('#peopleAdvancedSearchButton').click(function(event) {
			event.preventDefault();
			console.log("prevented!");
			var selects = $('select');
			var keyword = $("#keywordInput").val() || "";
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
	scrollEvents: function(){
		var heightAdjustment;
		if ( $('.page-template-people').length > 0 &&  $('.people__details--container').height() > $('.sidebar__on-scroll--fixed').height() ){
			heightAdjustment = 800;
		} else {
			heightAdjustment = 263;
		}
		var scrollStopperOffset = $('#masthead').height() + $('.body__wrapper').height() - heightAdjustment;
		if ( $(window).scrollTop() >= ($('#featuredImage').height()) && $(window).scrollTop() <= scrollStopperOffset ) {
			PEOPLE.stickSideBar('top');
		} else if ( $(window).scrollTop() >= scrollStopperOffset ) {
			PEOPLE.stickSideBar('bottom');
			console.log('bottom sticker');
		} else {
			PEOPLE.unstickSideBar();
		}
	},
	stickSideBar: function(location) {
		var sideBarWidth;
		if ( location === 'top' ) {	
			if ( $(window).width() < 1000 ) {
				sideBarWidth = 'calc(75em / 4)';
			} else {
				sideBarWidth = 'calc(75em / 6)';
			}
			PEOPLE.stickySideBar.css({
				position: 'fixed',
				width: sideBarWidth,
				top: '160px'
			});
		} else {
			if ( $(window).width() < 1000 ) {
				sideBarWidth = '25%';
			} else {
				sideBarWidth = '16.66667%';
			}
			PEOPLE.stickySideBar.css({
				position: 'absolute',
				width: sideBarWidth,
				top: 'initial',
				bottom: '60px'
			});
		}	
	},
	unstickSideBar: function() {
		var sideBarWidth;
		if ( $(window).width() < 1000 ) {
			sideBarWidth = '25%';
		} else {
			sideBarWidth = '16.66667%';
		}
		PEOPLE.stickySideBar.css({
			position: 'relative',
			width: sideBarWidth,
			top: 'initial'			
		});
	},
	revealAdvancedSearch: function(){
		$('#advancedSearchModal').removeClass('hidden').fadeIn('slow');
		console.log("advanced search revealed!")
	},
	hideAdvancedSearch: function(){
		$('#advancedSearchModal').addClass('hidden').fadeOut('slow');
		console.log("advanced search hidden!")
	}
};

$(document).ready(function(){
	PEOPLE.listeners();
	if ( $(document).width() > 640) {
		PEOPLE.scrollEvents();
		$(document).scroll( function(){
			PEOPLE.scrollEvents();
		});
	}
});