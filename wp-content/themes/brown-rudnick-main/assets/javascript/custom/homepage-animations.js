$(document).ready(function(){
	if ( $("body").hasClass("page-template-homepage") ){
		// animate grid elements on homepage
		window.sr = ScrollReveal({distance:'10%', duration: 900, delay: 1, reset:true, scale:0.99, easing: 'linear'});
		sr.reveal('.homepage-grid-element');
	}
});
