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
                    Routeur::redirection('admin&action&id='.$users->getId());
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

    public function inscription($pseudo, $email, $password, $passwordConf)
    {
        if(empty($pseudo) && empty($password) && empty($email) ){
            Routeur::redirection('form');
            var_dump(empty($pseudo));
            return false;
        }else{
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
                    echo 'Les mots de passe doivent etre identiques';
                    return false;
                }
                $this->manager->create($this->membres);
                return $this->manager;
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