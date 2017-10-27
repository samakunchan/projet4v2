<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 27/10/2017
 * Time: 03:32
 */

namespace Controlleur\BackEnd;


use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;

class ControlleurProfil
{
    private $vue;
    private $manager;

    public function __construct()
    {
        $this->vue = new Vue('profil');
        $this->manager = new ManagerMembres();
    }

    public function gestionDonnees()
    {
        session_start();
        $donnees = $this->manager->read($_SESSION['pseudo']);
        var_dump($donnees);
        $this->vue->genererPages([$donnees]);
    }
}