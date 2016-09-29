var BR = {
	addListeners: function() {
		// $('a.link').hover( 
		// 	function(){
		// 		var redHover = $(this).find('span');
		// 		$(redHover).animate({"marginBottom":"10px"}, 300);
		// 		$(redHover).animate({"opacity":"1"}, 300);

		// 	},
		// 	function(){
		// 		var redHover = $(this).find('span');
		// 		$(redHover).animate({"marginBottom":"0"}, 300);
		// 		$(redHover).animate({"opacity":"0"}, 300);
		// 	}
		// )
		$('.close__modal').click(function(event) {
			$(this).closest('.modal__background').fadeOut('300').addClass('hidden');
		});
		$('.accordion__trigger').click( function(e){
			var triggerId = $(this).data('trigger-target');
			var accordion = $('#'+triggerId);
			$(accordion).slideToggle(400);
			// $(accordion).slideToggle(300, function(){
			// 	$(this).toggleClass('hidden');
			// })
		})
	}
}



$(function(){
	BR.addListeners();
});