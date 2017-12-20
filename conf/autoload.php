<?php

namespace Drawer\Conf;

class Autoloader{

    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class){
        //Je découpe les valeurs du namespace
        $parts = explode('\\', $class);
        //Je crée le nom du fichier à l'aide de la dernière partie
        $className = array_pop($parts);
        $file = $className.'.php';
        //Création du chemin avec les bons separateurs
        $path = strtolower(implode(DS, $parts));

        $filepath = $path.DS.$file;
        $filepath = trim(str_replace(DIRNAME, '', DS.$filepath),DS);

        if(file_exists($filepath)) include $filepath;
        else
        {
            throw new Erreur("Impossible d'inclure fichier [".$filepath."] n'éxiste pas");
            return false;
        }
    }

}