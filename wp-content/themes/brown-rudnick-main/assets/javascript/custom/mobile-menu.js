var mobileMenu = {
		openDropdown: function(){
				var checkScroll = function() {
				if ($('body').hasClass('no-scroll')) {
					disableScroll.on();
				} else {
					disableScroll.off();
				}
			};

			$('#open-mobile-menu').click(function(){
				$('#menu-mobile-menu').slideToggle();
				$('#search__icon__mobile').slideToggle();
				$('#mobile__logo__container').slideToggle();
				$('.mobile__button__container').toggleClass('mobile-container-open');
				$('#open-mobile-menu').toggleClass('mobile-active');
				$('#open-mobile-menu').toggleClass('close__modal');
				$('#mobile-menu').toggleClass('open');
				$('#open-mobile-menu').toggleClass('open');
				$('.mobile__menu__bottom').toggle();
				$('body').toggleClass('no-scroll');
				$('.human-icon').slideToggle();		
				checkScroll();
			});
		},
}

$(document).ready(function(){
	mobileMenu.openDropdown();
});

