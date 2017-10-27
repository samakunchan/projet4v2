<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 20:53
 */

namespace Controlleur;

use Controlleur\Routeur\Routeur;
use Modele\App\App;
use Vue\Core\Vue;
use Controlleur\BackEnd\ControlleurAuthentification;

class ControlleurForm
{
    private $control;
    private $vue;

    public function __construct()
    {
        $this->control = new ControlleurAuthentification();
        $this->vue = new Vue('form');
    }

    public function formulaire()
    {
        $this->controlDesDonnees();
        $this->vue->genererPages();

    }

    public function controlDesDonnees()
    {
        if ($_POST){
            $this->control->login($_POST['pseudo'], $_POST['password']);
        }
    }
}