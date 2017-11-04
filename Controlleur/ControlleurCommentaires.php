<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Controlleur;


use Modele\Entity\Commentaires;
use Controlleur\Routeur\Routeur;
use Modele\Manager\ManagerCommentaires;
use Vue\Core\Vue;
class ControlleurCommentaires
{
    private $commentaires;
    private $managerCom;
    private $vue;
    private $traitement;

    public function __construct()
    {
        $this->commentaires = new Commentaires();
        $this->managerCom = new ManagerCommentaires();
        $this->vue = new Vue('articles');
        $this->traitement = new Vue('traitement');
    }

    public function traitement($action)
    {
        var_dump($action);
        //var_dump($this->creerCommentaires());
        //var_dump($_POST);
        if ($action==='createcom'){
            echo 'salut';
            $this->creerCommentaires();
        }elseif ($action==='modifcom'){
            $donnees = $this->managerCom->read($_GET['id']);
            $this->majCommentaires($donnees);
        }elseif ($action==='deletecom'){
            $this->delete();
        }
    }

    public function majCommentaires($donnees)
    {
        $this->traitement->genererPages([$donnees]);
        if ($_POST){
            var_dump($_POST);
            $this->commentaires->setAuteur($_POST['auteur']);
            $this->commentaires->setContenu($_POST['contenu']);

            $this->managerCom->update($this->commentaires);
        }
    }
    public function creerCommentaires()
    {
        var_dump($_POST);
        //$this->traitement->genererPages();
        if ($_POST){
            $this->commentaires->setAuteur($_POST['auteur']);
            $this->commentaires->setContenu($_POST['contenu']);
            $this->commentaires->setArtId($_GET['id']);
            $this->managerCom->create($this->commentaires);
            Routeur::redirection('articles&control=art&id='.$_GET['id']);
        }
    }

    public function delete()
    {
        $this->managerCom->delete($_GET['id']);
        Routeur::redirection('admin');
    }
}