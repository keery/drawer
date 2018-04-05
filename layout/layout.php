<!DOCTYPE html>
<html>
	<head lang="fr">
		<link rel="stylesheet" href="/assets/css/dist/style.css">
		<meta charset="UTF-8">
		<title>Creative </title>
		<base href="/">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	</head>
	<body>
	<div class="flex-wrapper">
		<aside class="sideNav">
			<header class="header u-tac">
				<div class="picture-circle u-block--center" style="background-image: url(assets/img/Group.png);"></div>
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
					<li class="selected"><a class="u-mw" href="<?php path('index') ?>"><img src="assets/img/speed-picto-white.svg" alt=""><span class="hidden-xs">Dashboard</span></a></li>
         			 <li><a class="u-mw" href="<?php path('statistic') ?>"><img src="assets/img/stat-picto-white.svg" alt=""><span class="hidden-xs">Statistiques</span></a></li>
					<li><a class="u-mw" href="<?php path('pages') ?>"><img src="assets/img/page-picto-white.svg" alt=""><span class="hidden-xs">Mes pages</span></a></li>
					<li><a class="u-mw" href="<?php path('articles') ?>"><img src="assets/img/article-picto-white.svg" alt=""><span class="hidden-xs">Mes articles</span></a></li>
                    <li><a class="u-mw" href="<?php path('user_list') ?>"><img src="assets/img/article-picto-white.svg" alt=""><span class="hidden-xs">Les utilisateurs</span></a></li>
					<li><a class="u-mw" href="<?php path('parametres') ?>"><img src="assets/img/settings-picto-white.svg" alt=""><span class="hidden-xs">Paramètres</span></a></li>
				</ul>
			</nav>
		</aside>
		<div class="body-wrapper content">
			<div class="notif-clock"><span>2</span></div>
			<?php include(TPL.$tpl); ?>
		</div>
	</div>
	<footer>

	</footer>
    <script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="js/plugin/tinymce/langs/fr.js"></script>
    <script type="text/javascript" src="js/plugin/GEUploader.js"></script>
    <script src="js/index.js"></script>
	</body>
</html>
