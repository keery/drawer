<?php

namespace Drawer\Conf;
use Drawer\Module\Erreur\Erreur;

class Autoloader{

    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class){

        $parts = explode('\\', $class);
        $className = array_pop($parts);
        $file = $className.'.php';
        $path = strtolower(implode(DS, $parts));

        $filepath = $path.DS.$file;
        $filepath = trim(str_replace(DIRNAME, '', DS.$filepath),DS);

        if(file_exists($filepath)) include $filepath;
        else
        {
            throw new Erreur("Impossible d'inclure le fichier [".$filepath."] n'existe pas");
            return false;
        }
    }

}