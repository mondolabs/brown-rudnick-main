var SEARCH = {
	replaceText: function(){
		$('#s').keypress(function(){
			window.setTimeout(function(){
				$('#enter-search').text('ENTER YOUR SEARCH');
			}, 500);
		})
	}
}

$(document).ready(function(){
	SEARCH.replaceText();
})