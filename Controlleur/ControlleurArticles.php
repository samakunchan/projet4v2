<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:02
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Vue\Core\Vue;

class ControlleurArticles
{
    public function publicationArticles()
    {
        $articles = new ManagerArticles();
        $donnees = $articles->read($_GET['id']);
        $pages = new Vue('articles');
        $pages->genererPages([$donnees]);
    }
}