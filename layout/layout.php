<!DOCTYPE html>
<html>
	<head lang="fr">
		<link rel="stylesheet" href="assets/css/dist/style.css">
		<meta charset="UTF-8">
		<title>Creative </title>	
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	</head>
	<body>	
	<div class="flex-wrapper">
		<aside class="sideNav">
			<header class="header text-center">
				<div class="picture-circle bloc-center" style="background-image: url(assets/img/Group.png);"></div>
				<div class="hidden-xs">
					<h2>Jean Louis laperche</h2>
					<span>Dessinateur</span>
					<div>
						<a href="">Jean-louis.creative.fr</a>
						<img src="" alt="">
					</div>
				</div>
			</header>
			<nav class="nav">
				<ul>
					<a href="<?php path('index') ?>"><li class="selected">dashboard</li></a>
          <a href="<?php path('statistic') ?>"><li>statistiques</li></a>        
					<a href="<?php path('contact') ?>"><li>statistiques</li></a>
					<a href="<?php path('pages') ?>"><li>mes pages</li></a>
					<a href="<?php path('articles') ?>"><li>mes articles</li></a>
					<a href="<?php path('contact') ?>"><li>mes medias</li></a>
					<a href="<?php path('parametres') ?>"><li>Paramètres</li></a>
				</ul>
			</nav>
		</aside>
		<div class="body-wrapper content">
			<?php include(TPL.$tpl); ?>
		</div>
	</div>
	<footer>
		
	</footer>
    <script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>	
	</body>
</html>