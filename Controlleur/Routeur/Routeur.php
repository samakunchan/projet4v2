<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:19
 */

namespace Controlleur\Routeur;


use Controlleur\ControlleurAccueil;
use Controlleur\ControlleurBiographie;
use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurForm;
use Controlleur\ControlleurArticles;
use Controlleur\ControlleurCommentaires;
use Controlleur\ControlleurContact;
use Controlleur\BackEnd\ControlleurAuthentification;
use Controlleur\BackEnd\ControlleurAdmin;
use Controlleur\BackEnd\ControlleurUsers;
use Controlleur\BackEnd\ControlleurProfil;
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
    private $users;
    private $profil;
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
        $this->users = new ControlleurUsers();
        $this->profil = new ControlleurProfil();
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
            if (isset($_GET['action'])){
                $this->biographie->edit($_GET['action']);
            }else{
                $this->biographie->publicationBiographie();
            }
        }elseif ($pages=== 'chapitres'){
        $this->chapitres->listeChaptitres();
        }elseif ($pages=== 'contact'){
        $this->contact->formulaire();
        }elseif ($pages=== 'articles'){
            if ($_GET['action']){
                $this->articles->traitement($_GET['action']);
            }else{
                $this->articles->publicationArticles();
            }
        }elseif ($pages=== 'admin') {
            $this->admin->administration();
        }elseif ($pages=== 'users'){
            $this->users->administration();
        }elseif ($pages=== 'profil'){
            $this->profil->gestionDonnees();
        }elseif ($pages=== 'deco'){
            session_start();
            session_destroy();
            Routeur::redirection('accueil');
        }else{
            echo 'Un problème est survenu lors du choix des pages - Voir Le Routeur';
        }
    }


    public static function redirection($pages)
    {
        return header('Location: index.php?page='. $pages .' ');
    }

}