<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 19/10/2017
 * Time: 11:23
 */

namespace Controlleur;

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
                Routeur::redirection('admin');
                return true;
            }else{
                ControlleurError::identifiantIncorrect();
                return false;
            }
        }
    }

    public static function controlSession()
    {
        if ($_SESSION){
            if($_SESSION['pseudo']==='admin'){
                echo '<button class="col-lg-6"> Blog</button>';
                echo '<button class="col-lg-6"> Tableau de bord</button>';
            }
        }
    }
}