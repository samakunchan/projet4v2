<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:03
 */

namespace Controlleur;

use Controlleur\Routeur\Routeur;
use Modele\Manager\ManagerBiographie;
use Modele\Entity\Biographie;
use Vue\Core\Vue;
class ControlleurBiographie
{
    private $biographie;
    private $manager;
    private $vue;
    private $traitement;

    public function __construct()
    {
        $this->biographie = new Biographie();
        $this->manager = new ManagerBiographie();
        $this->vue = new Vue('biographie');
        $this->traitement = new Vue('traitement');
    }

    public function publicationBiographie()
    {
        $donnees = $this->manager->read();
        $this->vue->genererPages($donnees);
    }

    public function edit($action)
    {
        if ($action==='edit'){
            $donnees = $this->manager->read();
            $this->majBio($donnees);
        }elseif ($action==='delete'){
            $this->delete();
        }
    }

    public function majBio($donnees)
    {
        $this->traitement->genererPages($donnees);
        if ($_POST){
            $this->biographie->setTitre($_POST['titre']);
            $this->biographie->setContenu($_POST['contenu']);
            $this->manager->update($this->biographie);
        }
    }
    public function creerBio()
    {
        $this->traitement->genererPages();
        if ($_POST){
            $this->biographie->setTitre($_POST['titre']);
            $this->biographie->setContenu($_POST['contenu']);
            $this->manager->create($this->biographie);
            Routeur::redirection('admin');
        }
    }

    public function delete()
    {
        $this->manager->delete();
        Routeur::redirection('admin');
    }
}