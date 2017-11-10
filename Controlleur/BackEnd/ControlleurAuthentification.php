<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 19/10/2017
 * Time: 11:23
 */

namespace Controlleur\BackEnd;

use Controlleur\ControlleurError;
use Controlleur\Routeur\Routeur;
use Modele\App\App;
use Modele\Entity\Membres;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;
class ControlleurAuthentification
{
    private $membres;
    private $manager;

    public function __construct()
    {
        $this->manager = new ManagerMembres();
        $this->membres = new Membres();
    }

    public function login($pseudo, $password)
    {
        $users = $this->manager->read($pseudo);
        if($users){
            if ($users->getPassword()=== sha1($password)){
                session_start();
                $_SESSION['pseudo']= $users->getPseudo();
                $_SESSION['email']= $users->getEmail();
                if($users->getPseudo()=== 'admin'){
                    Routeur::redirection('admin&action=tb&id='.$users->getId());
                }elseif ($users->getPseudo()!== 'admin'){
                    Routeur::redirection('users');
                }
                return true;
            }else{
                ControlleurError::identifiantIncorrect();
                return false;
            }
        }
    }

    public function inscription($pseudo, $email, $password, $passwordConf)
    {
        $newbie = $this->manager->read($pseudo);
        if ($newbie){
            Routeur::redirection('form');
            return false;
        }else{
            $this->membres->setPseudo($pseudo);
            $this->membres->setEmail($email);
            if ($password === $passwordConf){
                $this->membres->setPassword($password);
            }else{
                return false;//echo 'Les mots de passe doivent etre identiques';
            }
            $this->manager->create($this->membres);
        }
    }

    public static function controlSession($acceuil = false)
    {
        if (isset($_GET['page'])){
            if ($_GET['page']!=='admin' && $_GET['page']!=='profil'){
                session_start();
                if ($_SESSION){
                    if($_SESSION['pseudo']==='admin'){
                        echo '<p class="col-lg-3 tb"> <a href="index.php?page=admin&action=tb">Tableau de bord</a></p>';
                        echo '<p class="col-lg-1 deco"> <a href="index.php?page=deco" title="Déconnection"><span class="glyphicon glyphicon-log-out"></span></a></p>';
                    }elseif ($_SESSION['pseudo']!=='admin'){
                        echo '<p class="col-lg-3 tb"> <a href="index.php?page=users&action=tb">Tableau de bord</a></p>';
                        echo '<p class="col-lg-1 deco"> <a href="index.php?page=deco" title="Déconnection"><span class="glyphicon glyphicon-log-out"></span></a></p>';
                    }
                }elseif (!$_SESSION){
                    echo '<p class="col-lg-4 tb"><a href="index.php?page=form">S\'inscrire/Se connecter</a></p>';
                }
            }
            }

    }
}