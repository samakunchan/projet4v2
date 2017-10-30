<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 18:54
 */

namespace Modele\Entity;


class Articles
{
    private $id;
    private $titre;
    private $contenu;
    private $date_creation;
    private $extrait;
    private $com_id;
    private $nbArt;


    /**
     * @param mixed $titre
     * @return Articles
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
     * @return Articles
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
            echo 'Probleme avec titre -GetTitre Articles';
        }
        return (string) htmlspecialchars($this->titre);
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        if (!is_string($this->contenu)){
            echo 'Probleme avec contenu -GetContenu Articles';
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

    /**
     * @return mixed
     */
    public function getNbArt()
    {
        return (int) $this->nbArt;
    }



}