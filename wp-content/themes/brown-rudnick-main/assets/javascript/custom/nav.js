// desktop navigation hover interactions

// edited foundation.dropdownMenu.js line 368 to make delay on closing time after mouseout event shorter 
// to restore to default, set this number to '500'


var navbar = {
	onHover: function(){
		// medium breakpoint
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
		}
}

$(document).ready(function(){
	navbar.onHover();
});