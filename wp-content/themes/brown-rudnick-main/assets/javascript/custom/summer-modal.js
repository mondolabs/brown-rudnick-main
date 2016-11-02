var SUMMER = {
	expandSchedule: function(){
		$('#recruitingModal').click(function(event){
			console.log('recruting');
			var summerModal = $('.modal__background.diversity');
			summerModal.removeClass('hidden').fadeIn('slow');
		});
	}
}

$(document).ready(function(){
	SUMMER.expandSchedule();
})