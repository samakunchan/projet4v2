<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:06
 */

namespace Controlleur;


use Controlleur\Routeur\Routeur;
use Vue\Core\Vue;
class ControlleurAdmin
{
    private $vue;

    public function __construct()
    {
        $this->vue = new Vue('admin');
    }

    public function administration()
    {
        session_start();
        if ($_SESSION){
            $this->vue->genererPages();
        }else{
            ControlleurError::accesInterdit();
        }
    }
}