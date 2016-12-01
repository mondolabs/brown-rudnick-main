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
			$(this).parent().parent().toggleClass('no-bottom-border');
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
		// expand people details
		$('.person__details--expander').click(function(event) {
			var expander = $(this);
			var hiddenPersonDetails = $(expander).parent().parent().parent().find('.hidden__person-publication--details');
			$(this).parent().parent().toggleClass('no-bottom-border');
			var length = $(this).parent().parent().siblings().length;
			var lastSibling = $(this).parent().parent().siblings()[length-1];
			$(lastSibling).toggleClass('bottom-border-table');
			$(hiddenPersonDetails).toggle();
			$(expander).toggleClass('expanded');
		});

	}
}

$(document).ready(function(){
	EXPANDER.addListeners();
});

 