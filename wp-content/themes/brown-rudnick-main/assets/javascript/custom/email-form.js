// publication request and contact us modal

var emailContact = {
	revealNotice: function(event){
		$('#emailModal').removeClass('hidden').fadeIn('slow');
	},
	hideNotice: function(){
		$('#email-modal-close').click(function(){
			$('#emailModal').addClass('hidden').fadeOut('slow');	
		});
	},
	leavePage: function(){	
		$('#redirectBack').click(function(){
			window.history.back();
		});
	}
}

$(document).ready(function(){
	if ( $('body').hasClass('page-template-publication-request') || $('body').hasClass('page-template-contact-us') ) {
		emailContact.revealNotice();
		emailContact.hideNotice();
		emailContact.leavePage();
	}	
});