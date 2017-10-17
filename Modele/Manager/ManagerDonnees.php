<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 17:24
 */

namespace Modele\Manager;

use Modele\App\App;
use PDO;


class ManagerDonnees extends App
{
    public function query($phraseSql, $nomClass)
    {
        $rep = $this->connection()->query($phraseSql);
        $donnees = $rep->fetchAll(PDO::FETCH_CLASS, $nomClass);
        return $donnees;
    }

    public function prepare($phraseSql, $selectionDeId, $nomClass, $one = false, $read = false)
    {
        if($read){
            $req = $this->connection()->prepare($phraseSql);
            $req->execute($selectionDeId);
            $req->setFetchMode(PDO::FETCH_CLASS, $nomClass);
            if ($one){
                $donnees= $req->fetch();
            }else{
                $donnees = $req->fetchAll();
            }
            return $donnees;
        }else{
            $req = $this->connection()->prepare($phraseSql);
            $req->setFetchMode(PDO::FETCH_CLASS, $nomClass);
            $req->execute($selectionDeId);
        }

    }
}