<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 20:26
 */

namespace Controlleur;

use Modele\Entity\Membres;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;
class ControlleurUtilisateur
{
    public function gestionUtilisateur()
    {
        if(empty($_POST) && !isset($_POST)){
            header('Location : index.php');
        }else{
            if ($_GET['action'] === 'souscription'){
                 $this->souscription($_POST['pseudo'], $_POST['email'], sha1($_POST['password']), sha1($_POST['passwordConf']));
            }elseif ($_GET['action'] === 'connection'){
                 $this->connection($_POST['pseudo'], sha1($_POST['password']));
            }else{
                header('Location : index.php');
            }
        }
    }

    public function souscription($pseudo, $email, $pass, $passConf)
    {
        $utilisateur = new Membres();
        $utilisateur->setPseudo($pseudo);
        $utilisateur->setEmail($email);
        if ($pass === $passConf){
            $utilisateur->setPassword($pass);
        }
        $admin = new ManagerMembres();
        $admin->create($utilisateur);
        session_start();
        $_SESSION['pseudo'] = $utilisateur->getPseudo();
        $pages = new Vue('admin');
        $pages->genererPages();
    }

    public function connection($pseudo, $password)
    {
        $user = new ManagerMembres();
        $donnees = $user->read($pseudo);
        if($donnees->getPseudo()=== $pseudo && $donnees->getPassword()=== $password){
            session_start();
            $_SESSION['pseudo'] = $donnees->getPseudo();
            $pages = new Vue('admin');
            $pages->genererPages();
        }
    }
}