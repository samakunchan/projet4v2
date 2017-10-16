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
/*
    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            $this->$method($value);
            var_dump($method);
        }
    }
*/
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
        if (!is_int($this->id)){
            echo 'Probleme avec ID -GetId Articles';
        }
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        if(!is_string($this->titre)){
            echo 'Probleme avec titre -GetTitre Articles';
        }
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        if (!is_string($this->contenu)){
            echo 'Probleme avec ID -GetContenu Articles';
        }
        return $this->contenu;
    }

}