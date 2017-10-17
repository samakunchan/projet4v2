<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:27
 */

namespace Controlleur;


use Vue\Core\Vue;
use Modele\Manager\ManagerArticles;

class ControlleurAccueil
{
    public function accueil()
    {
        $articles = new ManagerArticles();
        $donnees = $articles->readAll();
        $accueil = new Vue('accueil');
        $accueil->genererPages($donnees);
    }
}