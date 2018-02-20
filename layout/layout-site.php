<!DOCTYPE html>
<html>
	<head lang="fr">
		<link rel="stylesheet" href="assets/css/dist/style.css">
		<meta charset="UTF-8">
		<title>Creative </title>	
		<base href="/">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	</head>
	<body>	
	<div id="site" class="flex-wrapper">
    <header>
      <nav class="left">
        <a href="">Accueil</a>
        <a href="">Mes oeuvres</a>
        <a href="">Me contacter</a>
      </nav>
      <nav class="right">
        <a href="">Sign up</a>
        <a href="" class="selected">Sign in</a>
      </nav>
    </header>
		<div class="content">
			<?php include(TPL.$tpl); ?>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
	<script src="js/index.js"></script>	
	</body>
</html>