<?php 
return 
[
	'admin' => [
		'prefix' => 'admin',
		'accessibility' => ['ADMINISTRATEUR', 'MODERATEUR'],
		'routes' => [
			'admin_index' =>
			[
				'path' => '/',
				'controller' => 'Main',
				'action' => 'index'
			],
			'pages' => 
				[
					'path' => 'pages',
					'controller' => 'Main',
					'action' => 'pages'
				],
            'users' =>
                [
                    'path' => 'users',
                    'controller' => 'User',
                    'action' => 'index'
                ],
			'user_add' =>
                [
                    'path' => 'users/add',
                    'controller' => 'User',
                    'action' => 'add'
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
					'controller' => 'Article',
					'action' => 'articles'
				],
			'article_edit' => 
				[
					'path' => 'article/{id}',
					'controller' => 'Article',
					'action' => 'editArticle',
					'params' => 
					[
						'id' => ['pattern' => '\d+']
					]
				],
			'article_add' => 
				[
					'path' => 'add/article',
					'controller' => 'Article',
					'action' => 'editArticle'
				],
            'images' =>
                [
                    'path' => 'images',
                    'controller' => 'Image',
                    'action' => 'index'
                ],
			'delete_entity' => 
				[
					'path' => 'delete/{entity}/{id}',
					'controller' => 'Main',
					'action' => 'delete',
					'params' => 
					[
						'entity' => ['pattern' => '[a-z]+'],
						'id' => ['pattern' => '\d+']
					]
				]
		]
	],
    'installer-config' =>
        [
            'path' => 'installer-config',
            'controller' => 'InstallerConfig',
            'action' => 'index'
        ],
    'installer-user' =>
        [
            'path' => 'installer-user',
            'controller' => 'InstallerUser',
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
		],
	'ajax' => [
		'prefix' => 'ajax',
		'routes' => [
			'ajax_files' => 
			[
				'path' => 'upload',
				'controller' => 'Ajax',
				'action' => 'uploadFiles'
			]	
		]
	]
];
?>