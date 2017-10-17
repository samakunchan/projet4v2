<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 20:53
 */

namespace Controlleur;

use Vue\Core\Vue;
use Modele\Manager\ManagerArticles;
class ControlleurForm
{
    public function formulaire()
    {
        $accueil = new Vue('form');
        $accueil->genererPages();
    }
}