<!DOCTYPE html>
<html>
	<head lang="fr">
		<base href="<?php echo DIRNAME.DS; ?>" />
		<link rel="stylesheet" href="css/dist/style.css">
		<meta charset="UTF-8">
		<title>Creative </title>		
	</head>
	<body>
		<!-- <header>
			<nav class="container">
				<div class="row">
					<div class="blue col-xs-6 col-sm-8"></div>
					<div class="red col-xs-6 col-sm-4"></div>
				</div>
				<ul>
					<li>
						<a href="<?php path('contact') ?>">test</a>
					</li>
					<li>
						<a href="<?php path('article', ['id' => 1]) ?>">Article numero 1</a>	
					</li>
				</ul>
			</nav>
		</header> -->
		<?php include(TPL.$tpl); ?>
		<footer>
			
		</footer>
	</body>
</html>