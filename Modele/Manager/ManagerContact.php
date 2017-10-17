<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 18:48
 */

namespace Modele\Manager;

class ManagerContact extends ManagerDonnees
{
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO contact (nom, email, titre_message, contenu, date_creation) 
        VALUES (:nom, :email, :titre_message, :contenu, now() )',
            [
                'nom' => $valeurs->getNom(),
                'email' => $valeurs->getEmail(),
                'titre_message' => $valeurs->getTitre(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Contact', true);
    }

    public function read($id)//DATE_FORMAT(date, '%d/%m/%Y %Hh%imin%ss')
    {
        $lecture = $this->prepare('SELECT * FROM contact WHERE id=?',[$id],
            'Modele\Entity\Contact', true, true);
        return $lecture;
    }

    public function readAll()
    {
        $lecture = $this->query('SELECT * FROM contact ', 'Modele\Entity\Contact');
        return $lecture;
    }

    public function update($valeurs)
    {
        $this->prepare('UPDATE contact SET titre = :titre, contenu = :contenu, 
        date_creation = now() WHERE id= :id',
            [
                'titre' => $valeurs->getTitre(),
                'contenu' => $valeurs->getContenu(),
                'id' => $_GET['id']
            ],
            'Modele\Entity\Contact', true);
    }

    public function delete()
    {
        $this->prepare('DELETE FROM contact WHERE id = :id',
            [
                'id' => $_GET['id']
            ],
            'Modele\Entity\Contact', true);
    }
}