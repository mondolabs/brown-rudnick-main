var mobileMenu = {
		openDropdown: function(){
			// enable or disable scroll for mobile dropdown function
			var checkScroll = function() {
				if ($('body').hasClass('no-scroll')) {
					disableScroll.on();
				} else {
					disableScroll.off();
				}
			};

			$('.right-menu-icon').click(function(){

				$('.human-icon').toggle();
				$('.right-menu-icon').toggleClass('mobile-active');
				$('.right-menu-icon').toggleClass('menu-icon');
				// show mobile menu and prevent other interactions
				 $('body').toggleClass('no-scroll');
				$('#menu-mobile-menu').slideToggle(500);
				// call check scroll function defined above
				checkScroll();
			});
		},

		animate: function(){
			// animate elements on mobile menu
			$('#menu-nested-pages').addClass('is-animating');		
		}
}

$(document).ready(function(){
	mobileMenu.openDropdown();
});

