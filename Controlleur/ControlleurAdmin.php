<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:06
 */

namespace Controlleur;


use Controlleur\Routeur\Routeur;
use Modele\Entity\Articles;
use Modele\Manager\ManagerArticles;
use Modele\Manager\ManagerBiographie;
use Vue\Core\Vue;
class ControlleurAdmin
{
    private $vue;
    private $manager;
    private $articles;
    private $biographie;

    public function __construct()
    {
        $this->vue = new Vue('admin');
        $this->articles =new Articles();
        $this->manager = new ManagerArticles();
        $this->biographie = new ManagerBiographie();
    }

    public function administration()
    {
        session_start();
        if ($_SESSION){
            $donnees = $this->manager->readAll();
            if (isset($_POST)){
                if ($_POST['art']==='art'){
                    $this->creerArticles();
                }elseif ($_POST['bio']==='bio'){
                    $this->gererBiographie();
                }
            }
            $this->vue->genererPages($donnees);
        }else{
            ControlleurError::accesInterdit();
        }
    }

    public function creerArticles()
    {
        $this->articles->setTitre($_POST['titre']);
        $this->articles->setTitre($_POST['contenu']);
        $this->manager->create($this->articles);
    }

    public function gererBiographie()
    {

    }
}