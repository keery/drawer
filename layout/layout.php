<!DOCTYPE html>
<html>
	<head lang="fr">
		<base href="<?php echo DIRNAME.DS; ?>" />
		<link rel="stylesheet" href="assets/css/dist/style.css">
		<meta charset="UTF-8">
		<title>Creative </title>		
	</head>
	<body>	
	<div class="flex-wrapper row">
		<aside class="sideNav col-lg-3">
			<header class="header">
				<img src="assets/img/Group.png" alt="">
				<h2>Jean Louis laperche</h2>
				<span>Dessinateur</span>
				<div>
					<a href="">Jean-louis.creative.fr</a>
					<img src="" alt="">
				</div>
			</header>
			<nav class="nav">
				<ul>
					<a href="<?php path('contact') ?>"><li class="selected">dashboard</li></a>
					<a href="<?php path('contact') ?>"><li>statistiques</li></a>
					<a href="<?php path('contact') ?>"><li>mes pages</li></a>
					<a href="<?php path('contact') ?>"><li>mes articles</li></a>
					<a href="<?php path('contact') ?>"><li>mes medias</li></a>
					<a href="<?php path('contact') ?>"><li>mon compte</li></a>
				</ul>
			</nav>
		</aside>
		<div class="wrapper content col-lg-8">
			<?php include(TPL.$tpl); ?>
		</div>
	</div>
	<footer>
		
	</footer>
	</body>
</html>