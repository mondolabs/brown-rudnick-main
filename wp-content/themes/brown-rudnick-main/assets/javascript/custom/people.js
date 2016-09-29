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
	},
	stickySideBar: $('.sidebar__on-scroll--fixed'),
	scrollEvents: function(){
		if ( $('.page-template-people').length > 0 ){
			var heightAdjustment = 800;
		} else {
			var heightAdjustment = 263;
		}
		var scrollStopperOffset = $('#masthead').height() + $('.body__wrapper').height() - heightAdjustment;
		if ( $(window).scrollTop() >= ($('#featuredImage').height() - 60) && $(window).scrollTop() <= scrollStopperOffset ) {
			PEOPLE.stickSideBar('top');
		} else if ( $(window).scrollTop() >= scrollStopperOffset ) {
			PEOPLE.stickSideBar('bottom');
			console.log('bottom sticker');
		} else {
			PEOPLE.unstickSideBar();
		}
	},
	stickSideBar: function(location) {
		if ( location === 'top' ) {	
			if ( $(window).width() < 1000 ) {
				var sideBarWidth = 'calc(75em / 4)';
			} else {
				var sideBarWidth = 'calc(75em / 6)';
			}
			PEOPLE.stickySideBar.css({
				position: 'fixed',
				width: sideBarWidth,
				top: '160px'
			});
		} else {
			if ( $(window).width() < 1000 ) {
				var sideBarWidth = '25%';
			} else {
				var sideBarWidth = '16.66667%';
			}
			PEOPLE.stickySideBar.css({
				position: 'absolute',
				width: sideBarWidth,
				top: 'initial',
				bottom: '10px'
			});
		}	
	},
	unstickSideBar: function() {
		if ( $(window).width() < 1000 ) {
			var sideBarWidth = '25%';
		} else {
			var sideBarWidth = '16.66667%';
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