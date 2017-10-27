<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 26/10/2017
 * Time: 18:40
 */

namespace Controlleur\BackEnd;


use Vue\Core\Vue;
use Controlleur\ControlleurCommentaires;
class ControlleurUsers
{
    private $vue;
    private $commentaires;

    public function __construct()
    {
        $this->vue = new Vue('users');
        $this->commentaires = new ControlleurCommentaires();
    }

    public function administration()
    {
        $this->vue->genererPages();
    }
}