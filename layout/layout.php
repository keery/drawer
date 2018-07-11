<!DOCTYPE html>
<html>
	<head lang="fr">
		<meta charset="UTF-8">
		<title>Creative </title>
		<base href="<?php echo DIRECTORY; ?>/">
        <link rel="stylesheet" href="<?php echo DIRNAME ;?>/assets/css/dist/style.css">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	</head>
	<body>
	<div class="flex-wrapper">
		<aside class="sideNav">
			<header class="header u-tac">
				<?php 
					$class='';
					if(isset($_SESSION[PREFIX."user"]['image'])) $img = UPLOAD.$_SESSION[PREFIX."user"]['image'];
					else {
						$class = 'no-img';
						$img = IMG."user.png";
					}
					?>
				<div class="picture-circle u-block--center <?php echo $class; ?>" style="background-image: url(<?php echo $img; ?>);"></div>
				<div class="hidden-xs">
					<h2><?php echo $_SESSION[PREFIX."user"]['prenom']." ".$_SESSION[PREFIX."user"]['nom']; ?></h2>
					<span><?php if(isset($_SESSION[PREFIX."user"]['profession'])) echo $_SESSION[PREFIX."user"]['profession']; ?></span>
					<div>
						<a href="<?php echo path('site'); ?>">Retour au site</a><a href="<?php echo path('deconnexion'); ?>"><i class="fas fa-power-off"></i></a>
					</div>
				</div>
			</header>
			<nav class="nav">
				<ul>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "dashboard" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('dashboard') ?>"><img src="assets/img/speedometer-white.svg" alt=""><span class="hidden-xs">Dashboard</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "statistic" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('statistic') ?>"><img src="assets/img/stat-picto-white.svg" alt=""><span class="hidden-xs">Statistiques</span></a></li>
					<?php if(isGranted(ROLE_ADMINISTRATEUR)): ?>
						<li <?php echo (in_array($_SERVER['CURRENT_ROUTE']['name'], ["pages","page_add","page_edit"]) ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('pages') ?>"><i class="fas fa-list picto-menu"></i><span class="hidden-xs">Mes pages</span></a></li>
					<?php endif; ?>
					<li <?php echo (in_array($_SERVER['CURRENT_ROUTE']['name'], ["categories","categorie_add","categorie_edit"]) ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('categories') ?>"><i class="fas fa-grip-horizontal picto-menu"></i><span class="hidden-xs">Catégories</span></a></li>
					<li <?php echo (in_array($_SERVER['CURRENT_ROUTE']['name'], ["commentaires","commentaire_edit"]) ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('commentaires') ?>"><i class="far fa-comment picto-menu"></i><span class="hidden-xs">Commentaires</span></a></li>
					<li <?php echo (in_array($_SERVER['CURRENT_ROUTE']['name'], ["articles","article_add","article_edit"]) ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('articles') ?>"><i class="fas fa-newspaper picto-menu"></i><span class="hidden-xs">Mes articles</span></a></li>
					<li <?php echo (in_array($_SERVER['CURRENT_ROUTE']['name'], ["users","user_edit"]) ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('users') ?>"><i class="fas fa-user picto-menu"></i><span class="hidden-xs">Les utilisateurs</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "parametres" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('parametres') ?>"><img src="assets/img/settings-picto-white.svg" alt=""><span class="hidden-xs">Paramètres</span></a></li>
					<li <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "template" ? 'class="selected"' : '') ?>><a class="u-mw" href="<?php echo path('template') ?>"><img src="assets/img/template-brush-white.svg" alt=""><span class="hidden-xs">Template</span></a></li>
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
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="js/plugin/tinymce/langs/fr.js"></script>
    <script type="text/javascript" src="js/plugin/GEUploader.js"></script>
    <script src="js/index.js"></script>
	</body>
</html>

