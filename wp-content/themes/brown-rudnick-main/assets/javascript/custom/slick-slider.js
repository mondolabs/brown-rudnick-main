$(document).ready(function(){

	if ( $("body").hasClass("page-template-page-homepage") ){

		$('.slider-container').slick({
					slide: '.slide',
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 4000,
					arrows: true,
					fade: true,
					prevArrow: $('.prev-slider-home'),
					nextArrow: $('.next-slider-home')
				});

				//create svg
				var s = Snap("#slider-svg");
				var line = s.paper.line(0, 0, 2500, 0);
				// animate svg under slider
				var animateSvg = function() {
					line.attr({
						stroke: 'transparent',
						fill: 'none',
						strokeWidth: 5,
						"fill-opacity" : 0
					});
					line.animate({stroke: '#c10819', fill:'none'}, 3900 , mina.linear);
				};
				animateSvg();
				// animate svG on slide change
			$('.slider-container').on('beforeChange', function(slick, currentSlide, nextSlide){
				animateSvg();
			});
	}
});
	