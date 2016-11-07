// desktop navigation hover interactions

// edited foundation.dropdownMenu.js line 368 to make delay on closing time after mouseout event shorter 
// to restore to default, set this number to '500'

var NAV = {
	// listeners: function(){
	// 		// medium breakpoint hover interaction for navigation
	// 	// if ($(window).innerWidth() > 700 ) {
	// 	// 		$('.menu-item-has-children').on({
	// 	// 			mouseover: function(){					
	// 	// 				$('.subnav__color-block').stop().show(310);
	// 	// 			},
	// 	// 			mouseout: function(){						
	// 	// 				$('.subnav__color-block').stop().hide(310);
	// 	// 			}
	// 	// 		});	
	// 	// 	}

	// 		if ($(window).innerWidth() > 768 ) {
	// 			$('.menu-item-has-children').on({
	// 				mouseover: function(){					
	// 					//$('.subnav__color-block').stop().show(310);
	// 				},
	// 				mouseout: function(){						
	// 					//$('.subnav__color-block').stop().hide(310);
	// 				}
	// 			});	
	// 		}

	// },
	desktopMenu: $('#masthead'),
	// hide or show scroll nav bar
	scrollEvents: function(){
		// differentiate btw mobile and all else
		var desktopCheck = $(window).scrollTop() >= NAV.desktopMenu.height();
		var mobileCheck = $(window).scrollTop() > 250;
		var check;
		if ($(document).width() >= 640) {
			check = desktopCheck;
		} else {
			check = mobileCheck;
		}
		if ( check  ) {
			$(NAV.desktopMenu).css('opacity', '0');
			$('.menu__outer-wrapper--desktop-on-scroll').slideDown('fast');
			$('#menu-nested-pages-1').addClass('scrolled');
		} else {
			$(NAV.desktopMenu).css('opacity', '1');
			$('.menu__outer-wrapper--desktop-on-scroll').slideUp('fast');
			$('#menu-nested-pages-1').removeClass('scrolled');
		}
	},	
	// corrects spacing of last and first submenu item
	submenuCorrection: function(){
		// for regular menu
		$('.is-dropdown-submenu:eq(0)' ).addClass('first-submenu-item');
		$('.is-dropdown-submenu:eq(2)' ).addClass('before-last-submenu-item');
		$('.is-dropdown-submenu:eq(3)' ).addClass('last-submenu-item');
		// for scroll menu
		$('.is-dropdown-submenu:eq(4)' ).addClass('first-submenu-item-scroll');
		$('.is-dropdown-submenu:eq(6)' ).addClass('before-last-submenu-item-scroll');
		$('.is-dropdown-submenu:eq(7)' ).addClass('last-submenu-item-scroll');
	}

}

$(document).ready(function(){
	//NAV.listeners();
	NAV.submenuCorrection();
		$(document).scroll( function(){
			NAV.scrollEvents();
		})

	if ( $(window).scrollTop() >= NAV.desktopMenu.height() && $(document).width() >= 768) {
		// differentiate between page load and user scroll
		// otherwise regular menu is always hidden on page load at scroll location :P
		var userScroll = false;     
		function mouseEvent(e) { 
			userScroll = true; 
		} 
		// only hide if user has scrolled
		if (userScroll) {
			$(NAV.desktopMenu).hide();
		}
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