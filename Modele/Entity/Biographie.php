<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 23/10/2017
 * Time: 20:42
 */

namespace Modele\Entity;


class Biographie
{
    private $id;
    private $titre;
    private $contenu;
    private $date_creation;
    private $extrait;
    private $com_id;


    /**
     * @param mixed $titre
     * @return Biographie
     */
    public function setTitre($titre)
    {
        if(!isset($titre)){
            echo 'Le titre n\'est pas définie';
        }
        $this->titre = $titre;
        return $this;
    }

    /**
     * @param mixed $contenu
     * @return Biographie
     */
    public function setContenu($contenu)
    {
        if (!isset($contenu)){
            echo 'Le contenu n\'est pas définie';
        }
        $this->contenu = $contenu;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        if(!is_string($this->titre)){
            echo 'Probleme avec titre -GetTitre Biographie';
        }
        return (string) htmlspecialchars($this->titre);
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        if (!is_string($this->contenu)){
            echo 'Probleme avec contenu -GetContenu Biographie';
        }
        return $this->contenu;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @return mixed
     */
    public function getExtrait()
    {
        $this->extrait = substr($this->contenu, 0,150);
        return $this->extrait.'...';
    }
}