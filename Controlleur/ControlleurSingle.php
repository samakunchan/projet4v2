<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 03/11/2017
 * Time: 17:22
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Modele\Manager\ManagerCommentaires;
use Vue\Core\Vue;

class ControlleurSingle
{
    private $managerArt;
    private $managerCom;
    private $vue;

    public function __construct()
    {
        $this->managerArt = new ManagerArticles();
        $this->managerCom = new ManagerCommentaires();
        $this->vue = new Vue('articles');
        $this->traitement = new Vue('traitement');
    }

    public function publicationArticles()
    {
        $donnees = $this->managerArt->read($_GET['id']);
        $donneesCom = $this->managerCom->readAll($_GET['id']);
        if ($donnees){
            $this->vue->genererPages([$donnees, $donneesCom]);
        }else{
            echo '<p class="introuvable">Article introuvable</p>';
        }
    }

}