<!DOCTYPE html>
<html>
	<head lang="fr">
		<base href="<?php echo DIRECTORY; ?>/">
		<link rel="stylesheet" href="assets/css/dist/style.css">
		<meta charset="UTF-8">
		<title>Creative </title>	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	</head>
	<body>	
	<div id="site" class="flex-wrapper">
    <header class="header">
			<div class="banner">
				<div class="banner-content">
					<h1 class='banner-title'>Hassan akar</h1>
					<h2 class='banner-subtitle'>Dessinateur amateur</h2>
					<div class='banner-social'>
						<img src="assets/img/facebook-logo-button.png" alt="">
						<img src="assets/img/twitter-logo-button.png" alt="">
						<img src="assets/img/instagram-logo.png" alt="">
					</div>
				</div>
			</div>
			<nav class="navbar">
				<div class="left">
					<a href="<?php path('site') ?>">Accueil</a>
					<a href="<?php path('oeuvre') ?>">Mes oeuvres</a>
					<a href="<?php path('contact') ?>">Me contacter</a>
				</div>
				<div class="right">
					<a href="#">Sign up</a>
					<a href="#" class="selected">Sign in</a>
				</div>
			</nav>
    </header>
		<div class="content">
			<?php include(TPL.$tpl); ?>
		</div>
	</div>
	<!-- <script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script> -->
	<!-- <script src="js/index.js"></script>	 -->
	</body>
</html>