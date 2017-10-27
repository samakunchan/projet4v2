<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 19/10/2017
 * Time: 14:48
 */

namespace Controlleur;


class ControlleurError
{
    public static function accesInterdit()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Accès Interdit');
    }

    public static function pageIntrouvable()
    {
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

    public static function identifiantIncorrect()
    {
        echo '<div class="alert alert-danger">'. 'Identifiant incorrect' .'</div>';
    }

    public function donneesMAJ()
    {
        //pour plus tard
    }
}