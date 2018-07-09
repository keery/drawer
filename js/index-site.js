$(document).ready(function(){	
	$(".fa-thumbs-down, .fa-thumbs-up").on('click', function() {
        var _this = $(this);
        var id = $(this).attr('data-article');
        
        var vote = null;
        var type = null;
        if($(this).hasClass('fa-thumbs-up')) {
            type = 'like';
            vote = 1;
        } 
        else if($(this).hasClass('fa-thumbs-down')) {
            type = 'dislike';
            vote = 0;
        }
        if(vote != null && type != null) {
            $.ajax({
                url: "ajax/action/"+id+"/"+type,
                type: "GET",
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) 
                {
                    $(".fa-thumbs-down, .fa-thumbs-up").removeClass('active');
                    _this.addClass('active');
                },
                error: function(erreur, etat) 
                {
                    console.log("ERREUR");
                }
            });
        }
	});
});
    