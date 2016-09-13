// desktop navigation hover interactions

var navbar = {
	onHover: function(){
		if ($(window).innerWidth() > 640 ) {
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