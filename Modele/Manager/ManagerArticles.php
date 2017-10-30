<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 18:48
 */

namespace Modele\Manager;


class ManagerArticles extends ManagerDonnees
{
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO articles(titre, contenu, date_creation) 
        VALUES (:titre,:contenu, now() )',
            [
                'titre' => $valeurs->getTitre(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Articles', true);
    }

    public function read($id)
    {
        $lecture = $this->prepare('SELECT * FROM articles WHERE id=?',[$id],
            'Modele\Entity\Articles', true, true);
        return $lecture;
    }

    public function readLastOne()
    {
        $lecture =$this->query('SELECT * FROM articles ORDER BY id DESC LIMIT 1',
            'Modele\Entity\Articles');
        return $lecture;
    }

    public function readAll($pageActuel = false ,$articlesParPages= false)
    {
        if ($pageActuel && $articlesParPages){
            $lecture = $this->query('SELECT * FROM articles ORDER BY id DESC LIMIT '.
                (($pageActuel-1)*$articlesParPages).','.$articlesParPages.' ', 'Modele\Entity\Articles');
            return $lecture;
        }else{
            $lecture = $this->query('SELECT * FROM articles ORDER BY id DESC ', 'Modele\Entity\Articles');
            return $lecture;
        }
    }

    public function update($valeurs)
    {
        $this->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, 
        date_creation = now() WHERE id= :id',
            [
                'id' => $_GET['id'],
                'titre' => $valeurs->getTitre(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Articles', true);
    }

    public function delete($id)
    {
        $this->prepare('DELETE FROM articles WHERE id = :id',
            [
                'id' => $id
            ],
            'Modele\Entity\Articles', true);
    }

    public function getTotal()
    {
        $donnees = $this->query('SELECT COUNT(*) as nbArt FROM articles','Modele\Entity\Articles');
        return $donnees;
    }
}