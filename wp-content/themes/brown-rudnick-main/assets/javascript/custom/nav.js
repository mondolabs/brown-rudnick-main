// desktop navigation hover interactions

var navbar = {
	onHover: function(){
		// medium breakpoint
		if ($(window).innerWidth() > 700 ) {
				$('.menu-item-has-children').on({
					mouseover: function(){
						$('.subnav__color-block').stop().show(400);
					},
					mouseout: function(){
						$('.subnav__color-block').stop().hide(400);
					}
				});	
			}
		}
}

$(document).ready(function(){
	navbar.onHover();
});