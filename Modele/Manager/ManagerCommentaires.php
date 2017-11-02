<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Modele\Manager;


class ManagerCommentaires
{
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO commentaires(auteur, email ,contenu,date_creation) 
        VALUES (:titre,:email,:contenu, now() )',
            [
                'titre' => $valeurs->getTitre(),
                'email' => $valeurs->getEmail(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Commentaires', true);
    }

    public function read($id)
    {
        $lecture = $this->prepare('SELECT * FROM commentaires WHERE id=?',[$id],
            'Modele\Entity\Commentaires', true, true);
        return $lecture;
    }

    public function readLastOne()
    {
        $lecture =$this->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT 1',
            'Modele\Entity\Commentaires');
        return $lecture;
    }

    public function readAll($pageActuel = false ,$articlesParPages= false)
    {
        if ($pageActuel && $articlesParPages){
            $lecture = $this->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT '.
                (($pageActuel-1)*$articlesParPages).','.$articlesParPages.' ', 'Modele\Entity\Commentaires');
            return $lecture;
        }else{
            $lecture = $this->query('SELECT * FROM commentaires ORDER BY id DESC ', 'Modele\Entity\Commentaires');
            return $lecture;
        }
    }

    public function update($valeurs)
    {
        $this->prepare('UPDATE commentaires SET titre = :titre,email= :email contenu = :contenu, 
        date_creation = now() WHERE id= :id',
            [
                'id' => $_GET['id'],
                'titre' => $valeurs->getTitre(),
                'email' => $valeurs->getEmail(),
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