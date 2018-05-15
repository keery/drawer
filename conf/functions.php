<?php
	use Module\Router\Router;

	function path($routeName, $params=null)
	{
		$router = new Router();
		return $router->routeHandler($routeName, $params);
	}
	function redirectToRoute($route) {
		header('Location: '.DIRECTORY.DS.path($route));
	}

	function isGranted(array $role) {
		return $user->hasRole($role);
	}
 ?>