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
        if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<self::nombreArticlesParPages()){
            $pageActuel = $_GET['p'];
        }else{
            $pageActuel= 1;
        }
        $donnees = $this->chapitres->readAll($pageActuel, self::articlesParPages());
        $this->vue->genererPages($donnees);
    }

    public static function total()
    {
        $donnees = new ManagerArticles();
        $res = $donnees->getTotal();
        if ($_GET['page']==='admin'){
            echo $res[0]->getNbArt();
        }
        return $res[0]->getNbArt();
    }

    public static function articlesParPages($nb= 5)
    {
        return $nb;
    }

    public static function nombreArticlesParPages()
    {
        return ceil(self::total()/self::articlesParPages());
    }

}