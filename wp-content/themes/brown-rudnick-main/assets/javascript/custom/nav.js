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
		  			console.log('dont hide the gray');
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
					$('.subnav__color-block, ul.is-drop-down').hide(200);
				}
			}
		)
	}
}

$(document).ready(function(){
	NAV.listeners();
})


