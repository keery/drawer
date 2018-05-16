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

	function request_is($type) {
		return $type == $_SERVER['REQUEST_METHOD'];
	}

	function isGranted(array $role) {
		return $user->hasRole($role);
	}
 ?>