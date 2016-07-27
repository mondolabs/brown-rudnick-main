$(document).ready(function(){
	if ( $("body").hasClass("page-template-page-homepage") ){

		$('.slider-container').slick({
					slide: '.slide',
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 3000,
					arrows: true,
					pauseOnHover: true,
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
					strokeWidth: 20
				});
				line.animate({stroke: '#c10819'}, 2900 , mina.easein);
				};
				animateSvg();

			$('.slider-container').on('beforeChange', function(slick, currentSlide, nextSlide){
				animateSvg();
			});


	}




});
	