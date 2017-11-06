<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:02
 */

namespace Controlleur;

use Controlleur\Routeur\Routeur;
use Modele\Entity\Articles;
use Modele\Manager\ManagerArticles;
use Vue\Core\Vue;

class ControlleurArticles
{
    private $articles;
    private $managerArt;
    private $vue;
    private $traitement;

    public function __construct()
    {
        $this->articles = new Articles();
        $this->managerArt = new ManagerArticles();
        $this->vue = new Vue('articles');
        $this->traitement = new Vue('traitement');
    }

    public function traitement($action)
    {
        if ($action==='create'){
            $this->creerArticles();
        }elseif ($action==='modif'){
            $donnees = $this->managerArt->read($_GET['id']);
            $this->majArticles($donnees);
        }elseif ($action==='delete'){
            $this->delete();
        }
    }

    public function creerArticles()
    {
        $this->traitement->genererPages();
        if ($_POST){
            if ($_POST['titre']===''){
                return false;
            }elseif( $_POST['contenu'] ===''){
                return false;
            }else{
                $this->articles->setTitre($_POST['titre']);
                $this->articles->setContenu($_POST['contenu']);
                $this->managerArt->create($this->articles);
                Routeur::redirection('admin');
            }
        }
        return true;
    }

    public function majArticles($donnees)
    {
        $this->traitement->genererPages([$donnees]);
        if ($_POST){
            if ($_POST['titre']===''){
                return false;
            }elseif( $_POST['contenu'] ===''){
                return false;
            }else{
                $this->articles->setTitre($_POST['titre']);
                $this->articles->setContenu($_POST['contenu']);
                $this->managerArt->update($this->articles);
            }
        }
        return true;
    }


    public function delete()
    {
        $this->managerArt->delete($_GET['id']);
        Routeur::redirection('admin');
    }
}