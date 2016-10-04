var EXPANDER = {
	addListeners: function(){
		$('#showMoreRelatedExperiences, .experience_expander').click(function(event) {
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
			$(hiddenJobDescripton).slideToggle('fast');
			$(expander).toggleClass('expanded');
		});
	}
}

$(document).ready(function(){
	EXPANDER.addListeners();
});

 