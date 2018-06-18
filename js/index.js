$(document).ready(function(){	

	$("#dz_cd_article, .input-file.cd_article").GEUploader({ entity : "Module\\Entity\\Article", idZone : "dz_cd_article"});
	


	$(document).on("click", ".btn-edit-item", function(){
		var hasClass = $(this).hasClass('open');
		$(".btn-edit-item").removeClass('open');
		if(hasClass) $(this).removeClass('open');
		else $(this).addClass('open');
	});

	$(document).on("click", ".nav-links", function(){
		if($(this).hasClass('open')) $(this).removeClass('open');
		else $(this).addClass('open');
	});	
	tinymce.init({ 
		selector:'.editor',
		menubar: false,
		max_height: 500,
		statusbar: false,
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
		  	'textcolor colorpicker'
		],
		file_browser_callback: function(field_name, url, type, win) {
			win.document.getElementById(field_name).value = 'my browser value';
		},
		fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
		toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor fontsizeselect'
	});

	$(document).on("click", '.dial', function(event){
		event.preventDefault()
		var element = $(this),
			dataId = element.attr("data-id"),
			href = element.attr("href");

		if (dataId != null) 
		{
			var choix = 
			{
				"Annuler": function() 
				{
		          $(this).dialog("close");
		        },
		        Confirmer: function() 
		        {
		          	$(this).dialog("close");

		          	$.ajax({
						url: 'ajax/delete_img/'+dataId,
					    type: "GET",
					    dataType: 'json',

					    success: function (response) 
					    {

					    	if (response.state == true) 
					    	{
								element.closest("li").fadeOut();
					    	}
					    },
					    error: function(erreur, etat) 
					    {
					    	console.log("ERREUR");
					    }
					});
		        }
			}
		}
		else if(href != null)
		{
			var choix = 
			{
				"Annuler": function() 
				{
		          $(this).dialog("close");
		        },
		        Confirmer: function() 
		        {
					location= href;
		          	$(this).dialog("close");
		        }
			}
		}
	
		$("<div title='Confirmation'>Voulez-vous vraiment supprimer cet élément ?</div>").dialog({
				resizable: false,
				width: 450,
				height: 185,
				modal: true,
				buttons: choix,
				close: function(){ $(this).remove(); }
		});
	});

	tinymce.init({ 
		selector:'.editor-img',
		menubar: false, 
		max_height: 500,
		statusbar: false,
		required: true,
		plugins: [
		  'advlist autolink lists link charmap print preview anchor',
		  'searchreplace visualblocks code fullscreen',
		  'insertdatetime media table contextmenu paste code',
		  'textcolor colorpicker'
		],
		setup: function(editor) {
        editor.addButton('image', {
            icon: "image",
            label : "test",
			tooltip: "Ajouter une image",
            onclick: function(e) {

            	var parent = $(e.target).closest("button[type='button']").parent().parent();

                    if(parent.find('input').attr('id') != 'tinymce-uploader') {
                        parent.append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*">');
                    }

	            	parent.find('input#tinymce-uploader').trigger('click');

                    $('input#tinymce-uploader').change(function(){
                        var input, file, fr, reader;

                        input = $(this)[0];

                        if (!input) 
                        {
                        	alert("Une erreur est survenu")
                        }
                        if(input.files.length > 0)
                        {
                        	reader = new FileReader();
                        	file = input.files[0];

                        	var valid_MIME = MIMEis(file, ['img', 'pdf']);

                        	if (valid_MIME) 
                        	{
	                        	reader.onload = function()
	                        	{
		                        	
			                        var dataForm = new FormData();
									dataForm.append("data_base64", reader.result);

							        $.ajax({
										url: Routing.generate('ajax_img_editeur'),
									    type: "POST",
									    data: dataForm,
									    contentType: false,
							     		processData: false,
									    dataType: 'json',
		
									    success: function (response) 
									    {
				                            editor.insertContent('<img src="http://localhost/ysheza/web/uploads/img_upload/'+response.nom_fichier+'" width="200" />');
									    },
									    error: function(erreur, etat) 
									    {
									    	console.log("ERREUR");
									    }

									});                      		
	                        		
	                        	}

		                        reader.readAsDataURL(file);
                        	}
                        	else
                        	{
                        		console.log("Mime invalide");
                        	}
                        }
                    });
            }
        });
    },
	toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor fontsizeselect | link image'
	});	
});

function MIMEis(file, types) {

	var extensions = 
	{
		'img' : ['png', 'jpg', 'jpeg', 'gif', 'svg'],
		'pdf' : ['pdf']
	};


	if (file.constructor.name == "File") 
	{
			type_exist = true;
			for (var i = 0; i < types.length; i++) {
				
				if(!extensions.hasOwnProperty(types[i]))
				{
					type_exist = false;
				}					
			}
			if (type_exist) 
			{
				var MIME = file.type.split('/');

				if (MIME[1] != undefined) 
				{
					var type_valid = $.inArray(MIME[1], extensions[types[0]]);

					return type_valid >= 0;
				}
				else
				{
					console.log("Le type est incorrect");
				}
			}
			else
			{
				console.log("Les types ne sont pas valides");
			}
	}
	else
	{
		console.log("L'argument passé n'est pas de type file");
	}
}