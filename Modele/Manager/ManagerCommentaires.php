<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Modele\Manager;


class ManagerCommentaires extends ManagerDonnees
{
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO commentaires(auteur ,contenu, art_id, date_creation) 
        VALUES (:auteur,:contenu,:art_id, now() )',
            [
                'auteur' => $valeurs->getAuteur(),
                'contenu' => $valeurs->getContenu(),
                'art_id'=> $valeurs->getArtId()
            ],
            'Modele\Entity\Commentaires', true);
    }

    public function readRefArticle($id)
    {
        $lecture = $this->prepare('SELECT * FROM commentaires WHERE art_id=?',[$id],
            'Modele\Entity\Commentaires', true, true);
        return $lecture;
    }

    public function read($id)
    {
        $lecture = $this->prepare('SELECT * FROM commentaires WHERE id=?',[$id],
            'Modele\Entity\Commentaires', true, true);
        return $lecture;
    }

    public function readAll($id)
    {
        $lecture = $this->prepare('SELECT * FROM commentaires WHERE art_id=?',[$id],
            'Modele\Entity\Commentaires', false, true);
        return $lecture;
    }

    public function update($valeurs)
    {
        $this->prepare('UPDATE commentaires SET auteur = :auteur,contenu = :contenu, 
        date_creation = now() WHERE id= :id',
            [
                'id' => $_GET['idcom'],
                'auteur' => $valeurs->getAuteur(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Commentaires', true);
    }

    public function delete($id)
    {
        $this->prepare('DELETE FROM commentaires WHERE id = :id',
            [
                'id' => $id
            ],
            'Modele\Entity\Commentaires', true);
    }

    public function getTotal()
    {
        $donnees = $this->query('SELECT COUNT(*) as nbArt FROM articles','Modele\Entity\Commentaires');
        return $donnees;
    }
}