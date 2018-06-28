<?php 
return 
[
	'admin' => [
		'prefix' => 'admin',
		'role' => ROLE_MODERATEUR,
		'routes' => [
			'dashboard' =>
				[
					'path' => '/',
					'controller' => 'Main',
					'action' => 'index'
				],
            'users' =>
                [
                    'path' => 'utilisateurs',
                    'controller' => 'User',
                    'action' => 'index'
                ],
            'user_edit' =>
                [
                    'path' => 'utilisateur/{id}',
                    'controller' => 'User',
                    'action' => 'editUser',
                    'params' =>
                        [
                            'id' => ['pattern' => '\d+']
                        ]
                ],
            // 'user_add' =>
            //     [
            //         'path' => 'add/utilisateur',
            //         'controller' => 'User',
            //         'action' => 'editUser'
            //     ],
			'pages' => 
				[
					'path' => 'pages',
					'controller' => 'Page',
					'action' => 'pages',
					'role' => ROLE_ADMINISTRATEUR
				],				
			'page_edit' => 
				[
					'path' => 'page/{id}',
					'controller' => 'Page',
					'action' => 'editPage',
					'role' => ROLE_ADMINISTRATEUR,
					'params' => 
					[
						'id' => ['pattern' => '\d+']
					]
				],
			'page_add' => 
				[
					'path' => 'add/page',
					'controller' => 'Page',
					'action' => 'editPage',
					'role' => ROLE_ADMINISTRATEUR
				],
            'parametres' =>
                [
                    'path' => 'parametres',
                    'controller' => 'Main',
                    'action' => 'parametres'
                ],
            'template' =>
                [
                    'path' => 'template',
                    'controller' => 'Template',
                    'action' => 'template'
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
			'categories' => 
				[
					'path' => 'categories',
					'controller' => 'Categorie',
					'action' => 'categories'
				],
			'categorie_edit' => 
				[
					'path' => 'categorie/{id}',
					'controller' => 'Categorie',
					'action' => 'editCategorie',
					'params' => 
					[
						'id' => ['pattern' => '\d+']
					]
				],
			'categorie_add' => 
				[
					'path' => 'add/categorie',
					'controller' => 'Categorie',
					'action' => 'editCategorie'
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
				'path' => 'articles',
				'controller' => 'Site',
				'action' => 'articles'
			],
			'site_article_detail' => [
				'path' => '{name}/{id}',
				'controller' => 'Site',
				'action' => 'articleDetail',
				'params' => 
				[
					'name' => ['pattern' => '.*'],
					'id' => ['pattern' => '[0-9]+']
				]
			],
			'contact' => [
				'path' => 'contact',
				'controller' => 'Site',
				'action' => 'contact'
			]	
		]
	],
	'connexion' =>
		[
			'path' => 'connexion',
			'controller' => 'User',
			'action' => 'connexion'
		],
	'deconnexion' =>
		[
			'path' => 'logout',
			'controller' => 'User',
			'action' => 'logout'
		],
	'inscription' =>
		[
			'path' => 'inscription',
			'controller' => 'User',
			'action' => 'inscription'
		],
	'forget_password' =>
		[
			'path' => 'recuperation_password',
			'controller' => 'User',
			'action' => 'forgetPassword'
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
			],
			'delete_img' => 
			[
				'path' => 'delete_img/{id}',
				'controller' => 'Ajax',
				'action' => 'deleteImg',
				'params' => 
				[
					'id' => ['pattern' => '\d+']
				]
			]	
		]
	]
];
?>