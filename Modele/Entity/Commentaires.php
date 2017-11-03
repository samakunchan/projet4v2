<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Modele\Entity;


class Commentaires
{
    private $auteur;
    private $email;
    private $contenu;
    private $date_creation;

    /**
     * @param mixed $auteur
     * @return Commentaires
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }

    /**
     * @param mixed $email
     * @return Commentaires
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param mixed $contenu
     * @return Commentaires
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @param mixed $date_creation
     * @return Commentaires
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return (string) $this->auteur;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return (string) $this->email;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return (string) $this->contenu;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }



}