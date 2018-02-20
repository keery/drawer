<?php 
return 
[
	'index' => 
		[
			'path' => '/',
			'controller' => 'Main',
			'action' => 'index'
		],
	'landing' => 
		[
			'path' => 'landing',
			'controller' => 'Landing',
			'action' => 'index'
		],

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
			'action' => 'index',
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