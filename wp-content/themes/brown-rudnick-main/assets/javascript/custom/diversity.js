var BR = {
	addListeners: function() {
		$('.close__modal').click(function(event) {
			$(this).closest('.modal__background').fadeOut('300').addClass('hidden');
			console.log("closing modal")
			PEOPLE.cancelEnterDown();
		});
		$('.accordion__trigger').click( function(e){
			var triggerId = $(this).data('trigger-target');
			var accordion = $('#'+triggerId);
			$(accordion).slideToggle(400);
		})
		$('#diversityModalTrigger').click(function(event) {
			$('.modal__background').removeClass('hidden').fadeIn('slow');
		});
	}
}
$(document).ready(function(){
	BR.addListeners();
});