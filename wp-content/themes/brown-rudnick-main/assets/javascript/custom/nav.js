var NAV = {
	listeners: function(){
		console.log('Nav js loaded');
		$('.desktop-menu a').hover(
			function(e) {
				var subMenu = $(this).parent().find('ul');
				if( subMenu.length > 0 ){
					var colorBlock = $('.subnav__color-block').show(200);
				}
				$(subMenu).css('display', 'flex');
		  	}, function(e) {
				var subMenu = $(this).parent().find('ul');
				var toElement = e.toElement;
				var eSubMenu = $(toElement).parent().find('ul');
				var colorBlock = $('.subnav__color-block');
		  		if ( (subMenu.length > 0) || ($(toElement).is('ul.dropdown')) || $(toElement).parent().hasClass('is-submenu-item') ) {
		  			if ( $(toElement).parent().hasClass('is-submenu-item') || ($(toElement).is('ul.dropdown')) ){
			  			console.log('dont hide the gray');
		  			}
		  		} else {
		  			console.log('hide the gray and submenu');
					$(subMenu).css('display', 'none');
		  		}
		  	}
		);
		$('.subnav__color-block').mouseleave( 
			function(e) {
				var toElement = e.toElement;
				if ( !$(toElement).is('a') ) {
					$(this).parent().find('ul.submenu').css('display', 'none');
					$('.subnav__color-block, ul.is-drop-down').hide(200);
				}
			}
		)
	},
	desktopMenu: $('#masthead'),
	scrollEvents: function(){
		if ( $(window).scrollTop() >= NAV.desktopMenu.height() ) {
			$(NAV.desktopMenu).hide();
			$('.menu__outer-wrapper--desktop-on-scroll').fadeIn();
			console.log('nav is hidden')
		} else {
			$(NAV.desktopMenu).show();
			$('.menu__outer-wrapper--desktop-on-scroll').hide();
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


