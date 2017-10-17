<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 23:47
 */

namespace Modele\Entity;


class Contact
{
    private $id;
    private $nom;
    private $email;
    private $titre_message;
    private $contenu;
    private $date_creation;

    /**
     * @return mixed
     */
    public function getId()
    {
        if (!is_int($this->id)){
            echo 'Probleme avec ID -GetId Contact';
        }
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        if(!is_string($this->nom)){
            echo 'Probleme avec Nom - GetNom Contact';
        }
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        if(!is_string($this->email)){
            echo 'Probleme avec email - GetEmail Contact';
        }
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getTitreMessage()
    {
        if(!is_string($this->titre_message)){
            echo 'Probleme avec titre_message -GetTitre_message Contact';
        }
        return $this->titre_message;
    }


    /**
     * @return mixed
     */
    public function getContenu()
    {
        if (!is_string($this->contenu)){
            echo 'Probleme avec Contenu -GetContenu Articles';
        }
        return $this->contenu;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {// faire la transformation de la date  DATE_FORMAT(date, '%d/%m/%Y %Hh%imin%ss')
        return $this->date_creation;
    }

    /**
     * @param mixed $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @param mixed $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param mixed $titre_message
     * @return Contact
     */
    public function setTitreMessage($titre_message)
    {
        $this->titre_message = $titre_message;
        return $this;
    }

    /**
     * @param mixed $contenu
     * @return Contact
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }


}