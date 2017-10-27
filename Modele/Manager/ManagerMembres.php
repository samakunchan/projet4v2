<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Modele\Manager;


class ManagerMembres extends ManagerDonnees
{
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO membres(pseudo, password, email, date_inscription) 
        VALUES ( :pseudo, :password, :email, now() )',
            [
                'pseudo' => $valeurs->getPseudo(),
                'password' => $valeurs->getPassword(),
                'email' => $valeurs->getEmail()
            ],
            'Modele\Entity\Membres', true);
    }

    public function read($pseudo)
    {
        $lecture = $this->prepare('SELECT * FROM membres WHERE pseudo=?',[$pseudo],
            'Modele\Entity\Membres', true, true);
        return $lecture;
    }

    public function readLastOne()
    {
        $lecture =$this->query('SELECT * FROM membres ORDER BY id DESC LIMIT 1',
            'Modele\Entity\Membres');
        return $lecture;
    }

    public function readAll()
    {
        $lecture = $this->query('SELECT * FROM membres ORDER BY id DESC', 'Modele\Entity\Membres');
        return $lecture;
    }

    public function update($valeurs)
    {
        $this->prepare('UPDATE membres SET pseudo = :pseudo, password = :password, email = :email, 
        date_inscription = now() WHERE pseudo= :pseudo',
            [
                'pseudo' => $valeurs->getPseudo(),
                'password' => $valeurs->getPassword(),
                'email' => $valeurs->getEmail(),
                //'id' => $_GET['id'] // a voir si je le fait avec Id ou pseudo
            ],
            'Modele\Entity\Membres', true);
    }

    public function delete()
    {
        $this->prepare('DELETE FROM membres WHERE id = :id',
            [
                'id' => $_GET['id']
            ],
            'Modele\Entity\Membres', true);
    }
}