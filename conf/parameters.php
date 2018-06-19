<?php
return [
	'ROLES' =>
	[
		"UTILISATEUR" => [],
		"MODERATEUR" => ['UTILISATEUR'],
		"ADMINISTRATEUR" => ['MODERATEUR', 'UTILISATEUR']
	]
];