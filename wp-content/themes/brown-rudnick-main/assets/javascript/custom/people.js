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
	        console.log("Scrolling to" + letter )
	        return false;
		});
	},
	stickySideBar: $('.sidebar__on-scroll--fixed'),
	scrollEvents: function(){
		if ( $(window).scrollTop() >= $('#featuredImage').height() - 60) {
			PEOPLE.stickSideBar();
		} else {
			PEOPLE.unstickSideBar();
		}
	},
	stickSideBar: function() {
		PEOPLE.stickySideBar.css({
			position: 'fixed',
			width: 'calc(75em / 6 )',
			top: '140px'
		});
	},
	unstickSideBar: function() {
		PEOPLE.stickySideBar.css({
			position: 'relative',
			width: '16.666667%',
			top: 'initial'			
		});
	}
}

$(document).ready(function(){
	PEOPLE.listeners();
	if ( $(document).width() > 640) {
		PEOPLE.scrollEvents();
		$(document).scroll( function(){
			PEOPLE.scrollEvents();
		})
	}
})