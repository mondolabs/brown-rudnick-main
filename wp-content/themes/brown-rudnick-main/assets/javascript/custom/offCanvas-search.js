var offCanvasSearch = {

	checkScroll:function() {
		// leave in case you want to disable scroll
		// if ($('body').hasClass('no-scroll')) {
		// 	disableScroll.on();
		// } else {
		// 	disableScroll.off();
		// }
	},
	openModal: function(){
		$('.human-icon').click(function(event){			
			$('body').toggleClass('no-scroll');
			offCanvasSearch.checkScroll();
		});
	},
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
