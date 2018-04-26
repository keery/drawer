<?php 
return 
[
	'admin' => [
		'prefix' => 'admin',
		'accessibility' => ['ADMINISTRATEUR', 'MODERATEUR'],
		'routes' => [
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
            'user_list' =>
                [
                    'path' => 'users',
                    'controller' => 'User',
                    'action' => 'index'
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
			'statistic' => 
				[
					'path' => 'statistic',
					'controller' => 'Main',
					'action' => 'stats'
				],
			'articles' => 
				[
					'path' => 'articles',
					'controller' => 'Main',
					'action' => 'articles'
				],			
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
	'landing' => 
		[
			'path' => 'landing',
			'controller' => 'Landing',
			'action' => 'index'
		],	
	'site' => 
		[
			'path' => 'site',
			'controller' => 'Site',
			'action' => 'index'
		],	
	'oeuvre' => [
		'prefix' => 'site',
		'routes' => [
			'oeuvre' => [
				'path' => 'oeuvre',
				'controller' => 'Site',
				'action' => 'oeuvre'
			],
			'contact' => [
				'path' => 'contact',
				'controller' => 'Site',
				'action' => 'contact'
			]	
		]
	],
	'erreur' =>
		[
			'path' => 'erreur',
			'controller' => 'Error',
			'action' => 'error404'
		]
];
?>