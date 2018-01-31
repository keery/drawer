<?php 
return 
[
	'index' => 
		[
			'path' => '/',
			'controller' => 'Main',
			'action' => 'index'
		],
	'article' => 
		[
			'path' => '/article/edit/{id}',
			'controller' => 'Main',
			'action' => 'index',
			'params' => 
			[
				'id' => ['pattern' => '\d+']
			]
		],		
	'contact' =>
		[
			'path' => '/contact',
			'controller' => 'Main',
			'action' => 'test'
		],
	'erreur' =>
		[
			'path' => '/erreur',
			'controller' => 'Error',
			'action' => 'error404'
		]
];
?>