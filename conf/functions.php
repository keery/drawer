<?php
	use Module\Router\Router;

	function path($routeName, $params=null)
	{
		$router = new Router();
        return DIRECTORY.DS.$router->routeHandler($routeName, $params);
	}
	function redirectToRoute($route) {
		header('Location: '.path($route));
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

	function articleTimeAgo($date)
    {
        // Pour le décalage horraire.
        date_default_timezone_set("Europe/Paris");
        // Je prend la date de l'objet article via l'accesseur
        $time_ago = strtotime($date);
        $current_time = time();
        // je calcule la différence avec la date actuelle
        $time_difference = $current_time - $time_ago;

        $seconds = $time_difference;
        $minutes      = round($seconds / 60 );           // value 60 is seconds
        $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks          = round($seconds / 604800);          // 7*24*60*60;
        $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if($seconds <= 60) return "Ajouté à l'instant";
        else if($minutes <=60)
        {
            if($minutes==1) return "Il y'a une minute";
            else return "Il y'a ".$minutes." minutes.";
        }
        else if($hours <=24)
        {
            if($hours==1) return "Il y'a une heure";
            else return "Il y'a ".$hours." heures";
        }
        else if($days <= 7)
        {
            if($days==1) return "Ajouté hier";
            else return "Il y'a ".$days." jours.";
        }
        else if($weeks <= 4.3) //4.3 == 52/12
        {
            if($weeks==1)  return "Ajouté il y'a une semaine";
            else return "Il y'a ".$weeks." semaines";
        }
        else if($months <=12)
        {
            if($months==1) return "Ajouté il y'a un mois";
            else return "Il y'a ".$months." mois";
        }
        else
        {
            if($years==1) return "Ajouté il y'a un an";
            else return "Il y'a ".$years." ans";
        }
    }
 ?>