<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:27
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;

class ControlleurAccueil
{
    private $articles;

    public function __construct()
    {
        $this->articles = new ManagerArticles();
    }

    public function accueil()
    {
        $donnees = $this->articles->readLastOne();
        $pages = new Vue('accueil');
        $pages->genererPages($donnees);
    }
}