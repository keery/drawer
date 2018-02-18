$(document).ready(function(){	
	$(document).on("click", "#burger", function(){
		var nav = $('.nav-top');
		if(nav.hasClass('open')) nav.removeClass('open');
		else nav.addClass('open');
	});

	$(document).on("click", ".main-menu>li>a", function(){
		if($("#burger").is(':visible'))
		{
			$('.nav-top').removeClass('open');
		}
	});

});