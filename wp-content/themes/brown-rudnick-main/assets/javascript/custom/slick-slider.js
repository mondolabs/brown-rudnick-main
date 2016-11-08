var homepage = { 
	initializeSlider: function () {

	var animateSvg = function(){
			//animate after slide change
			$('#slider-svg').animate({
				'background-position-x':'-50%'
			}, 8100, 'linear', function(){
				$('#slider-svg').css({
					'background-position-x':'50%'
				});
			});
		}



		// animate only once on page load
		var animateSvgOnce = function(){
			var flag = true;
			if (flag) {
					$('#slider-svg').animate({
						'background-position-x':'-50%'
					}, 8100, 'linear', function(){
						$('#slider-svg').css({
							'background-position-x':'50%'
						});
						return flag = false;
					});
			}
		}
	


		if ( $("body").hasClass("page-template-homepage") ){
			// start Slick slider
			$('.slider-container').slick({
				slide: '.slide',
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 8000,
				arrows: true,
				fade: true,
				pauseOnHover: false,
				pauseOnFocus: false,
				infinite: true,
				prevArrow: $('.prev-slider-home'),
				nextArrow: $('.next-slider-home')
			});

			animateSvgOnce();

			$('.slider-container').on('afterChange', function(event, slick, currentSlide, nextSlide){
				animateSvg();
			});
		
		}
	}
}


$(document).ready(function(){
	if( $('#slider-svg').length ){
		homepage.initializeSlider();
	}	
});
	