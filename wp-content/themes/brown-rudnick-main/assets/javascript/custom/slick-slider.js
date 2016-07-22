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
					prevArrow: $('.prev-slider-home'),
					nextArrow: $('.next-slider-home')
				});
	}
});
	