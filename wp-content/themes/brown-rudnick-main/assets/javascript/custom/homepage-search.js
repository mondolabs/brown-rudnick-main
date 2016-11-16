var HomePageSearch = {

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
			HomePageSearch.checkScroll();
		});
	},

	outsideClick:function(){
			$('.js-off-canvas-exit').click(function(event){
				$('body').toggleClass('no-scroll');
				HomePageSearch.checkScroll();
			});
	},


	closeModal: function(){
		$('.close-button').click(function(event){
			$('body').toggleClass('no-scroll');
			HomePageSearch.checkScroll();
		
		});
	},

	submit: function(){
		if ( $("body").hasClass("page-template-homepage") ){
			$(function(){
				$('#search__people').submit(function(event){
					event.preventDefault();
					var keyword = $('#search-by-keyword').val();
					window.location.replace('/all-people/?keyword='+keyword);
				});
			});
		}
	}
}; 


$(document).ready(function(){
	if ( $('body').hasClass('page-template-homepage') ){
		HomePageSearch.submit();
		HomePageSearch.openModal();
		HomePageSearch.closeModal();
		HomePageSearch.outsideClick();
	}
});
