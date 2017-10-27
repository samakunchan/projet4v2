<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 27/10/2017
 * Time: 03:32
 */

namespace Controlleur\BackEnd;


use Modele\Entity\Membres;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;

class ControlleurProfil
{
    private $vue;
    private $manager;
    private $membres;

    public function __construct()
    {
        $this->vue = new Vue('profil');
        $this->manager = new ManagerMembres();
        $this->membres = new Membres();
    }

    public function gestionDonnees()
    {
        session_start();
        $donnees = $this->manager->read($_SESSION['pseudo']);
        $this->vue->genererPages([$donnees]);
        if ($_POST){
            $this->membres->setPseudo($_POST['pseudo']);
            $this->membres->setEmail($_POST['email']);
            if (sha1($_POST['password'])===sha1($_POST['passwordConf'])){
                $this->membres->setPassword(sha1($_POST['password']));
            }else{
                echo 'Les mots de passe doivent etre identique';
                return false;
            }
            if ($_POST['pseudo']!=='' && $_POST['email']!=='' && $_POST['password']!=='' && $_POST['passwordConf']!==''){
                $this->manager->update($this->membres);
            }else{
                echo 'Tout les champs doivent etre remplis';
            }

        }
    }
}