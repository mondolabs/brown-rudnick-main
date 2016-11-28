var offCanvasSearch = {

	checkScroll:function() {
		// disable scroll on mobile only
		if ($('body').hasClass('no-scroll') && ($(window).innerWidth() <= 768)) {
			disableScroll.on();
		} else {
			disableScroll.off();
		}
	},
	// check for scroll prevent
	openModal: function(){
		$('.human-icon').click(function(event){			
			$('body').toggleClass('no-scroll');
			offCanvasSearch.checkScroll();
		});
	},
	// remove scroll prevent
	outsideClick:function(){
			$('.js-off-canvas-exit').click(function(event){
				$('body').toggleClass('no-scroll');
				offCanvasSearch.checkScroll();
			});
	},
	closeModal: function(){
		$('.close-button').click(function(event){
			$('body').toggleClass('no-scroll');
			offCanvasSearch.checkScroll();
		});
	},
	// submit search by keyword
	submit: function(){
			$(function(){
				$('#search__people').submit(function(event){
					event.preventDefault();
					var keyword = $('#search-by-keyword').val();
					window.location.replace('/all-people/?keyword='+keyword);
				});
			});
	}
}; 

$(document).ready(function(){
		offCanvasSearch.submit();
		offCanvasSearch.openModal();
		offCanvasSearch.closeModal();
		offCanvasSearch.outsideClick();
});
