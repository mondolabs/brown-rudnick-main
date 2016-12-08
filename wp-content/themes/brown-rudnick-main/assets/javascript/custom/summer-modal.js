var SUMMER = {
	expandSchedule: function(){
		$('#recruitingModal').click(function(event){
			var summerModal = $('.modal__background.diversity');
			summerModal.removeClass('hidden').fadeIn('slow');
		});
	}
}

$(document).ready(function(){
	SUMMER.expandSchedule();
})