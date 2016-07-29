$(document).ready(function(){
	if ( $("body").hasClass("page-template-page-homepage") ){
		// animate grids on row of homepage
		window.sr = ScrollReveal({distance:'5%', duration: 900, delay: 1, reset:true, scale:0.99, easing: 'linear'});
		sr.reveal('.row');
	}
});
