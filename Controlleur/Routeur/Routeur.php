<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:19
 */

namespace Controlleur\Routeur;


use Controlleur\ControlleurAccueil;
use Controlleur\ControlleurForm;

class Routeur
{
    public function start()
    {
        if(isset($_GET['page'])){
            $pages = $_GET['page'];
        }else{
            $pages = 'accueil';
        }
        $this->gestionPages($pages);
    }

    public function gestionPages($pages)
    {
        if($pages === 'accueil'){
        $site = new ControlleurAccueil();
        $site->accueil();
        }elseif ($pages=== 'form'){
        $site = new ControlleurForm();
        $site->formulaire();
        }else{
            echo 'Un problème est survenu losr du choix des pages - Voir Index.php';
        }
    }
}