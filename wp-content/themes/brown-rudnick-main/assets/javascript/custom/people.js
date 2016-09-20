var PEOPLE = {
	listeners: function(){
		console.log('People js loaded');
		$('.letter__link').click(function(event) {
			var letter = $(this).data('letter');
			var letterAnchor = $("div[data-letter-anchor="+ letter +"]");
			$('html,body').animate({
	          scrollTop: letterAnchor.offset().top - 200
	        }, 1000);
	        console.log("Scrolling to" + letter )
	        return false;
		});
	}
}

$(document).ready(function(){
	PEOPLE.listeners();
})