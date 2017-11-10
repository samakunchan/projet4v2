<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 17:07
 */

namespace Autoloading;


/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    public static function autoload($class){
        require '../'.$class.'.php';
    }

}