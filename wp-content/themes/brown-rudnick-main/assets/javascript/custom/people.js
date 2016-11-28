var PEOPLE = {
	listeners: function(){
		
		$('#personRepresentationExpander').click(function(event) {
			event.preventDefault();
			var bullets = $('.bullet.representation');
			for (var i = bullets.length - 1; i >= 0; i--) {
				var bullet = bullets[i]
				if( !$(bullet).hasClass('first__five') ) {
					$(bullet).toggleClass('hidden');
				}
			}
			if ( $(this).hasClass('collapsed') ) {
				$(this).text('SHOW LESS');
			} else {
				$(this).text('SHOW MORE');
			}
			$(this).toggleClass('collapsed');
		});
		// navigate to letter anchor
		$('.letter__link').click(function(event) {
			var letterlLinkInnerWrappers = $('.letter__link--inner-wrapper');
			var letter = $(this).data('letter');
			var letterAnchor = $("div[data-letter-anchor="+ letter +"]");
			if (letterAnchor.offset() !== undefined) { 
				letterlLinkInnerWrappers.removeClass('letter--active');
				var selectedletterlLinkInnerWrapper = $(this).parent();
				selectedletterlLinkInnerWrapper.addClass('letter--active');
				$('html,body').animate({
		          scrollTop: letterAnchor.offset().top - 200
		        }, 1000);
		        $('.back__to__top').slideToggle();
		        return false;
			} else {
				// no element with that letter 
				// letter is not clickable
				letterAnchor.click(function(event){
					event.preventDefault();
				})
			}			
		});

		$('#advancedPeopleSearch, #insightsAdvancedSearch, #advancedMobileSearch').click(function(event) {
			PEOPLE.revealAdvancedSearch();
		});

		$('.tag__canceller').click(function(event) {
			event.preventDefault();
			var target = $(this);
			var targetVal = target.data().tag.toUpperCase();
			var targetName = target.data().name;
			var baseRoute = location.origin + location.pathname;
			var newUrl = window.location.href.replace(targetVal, '').replace(targetName, '');
			var lastChar = newUrl.substr(newUrl.length - 1);
			if (lastChar === '=') {
				window.location.replace(baseRoute);
			} else {
				window.location.replace(newUrl);
			}
		});

		$('#peopleAdvancedSearchButton').click(function(event) {
			event.preventDefault();
			var selects = $('select');
			var keyword = $("#keywordInput").val() || "";
			var queryStringBase = location.origin + location.pathname;
			var queryString = "";
			var filters = [];
			// selects values from dropdown options and determines number of filters from these
			for (var i = selects.length - 1; i >= 0; i--) {
				var select = selects[i];
				if ( $(select).val().length > 0 ) {
					filters.push($(select));
				}
			}
			// passes the parameters from each of the selected filters
			for(var i = filters.length - 1; i >= 0; i--) {
				var paramName = $(filters[i]).attr('name');
				var paramValue = $(filters[i]).val();
				if ( paramValue.length > 0 && i === filters.length - 1 ) {
					queryString = queryStringBase + "?" + paramName + "=" + paramValue;
				} else if ( paramValue.length > 0 ) {
					queryString = queryString + "&" + paramName + "=" + paramValue;
				}
			}
			if ( queryString.length > 0 ){
				if ( keyword.length > 0 ) {
					queryString = queryString + "&keyword=" + keyword;
				}
			} else {
				if ( keyword.length > 0 ) {
					queryString = queryString + "?keyword=" + keyword;
				}
			}
			window.location.replace(queryString);
		});
	},
	stickySideBar: $('.sidebar__on-scroll--fixed'),
	revealAdvancedSearch: function(){
		$('#advancedSearchModal').removeClass('hidden').fadeIn('slow');
	},
	hideAdvancedSearch: function(){
		$('#advancedSearchModal').addClass('hidden').fadeOut('slow');
	},
	scrollBackToTop: function(){
		$('.back__to__top').click(function(event){
			$('html,body').animate({
        scrollTop: $('.letter__links_wrapper').offset().top - 200
      }, 1000);
      if ($(this).is(":visible")) {
				$(this).slideToggle();
      }
		});
	},

	inactiveLetter: function(){
		var anchors = $('.letter__anchor--indicator');
		var letterLinks = $('.letter__link');
		var alphabet =["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
		for (var a = 0; a <alphabet.length; a++){
			if ($(".letter__anchor--indicator[data-letter-anchor*='"+alphabet[a]+"']").length === 0 ){
				$(".letter__link[data-letter*='"+alphabet[a]+"']").parent().addClass('inactive--letter');
			} 
		}


	},

	printPage: function(){
		$('#print--page').click(function(){
			window.print();
		});
	},

	scrollToLocationHash: function(){
			var locationHash = window.location.hash;
			var hashAnchor = $("div[data-letter-anchor="+ locationHash.replace(/^#+/i, '') +"]");
			if (hashAnchor.offset() !== undefined) { 
				$('html,body').animate({
	          scrollTop: hashAnchor.offset().top - 200
	        }, 1000, function(){
						if ($(window).innerWidth() < 768){
							$('.back__to__top').show(3000);
						}
	        });
	        return false; 
			} 
		}
};

$(document).ready(function(){
	PEOPLE.listeners();
	PEOPLE.scrollBackToTop();
	PEOPLE.scrollToLocationHash();
	PEOPLE.printPage();
	PEOPLE.inactiveLetter();

	$(window).on('resize', function(event) {		
		var headerHeight = $('#mastheadOnScroll').height() + 160;
		var elementToStick = PEOPLE.stickySideBar;
		if ( $('.sidebar__on-scroll--fixed').length > 0 && $(document).width() >= 768 ){
			elementToStick.stick_in_parent({ offset_top: headerHeight });
		}	else {
			console.log("resized and small")
			elementToStick.trigger("sticky_kit:detach");
		}	
	});

	var headerHeight = $('#mastheadOnScroll').height() + 160;
	var elementToStick = $('.sidebar__on-scroll--fixed');
		if ( PEOPLE.stickySideBar.length > 0){
			if ($(document).width() >= 768) {
				elementToStick.stick_in_parent({ offset_top: headerHeight });
			} 	
	}	

	// prevent submit on enter
	if ( $('body').hasClass('page-template-people') ){
		$(window).keydown(function(e){
			if (e.keyCode == 13){
				e.preventDefault();
				return false;
			}
		});
	}
	
	$(document).bind('scroll', function(){
		var  closestText = $('.sidebar__on-scroll--fixed').nearest('.letter__anchor--indicator').text();
		for (var i= 0; i < $('.letter__link').length; i++) {
			var elem = $('.letter__link')[i];
			if ($.trim($(elem).text()) === $.trim(closestText)) {
				$('.letter--active').removeClass('letter--active');
				$(elem).parent().addClass('letter--active');
			}
		}
	});

	$(window).trigger('resize');
});