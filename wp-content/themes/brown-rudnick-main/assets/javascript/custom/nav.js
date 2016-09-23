// desktop navigation hover interactions

// edited foundation.dropdownMenu.js line 368 to make delay on closing time after mouseout event shorter 
// to restore to default, set this number to '500'

var NAV = {
	listeners: function(){
			// medium breakpoint hover interaction
		if ($(window).innerWidth() > 700 ) {
				$('.menu-item-has-children').on({
					mouseover: function(){
						$('.subnav__color-block').stop().show(410);
					},
					mouseout: function(){
						$('.subnav__color-block').stop().hide(410);
					}
				});	
			}
	},
	desktopMenu: $('#masthead'),
	scrollEvents: function(){
		if ( $(window).scrollTop() >= NAV.desktopMenu.height() ) {
			$(NAV.desktopMenu).css('opacity', '0');
			$('.menu__outer-wrapper--desktop-on-scroll').slideDown('300');
		} else {
			$(NAV.desktopMenu).css('opacity', '1');
			$('.menu__outer-wrapper--desktop-on-scroll').slideUp('300');
		}
	}	
}

$(document).ready(function(){
	NAV.listeners();
	if ( $(document).width() > 640) {
		$(document).scroll( function(){
			NAV.scrollEvents();
		})
	}
	if ( $(window).scrollTop() >= NAV.desktopMenu.height() && $(document).width() > 640) {
		$(NAV.desktopMenu).hide();
	}
})








// var navbar = {
// 	onHover: function(){
// 		// medium breakpoint
// 		if ($(window).innerWidth() > 700 ) {
// 				$('.menu-item-has-children').on({
// 					mouseover: function(){
// 						$('.subnav__color-block').stop().show(410);
// 					},
// 					mouseout: function(){
// 						$('.subnav__color-block').stop().hide(410);
// 					}
// 				});	
// 			}
// 		},
// 		desktopMenu: $('#masthead')
	
// 	}

// $(document).ready(function(){

// 		navbar.onHover();


// 			if ( $(window).scrollTop() >= navbar.desktopMenu.height() ) {
// 				navbar.desktopMenu.hide();
// 				$('.menu__outer-wrapper--desktop-on-scroll').fadeIn();
// 				console.log('nav is hidden')
// 			} else {
// 				navbar.desktopMenu.show();
// 				$('.menu__outer-wrapper--desktop-on-scroll').hide();
// 			}
				

// 	// if ( $(document).width() > 640) {
// 	// 		$(document).scroll( function(){
// 	// 			navbar.onScroll();
// 	// 		})
// 	// 	}
// 	if ( $(window).scrollTop() >= navbar.desktopMenu.height() && $(document).width() > 640) {
// 		navbar.desktopMenu.hide();
// 	}
// 	// }
// });