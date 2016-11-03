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

			$('#open-mobile-menu').click(function(){
				$('#search__icon__mobile').toggle();
				$('#mobile__logo__container').toggle();
				$('#open-mobile-menu').toggleClass('mobile-active');
				$('#open-mobile-menu').toggleClass('close__modal');
				$('#open-mobile-menu').css({'top':'5px', 'left': '0'});
				$('.mobile__menu__bottom').toggle();
				$('body').toggleClass('no-scroll');
				$('.human-icon').slideToggle();
				$('#menu-mobile-menu').slideToggle(500);
				// call check scroll function defined above
				checkScroll();
			});
		},
}

$(document).ready(function(){
	mobileMenu.openDropdown();
});

