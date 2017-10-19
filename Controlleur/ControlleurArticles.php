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
    private $articles;
    private $vue;

    public function __construct()
    {
        $this->articles = new ManagerArticles();
        $this->vue = new Vue('articles');
    }

    public function publicationArticles()
    {
        $donnees = $this->articles->read($_GET['id']);
        $this->vue->genererPages([$donnees]);
    }
}