<!DOCTYPE html>
<html>
	<head lang="fr">
		<meta charset="UTF-8">
		<title>Creative </title>
		<base href="<?php echo DIRECTORY; ?>/">
		<link rel="stylesheet" href="assets/css/dist/style.css">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "admin_index" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('admin_index') ?>"><img src="assets/img/speedometer-white.svg" alt=""><span class="hidden-xs">Dashboard</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "statistic" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('statistic') ?>"><img src="assets/img/stat-picto-white.svg" alt=""><span class="hidden-xs">Statistiques</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "pages" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('pages') ?>"><img src="assets/img/page-picto-white.svg" alt=""><span class="hidden-xs">Mes pages</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "categories" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('categories') ?>"><img src="assets/img/article-picto-white.svg" alt=""><span class="hidden-xs">Catégories</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "articles" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('articles') ?>"><img src="assets/img/article-picto-white.svg" alt=""><span class="hidden-xs">Mes articles</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "users" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('users') ?>"><img src="assets/img/article-picto-white.svg" alt=""><span class="hidden-xs">Les utilisateurs</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "parametres" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('parametres') ?>"><img src="assets/img/settings-picto-white.svg" alt=""><span class="hidden-xs">Paramètres</span></a></li>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="js/plugin/tinymce/langs/fr.js"></script>
    <script type="text/javascript" src="js/plugin/GEUploader.js"></script>
    <script src="js/index.js"></script>
	</body>
</html>

