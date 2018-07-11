<!DOCTYPE html>
<html>
	<head lang="fr">
        <link rel="stylesheet" href="<?php echo DIRNAME ;?>/assets/css/dist/style.css">
		<meta charset="UTF-8">
		<title>Creative</title>
		<base href="<?php echo DIRECTORY; ?>/">
        	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	</head>
	<body>
		<div id="installer" class="u-pd--m">
		<?php include(TPL.$tpl); ?>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/plugin/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="js/plugin/tinymce/langs/fr.js"></script>
		<script type="text/javascript" src="js/plugin/GEUploader.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>