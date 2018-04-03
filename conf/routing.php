<?php 
return 
[
	'admin' => [
		'prefix' => 'admin/',
		'accessibility' => ['ADMINISTRATEUR', 'MODERATEUR'],
		'routes' => [
			'landing' => 
			[
				'path' => 'landing',
				'controller' => 'Landing',
				'action' => 'index'
			]
		]
	],
	'installer' => 
		[
			'path' => 'installer',
			'controller' => 'Installer',
			'action' => 'index'
		],	
	'index' => 
		[
			'path' => '/',
			'controller' => 'Main',
			'action' => 'index'
		],
	// 'landing' => 
	// 	[
	// 		'path' => 'landing',
	// 		'controller' => 'Landing',
	// 		'action' => 'index'
	// 	],
	'statistic' => 
		[
			'path' => 'statistic',
			'controller' => 'Statistic',
			'action' => 'index'
		],
	'articles' => 
		[
			'path' => 'articles',
			'controller' => 'Main',
			'action' => 'articles'
		],	
	'site' => 
		[
			'path' => 'site',
			'controller' => 'Site',
			'action' => 'index'
		],		
	'article_edit' => 
		[
			'path' => 'article/{id}',
			'controller' => 'Main',
			'action' => 'editArticle',
			'params' => 
			[
				'id' => ['pattern' => '\d+']
			]
		],	
	'pages' => 
		[
			'path' => 'pages',
			'controller' => 'Main',
			'action' => 'pages'
		],
	'page_edit' => 
		[
			'path' => 'page/{id}',
			'controller' => 'Main',
			'action' => 'editPage',
			'params' => 
			[
				'id' => ['pattern' => '\d+']
			]
		],			
	'parametres' => 
		[
			'path' => 'parametres',
			'controller' => 'Main',
			'action' => 'parametres'
		],						
	'contact' =>
		[
			'path' => 'contact',
			'controller' => 'Main',
			'action' => 'test'
		],
	'erreur' =>
		[
			'path' => 'erreur',
			'controller' => 'Error',
			'action' => 'error404'
		]
];
?>