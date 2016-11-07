var homepage = { 
	initializeSlider: function () {

	var animateSvg = function(){
			//animate
			$('#slider-svg').animate({
				'background-position-x':'-50%'
			}, 3995, 'linear', function(){
				$('#slider-svg').css({
					'background-position-x':'50%'
				});
			});
		}


		$('.prev-slider-home').click(function(){
			$(this).toggleClass('arrow-clicked');
			animateSvg();
		});

		// // animate SVG on slide change
		$('.slider-container').on('beforeChange', function(slick, currentSlide, nextSlide){
			animateSvg();
		});


		if ( $("body").hasClass("page-template-homepage") ){

	

			animateSvg();
			// start Slick slider
			$('.slider-container').slick({
				slide: '.slide',
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 4000,
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
	if( $('#slider-svg').length ){
		homepage.initializeSlider();
	}	
});
	