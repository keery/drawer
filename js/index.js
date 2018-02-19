$(document).ready(function(){	
	$(document).on("click", ".btn-edit-item", function(){
		var hasClass = $(this).hasClass('open');
		$(".btn-edit-item").removeClass('open');
		if(hasClass) $(this).removeClass('open');
		else $(this).addClass('open');
	});
});