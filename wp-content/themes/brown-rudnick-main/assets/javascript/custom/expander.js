var EXPANDER = {
	addListeners: function(){
		$('#showMoreRelatedExperiences, .experience_expander').click(function(event) {
			$(document.body).trigger("sticky_kit:recalc");
			var hiddenExperiences = $('.sidebar__color-block--outer-wrapper.hidden__exp');
			$(hiddenExperiences).toggleClass('hidden');
			var hiddenMenuItems = $('.sidebar-items__wrapper');
			$(hiddenMenuItems).slideToggle('300');
			var expander = $('.experience_expander');
			$(expander).toggleClass('expanded');
			if ($('#showMoreRelatedExperiences').hasClass('more')){
				$('#showMoreRelatedExperiences').removeClass('more').addClass('less').text("SHOW LESS");
			} else {
				$('#showMoreRelatedExperiences').removeClass('less').addClass('more').text("SHOW MORE");
			}
		});
		$('.job_expander').click(function(event) {
			var expander = $(this);
			var hiddenJobDescripton = $(expander).parent().parent().next('tr').find('td');
			$(hiddenJobDescripton).slideToggle(400);
			$(expander).toggleClass('expanded');
		});
		$('.mobile__sidebar--expander').click(function(event) {
			var expander = $(this);
			var triggerId = $(expander).data('show-target');
			var hiddenMenuItems = $('#'+triggerId);
			$(hiddenMenuItems).slideToggle(400);
			console.log('expanded');
			$(expander).toggleClass('expanded');
		});

	}
}

$(document).ready(function(){
	EXPANDER.addListeners();
});

 