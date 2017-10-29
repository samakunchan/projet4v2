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
            if ($_POST['pseudo']===''){
                return false;
            }elseif ($_POST['password']===''){
                return false;
            }else{
                if ($_GET['action']=== 'connection'){
                    $this->control->login($_POST['pseudo'], $_POST['password']);
                    return $this->control;
                }elseif ($_GET['action']=== 'inscription'){
                    if ($_POST['email']===''){
                        return false;
                    }else{
                        $this->control->inscription($_POST['pseudo'], $_POST['email'], sha1($_POST['password']), sha1($_POST['passwordConf']));
                        return $this->control;
                    }
                }
            }
        }
    }
}