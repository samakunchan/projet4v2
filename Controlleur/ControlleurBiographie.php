<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:03
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Modele\Manager\ManagerBiographie;
use Vue\Core\Vue;
class ControlleurBiographie
{
    private $biographie;
    private $vue;

    public function __construct()
    {
        $this->biographie = new ManagerBiographie();
        $this->vue = new Vue('biographie');
    }

    public function publicationBiographie()
    {
        $donnees = $this->biographie->read();
        $this->vue->genererPages($donnees);
    }
}