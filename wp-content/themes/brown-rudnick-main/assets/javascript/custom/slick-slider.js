$(document).ready(function(){
	if ( $("body").hasClass("page-template-page-homepage") ){

		$('.slider-container').slick({
					slide: '.slide',
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 4000,
					// variableWidth: true,
					arrows: true,
					fade: true,
					prevArrow: $('.prev-slider-home'),
					nextArrow: $('.next-slider-home')
				});
			

				//create svg
				var s = Snap("#slider-svg");
				var line = s.paper.line(0, 0, 2000, 0);
				line.attr({
					fill: 'none',
					stroke: 'transparent',
					"fill-opacity" : 0
				});
				// animate svg under slider
				var animateSvg = function() {
					line.attr({
					stroke: 'transparent',
					fill: 'transparent',
					strokeWidth: 5
				});
				line.animate({stroke: '#c10819', fill:'#c10819'}, 3900 , mina.easeinout);
				};
				animateSvg();
				// animate svG on slide change, with -100 milisecond to account for the potential lag between
				// both effects
			$('.slider-container').on('beforeChange', function(slick, currentSlide, nextSlide){
				animateSvg();
			});


	}




});
	