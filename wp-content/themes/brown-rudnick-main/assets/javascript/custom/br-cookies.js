var BR_COOKIES = {
	onLoad: function(){
		console.log("BR Cookie Scripts loaded!");
	},
    createCookie: function(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        }
        else var expires = "";               

        document.cookie = name + "=" + value + expires + "; path=/";
    },
	readCookie: function(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    },

    eraseCookie: function(name) {
        BR_COOKIES.createCookie(name, "", -1);
    },
	visitDiversity: function(){
		BR_COOKIES.createCookie("visitedDiversity", "true");
		var visitedDiversity = BR_COOKIES.readCookie("visitedDiversity");
		console.log(visitedDiversity);
	},
	showDiversityModal: function() {
		console.log("Showing EOE Modal!");
		var diversityModal = $('.modal__background.diversity');
		diversityModal.removeClass('hidden').fadeIn('slow');
	}
}

$(document).ready(function(){
	BR_COOKIES.onLoad();
})