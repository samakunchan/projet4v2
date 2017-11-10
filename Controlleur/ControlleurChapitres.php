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
/**
 * Class ControlleurArticles utilisé pour la création de la page d'article
 */
class ControlleurChapitres
{
    private $chapitres;
    private $vue;

    /**
     * Constructeur pour instancier les outils CRUD
     */
    public function __construct()
    {
        $this->chapitres = new ManagerArticles();
        $this->vue = new Vue('chapitres');
    }

    /**
     * Appeler par :  Routeur
     * Méthode qui liste tout les chapitres dans un tableau, génère une pagination 8x8
     * Tableau inséré dans la page vue chapitre
     */
    public function listeChaptitres()
    {
        if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<= self::nombreArticlesParPages()){
            $pageActuel = $_GET['p'];
        }else{
            $pageActuel= 1;
        }
        $donnees = $this->chapitres->readAll($pageActuel, self::articlesParPages());
        $this->vue->genererPages($donnees);
    }

    /**
     * Méthode static pour avoir dynamiquement le nombre total des chapitres
    */
    public static function total()
    {
        $donnees = new ManagerArticles();
        $res = $donnees->getTotal();

        return $res[0]->getNbArt();
    }

    /**
     * Méthode static pour avoir dynamiquement le nombre d'articles par page
     */
    public static function articlesParPages($nb= 8)
    {
        return $nb;
    }

    /**
     * Méthode static pour avoir dynamiquement le nombre total de page sur 8 qu'il faudrait pour tout les articles
     */
    public static function nombreArticlesParPages()
    {
        return ceil(self::total()/self::articlesParPages());
    }

    /**
     * Méthode static pour avoir dynamiquement le bouton "suivant" en fonction des circonstances
     */
    public static function suivante()
    {
        if (isset($_GET['p'])){
            if ($_GET['p']<self::nombreArticlesParPages()){
                $p = $_GET['p']+1;
                return '<span class="col-lg-offset-2 col-lg-3 btn-primary"><a href="index.php?page=chapitres&p='.$p.'"> Suivante</a></span>';
            }
        }
        return null;
    }

    /**
     * Méthode static pour avoir dynamiquement le bouton "précédente" en fonction des circonstances
     */
    public static function precedente()
    {
        if (isset($_GET['p'])){
            if ($_GET['p']<=1){
                $p = 1;
                return '<span class="col-lg-3 btn-primary"><a href="index.php?page=chapitres&p='.$p.'">Précédente </a></span>';
            }elseif ($_GET['p']<=self::nombreArticlesParPages()){
                $p = $_GET['p']-1;
                return '<span class="col-lg-3 btn-primary"><a href="index.php?page=chapitres&p='.$p.'"> Précédente</a></span>';
            }
        }
        return true;
    }

    /**
     * Méthode static pour avoir dynamiquement une vue la page actuel/nombre de page total
     * Situer en "suivant et "précédente
     */
    public static function pageActuel()
    {
        if (isset($_GET['p'])){
            if ($_GET['p']>self::nombreArticlesParPages()){
                return '<span class=" col-lg-offset-2 col-lg-8 btn-primary pageActuel">Cette page n\'existe pas </span>';
            }
            return '<span class=" col-lg-offset-2 col-lg-2 btn-primary pageActuel">'.$_GET['p'].'/'.self::nombreArticlesParPages().' </span>';
        }
        return true;
    }

}