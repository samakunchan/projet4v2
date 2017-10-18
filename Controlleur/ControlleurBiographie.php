<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:03
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Modele\Manager\ManagerBiographie;
use Vue\Core\Vue;
class ControlleurBiographie
{
    public function publicationBiographie()
    {
        $biographies = new ManagerBiographie();
        $donnees = $biographies->read();
        $pages = new Vue('biographie');
        $pages->genererPages($donnees);
    }
}