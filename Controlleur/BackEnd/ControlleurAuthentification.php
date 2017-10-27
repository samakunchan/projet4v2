<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 19/10/2017
 * Time: 11:23
 */

namespace Controlleur\BackEnd;

use Controlleur\Routeur\Routeur;
use Modele\App\App;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;
class ControlleurAuthentification
{
    private $membres;

    public function __construct()
    {
        $this->membres = new ManagerMembres();
    }

    public function login($pseudo, $password)
    {
        $users = $this->membres->read($pseudo);
        if($users){
            if ($users->getPassword()=== sha1($password)){
                session_start();
                $_SESSION['pseudo']= $users->getPseudo();
                if($users->getPseudo()=== 'admin'){
                    Routeur::redirection('admin&action');
                }elseif ($users->getPseudo()!== 'admin'){
                    Routeur::redirection('users&action');
                }
                return true;
            }else{
                ControlleurError::identifiantIncorrect();
                return false;
            }
        }
    }

    public static function controlSession($acceuil = false)
    {
        if ($_SESSION){
            if($_SESSION['pseudo']==='admin'){
                echo '<p class="col-lg-8"> <a href="index.php?page=admin&action">Tableau de bord</a></p>';
                echo '<p class="col-lg-2"> <a href="index.php?page=deco">Déconnection</a></p>';
            }elseif ($_SESSION['pseudo']!=='admin'){
                echo '<p class="col-lg-8"> <a href="index.php?page=users&action">Tableau de bord</a></p>';
                echo '<p class="col-lg-2"> <a href="index.php?page=deco">Déconnection</a></p>';
            }
        }elseif ($acceuil){
            echo '<p><a href="index.php?page=form">S\'inscrire/Se connecter</a></p>';
        }
    }
}