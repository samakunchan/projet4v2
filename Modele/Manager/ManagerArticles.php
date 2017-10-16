<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 18:48
 */

namespace Modele\Manager;

use Modele\Entity\Articles;
class ManagerArticles extends ManagerDonnees
{
    public function create(Articles $valeurs)
    {
        var_dump($valeurs->getTitre());
        $res = $this->prepare('
INSERT INTO articles(titre, contenu, date_creation) 
VALUES (?,?, now() )',
            [$valeurs->getTitre()], 'Modele\Entity\Articles' );

    }

    public function read($id)
    {
        $res = $this->prepare('SELECT * FROM articles WHERE id=?',[$id],
            'Modele\Entity\Articles', true);
        var_dump($res);
    }

    public function readAll()
    {
        $res = $this->query('SELECT * FROM articles', 'Modele\Entity\Articles');
        var_dump($res);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}