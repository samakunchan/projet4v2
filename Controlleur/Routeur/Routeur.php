<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:19
 */

namespace Controlleur\Routeur;


use Controlleur\ControlleurAccueil;
use Controlleur\ControlleurBiographie;
use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurForm;
use Controlleur\ControlleurArticles;
use Controlleur\ControlleurCommentaires;
use Controlleur\ControlleurContact;
use Controlleur\ControlleurAdmin;
use Controlleur\ControlleurUtilisateur;

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
        }elseif ($pages=== 'biographie'){
        $site = new ControlleurBiographie();
        $site->publicationBiographie();
        }elseif ($pages=== 'chapitres'){
        $site = new ControlleurChapitres();
        $site->listeChaptitres();
        }elseif ($pages=== 'contact'){
        $site = new ControlleurContact();
        $site->formulaire();
        }elseif ($pages=== 'articles'){
        $site = new ControlleurArticles();
        $site->publicationArticles();
        }elseif ($pages=== 'admin'){
        $site = new ControlleurUtilisateur();
        $site->gestionUtilisateur();
        }else{
            echo 'Un problème est survenu lors du choix des pages - Voir Index.php';
        }
    }
}