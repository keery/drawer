<?php

namespace Module\Erreur;
use ErrorException;
use Module\Router\Router;

class Erreur extends ErrorException
{
  public function __toString()
  {
    switch ($this->severity)
    {
      case E_USER_ERROR : // Si l'utilisateur émet une erreur fatale;
        $type = 'Erreur fatale';
        break;
      
      case E_WARNING : // Si PHP émet une alerte.
      case E_USER_WARNING : // Si l'utilisateur émet une alerte.
        $type = 'Attention';
        break;
      
      case E_NOTICE : // Si PHP émet une notice.
      case E_USER_NOTICE : // Si l'utilisateur émet une notice.
        $type = 'Note';
        break;
      
      default : // Erreur inconnue.
        $type = 'Erreur inconnue';
        break;
    }
    
    return '<strong>' . $type . '</strong> : [' . $this->code . '] ' . $this->message . '<br /><strong>' . $this->file . '</strong> à la ligne <strong>' . $this->line . '</strong>';
  }
}

// function error2exception($code, $message, $fichier, $ligne)
// {
// 	try{

// 	  throw new Erreur($message, 0, $code, $fichier, $ligne);
// 	}
// 	catch(Erreur $e)
// 	{
// 		echo $e;
// 	}
// }

// function customException($e)
// {
// 	ob_end_clean();
//     // header('HTTP/1.1 500 Internal Server Error');
//     echo "Je suis dans le custom";
//     echo $e;
//     // $router = new Router();
//     // $router->redirectTo($router->getRouteByName('erreur'));
// }

set_error_handler(function ($code, $message, $fichier, $ligne) {
    echo "Je suis dans erreur";
  try{

    throw new Erreur($message, 0, $code, $fichier, $ligne);
  }
  catch(Erreur $e)
  {
    echo $e;
  }
});
set_exception_handler(function ($e) {
  ob_end_clean();
  header('HTTP/1.1 500 Internal Server Error');
  echo $e;
  $router = new Router();
  $router->redirectTo($router->getRouteByName('erreur'));
});