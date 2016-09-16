var RELATED_EXPERIENCES = {
	addListeners: function(){
		$('#showMoreRelatedExperiences, .expander').click(function(event) {
			var hiddeExperiences = $('.sidebar__color-block--outer-wrapper.hidden__exp');
			$(hiddeExperiences).toggleClass('hidden');
			var expander = $('.expander');
			$(expander).toggleClass('expanded');
			if ($('#showMoreRelatedExperiences').hasClass('more')){
				$('#showMoreRelatedExperiences').removeClass('more').addClass('less').text("SHOW LESS");
			} else {
				$('#showMoreRelatedExperiences').removeClass('less').addClass('more').text("SHOW MORE");
			}
		});
	}
}

$(document).ready(function(){
	RELATED_EXPERIENCES.addListeners();
});