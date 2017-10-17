<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 20:53
 */

namespace Controlleur;

use Vue\Core\Vue;

class ControlleurForm
{
    public function formulaire()
    {
        $formulaire = new Vue('form');
        $formulaire->genererPages();
    }
}