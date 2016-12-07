var SUMMER = {
	expandSchedule: function(){
		$('#recruitingModal').click(function(event){
			var summerModal = $('#summer-hiring-schedule');
			summerModal.removeClass('hidden').fadeIn('slow');
		});
	}
}

$(document).ready(function(){
	SUMMER.expandSchedule();
})