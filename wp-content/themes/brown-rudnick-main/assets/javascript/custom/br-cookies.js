var BR_COOKIES = {
        setCookies: function(event){
            if (Cookies.enabled){
                var value = "";
                var randomString = function(){
                    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                    for( var i=0; i < 5; i++ ) {
                        value += possible.charAt(Math.floor(Math.random()*possible.length));
                    }
                    return value;
                }
                randomString();
                // create a hash for the cookie
                var hash = $.md5(value);
                // set cookie to expire in a week
                Cookies.set('brown-rudnick-visitor', hash, { expires: 604800});
                // this cookie could be submitted asynchronously to an endpoint if necessary        
                // invoke function to check for cookie, defined below
                this.checkCookies();
                $('#cookies-notification').slideToggle(800);
            } else {
                alert('Your browser does not allow cookies. Our site requires cookies to be enabled to function properly. Please make sure you use this site with a browswer that allows them. Thank you.');
            }
        },
        checkCookies: function(){   
            // // check if there are cookies or not by retrieving cookie by its key
            if (Cookies.get('brown-rudnick-visitor') === undefined){
                $('#cookies-notification').slideToggle(800);
            } 
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
            var diversityModal = $('.modal__background.diversity');
            diversityModal.removeClass('hidden').fadeIn('slow');
        }
    };



$(document).ready(function(){
    $('#set-cookies').click(function(event){
        BR_COOKIES.setCookies();
    });
	BR_COOKIES.checkCookies();
})