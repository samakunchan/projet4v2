<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:03
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Vue\Core\Vue;
class ControlleurChapitres
{
    public function listeChaptitres()
    {
        $chapitres = new ManagerArticles();
        $donnees = $chapitres->readAll();
        $pages = new Vue('chapitres');
        $pages->genererPages($donnees);
    }
}