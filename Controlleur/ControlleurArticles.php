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
use Modele\Entity\Commentaires;
use Modele\Manager\ManagerArticles;
use Vue\Core\Vue;

class ControlleurArticles
{
    private $articles;
    private $commentaires;
    private $manager;
    private $vue;
    private $traitement;

    public function __construct()
    {
        $this->articles = new Articles();
        $this->commentaires = new Commentaires();
        $this->manager = new ManagerArticles();
        $this->vue = new Vue('articles');
        $this->traitement = new Vue('traitement');
    }

    public function publicationArticles()
    {
        $donnees = $this->manager->read($_GET['id']);
        $this->vue->genererPages([$donnees, $this->manager]);
    }

    public function traitement($action)
    {
        if ($action==='create'){
            $this->creerArticles();
        }elseif ($action==='modif'){
            $donnees = $this->manager->read($_GET['id']);
            $this->majArticles($donnees);
        }elseif ($action==='delete'){
            $this->delete();
        }
    }

    public function majArticles($donnees)
    {
        $this->traitement->genererPages([$donnees]);
        if ($_POST){
            $this->articles->setTitre($_POST['titre']);
            $this->articles->setContenu($_POST['contenu']);
            $this->manager->update($this->articles);
        }
    }
    public function creerArticles()
    {
        $this->traitement->genererPages();
        if ($_POST){
            $this->articles->setTitre($_POST['titre']);
            $this->articles->setContenu($_POST['contenu']);
            $this->manager->create($this->articles);
            Routeur::redirection('admin');
        }
    }

    public function delete()
    {
        $this->manager->delete($_GET['id']);
        Routeur::redirection('admin');
    }
}