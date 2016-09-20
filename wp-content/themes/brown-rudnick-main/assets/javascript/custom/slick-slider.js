var homepage = { 
	initializeSlider: function () {

		// create SVG
		var s = Snap("#slider-svg");
		var line = s.paper.line(0, 0, 2500, 0);

		// set SVG attributes
		var animateSvg = function() {
			line.attr({
				stroke: 'transparent',
				fill: 'none',
				strokeWidth: 5,
				"fill-opacity" : 0
			});

			// animate SVG line	
			line.animate({stroke: '#c10819', fill:'none'}, 1900 , mina.linear);
		
		};
		
		animateSvg();

		// animate SVG on slide change
		$('.slider-container').on('beforeChange', function(slick, currentSlide, nextSlide){
			animateSvg();
		});

		if ( $("body").hasClass("page-template-homepage") ){


			// start Slick slider
			$('.slider-container').slick({
				slide: '.slide',
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				arrows: true,
				fade: true,
				infinite: true,
				prevArrow: $('.prev-slider-home'),
				nextArrow: $('.next-slider-home')
			});
		}
	}
}


$(document).ready(function(){
	homepage.initializeSlider();
});
	