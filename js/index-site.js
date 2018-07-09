$(document).ready(function(){	
    vote = true;
    
        $(".fa-thumbs-down, .fa-thumbs-up").on('click', function() {
            if( vote ) {
                vote = false ;



                setTimeout(function(){
                    vote = true;
                }, 1000);
                
                var _this = $(this);
                var id = $(this).attr('data-article');
                
                var type = null;
                var next = ".fa-thumbs-up";
                if(_this.hasClass('active')) {
                    type = "delete";
                }
                else if(_this.hasClass('fa-thumbs-up')) {
                    type = 'like';
                    next = ".fa-thumbs-down";
                } 
                else if(_this.hasClass('fa-thumbs-down')) {
                    type = 'dislike';
                }
                if(type != null) {
                    $.ajax({
                        url: "ajax/action/"+id+"/"+type,
                        type: "GET",
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function (response) 
                        {
                            var badge = _this.next('b');
                            $(".fa-thumbs-down, .fa-thumbs-up").removeClass('active');
                            if(type != "delete") {
                                var nextBadge = _this.parent().parent().find(next).next('b');
                                var valueNext = parseInt( nextBadge.text() );
                                badge.text(parseInt( badge.text() )+1);

                                if(valueNext > 0) nextBadge.text(valueNext-1);
                                
                                _this.addClass('active');
                            }                    
                            else badge.text(parseInt( badge.text() )-1);
                        },
                        error: function(erreur, etat) 
                        {
                            console.log("ERREUR");
                        }
                    });
                }
            }            
        });
});
    