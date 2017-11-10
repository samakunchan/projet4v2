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
/**
 * Class ControlleurForm utilisé pour la création de la page de connection et d'inscription
 */
class ControlleurForm
{
    private $control;
    private $vue;

    /**
     * Constructeur pour instancier les outils CRUD
     */
    public function __construct()
    {
        $this->control = new ControlleurAuthentification();
        $this->vue = new Vue('form');
    }

    /**
     * Appeler par :  Routeur
     * Méthode qui génère la page formulaire
     */
    public function formulaire()
    {
        $this->controlDesDonnees();
        session_start();
        session_destroy();
        $this->vue->genererPages();
    }
    /**
     * Méthode qui reçoit les données quand le formulaire est utilisé
     */
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