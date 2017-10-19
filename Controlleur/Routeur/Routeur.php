<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:19
 */

namespace Controlleur\Routeur;


use Controlleur\ControlleurAccueil;
use Controlleur\ControlleurAuthentification;
use Controlleur\ControlleurBiographie;
use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurForm;
use Controlleur\ControlleurArticles;
use Controlleur\ControlleurCommentaires;
use Controlleur\ControlleurContact;
use Controlleur\ControlleurAdmin;
use Controlleur\ControlleurUtilisateur;
use Controlleur\ControlleurError;

class Routeur
{
    private $acceuil;
    private $form;
    private $biographie;
    private $chapitres;
    private $contact;
    private $articles;
    private $admin;
    private $errors;
    //private $
   // private $
   // private $

    public function __construct()
    {
        $this->acceuil = new ControlleurAccueil();
        $this->form = new ControlleurForm();
        $this->biographie= new ControlleurBiographie();
        $this->chapitres = new ControlleurChapitres();
        $this->contact = new ControlleurContact();
        $this->articles = new ControlleurArticles();
        $this->admin = new ControlleurAdmin();
        $this->errors = new ControlleurError();
    }

    public function start()
    {
        if(isset($_GET['page'])){
            $pages = $_GET['page'];
        }else{
            $pages = 'accueil';
        }
        $this->gestionPages($pages);
    }

    public function gestionPages($pages)
    {
        if($pages === 'accueil'){
        $this->acceuil->accueil();
        }elseif ($pages=== 'form'){
        $this->form->formulaire();
        }elseif ($pages=== 'biographie'){
        $this->biographie->publicationBiographie();
        }elseif ($pages=== 'chapitres'){
        $this->chapitres->listeChaptitres();
        }elseif ($pages=== 'contact'){
        $this->contact->formulaire();
        }elseif ($pages=== 'articles'){
        $this->articles->publicationArticles();
        }elseif ($pages=== 'admin'){
        $this->admin->administration();

        }else{
            echo 'Un problème est survenu lors du choix des pages - Voir Le Routeur';
        }
    }


    public static function redirection($pages)
    {
        return header('Location: index.php?page='. $pages .' ');
    }

}