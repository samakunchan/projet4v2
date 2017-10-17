<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:27
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Vue\Core\Vue;

class ControlleurAccueil
{
    public function accueil()
    {
        $articles = new ManagerArticles();
        $donnees = $articles->readLastOne();
        $accueil = new Vue('accueil');
        $accueil->genererPages($donnees);
    }
}