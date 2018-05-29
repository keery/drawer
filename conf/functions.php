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

	function format_date($date, $format) {
		return date_format(date_create($date), $format);
	}

	function getNotifs($key) {
		if(isset($_SESSION['notifs'][$key])) {
			$notifs = $_SESSION['notifs'][$key];
			unset($_SESSION['notifs'][$key]);
		}
		else $notifs = [];

		return $notifs;
	}
	
	function addNotif($notif, $key) {
		if(is_array($notif)) {
			foreach ($notif as $n) {
				$_SESSION['notifs'][$key][] = $n;
			}
		}
		else $_SESSION['notifs'][$key][] = $notif;
	}

	function getCurrentUrl() {
		return $_SERVER['CURRENT_ROUTE']['name'].(!empty($_SERVER['QUERY_STRING']) ? "?" : '' ).$_SERVER['QUERY_STRING'];
	}
 ?>