<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:06
 */

namespace Controlleur;

use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;
class ControlleurAdmin
{
    public function administration()
    {
        if(empty($_POST) && !isset($_POST)){
            header('Location : index.php');
        }else{

            $admin = new ManagerMembres();
            //$donnees = $admin->
            $pages = new Vue('admin');
            $pages->genererPages();
        }
    }
}