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
        $this->prepare('INSERT INTO articles(titre, contenu, date_creation) 
        VALUES (:titre,:contenu, now() )',
            ['titre'=> $valeurs->getTitre(), 'contenu'=> $valeurs->getContenu()],
            'Modele\Entity\Articles', true);
    }

    public function read($id)
    {
        $this->prepare('SELECT * FROM articles WHERE id=?',[$id],
            'Modele\Entity\Articles', true, true);
    }

    public function readAll()
    {
        $this->query('SELECT * FROM articles', 'Modele\Entity\Articles');
    }

    public function update($valeurs)
    {
        $this->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, 
        date_creation = now() WHERE id= :id',
            [
                'titre'=> $valeurs->getTitre(),
                'contenu'=> $valeurs->getContenu(),
                'id'=>$_GET['id']
            ],
            'Modele\Entity\Articles', true);
    }

    public function delete()
    {
        $this->prepare('DELETE FROM articles WHERE id = :id',
            [
                'id'=>$_GET['id']
            ],
            'Modele\Entity\Articles', true);
    }
}