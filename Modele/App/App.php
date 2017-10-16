<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 17:07
 */

namespace Modele\App;

use PDO;
class App
{
    private $pdo;

    public function connection()
    {
        if($this->pdo === null){
            $bdd = new PDO('mysql:host=localhost;dbname=JFR', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->pdo = $bdd;
        }
        return $this->pdo;
    }

}