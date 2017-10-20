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
    private $chapitres;
    private $vue;

    public function __construct()
    {
        $this->chapitres = new ManagerArticles();
        $this->vue = new Vue('chapitres');
    }

    public function listeChaptitres()
    {
        $donnees = $this->chapitres->readAll();
        $this->vue->genererPages($donnees);
    }

    public static function total()
    {
        $donnees = new ManagerArticles();
        $res = $donnees->readAll();
        echo count($res);
    }
}