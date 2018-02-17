$(document).ready(function(){	
	$(document).on("click", "#burger", function(){
		var nav = $('.nav-top');
		if(nav.hasClass('open')) nav.removeClass('open');
		else nav.addClass('open');
	});
});