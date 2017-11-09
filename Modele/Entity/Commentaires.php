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
    private $id;
    private $auteur;
    private $contenu;
    private $date_creation;
    private $art_id;
    private $signaler;
    private $nbCom;

    /**
     * @param mixed $art_id
     * @return Commentaires
     */
    public function setArtId($art_id)
    {
        $this->art_id = $art_id;
        return $this;
    }

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
     * @param mixed $contenu
     * @return Commentaires
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getArtId()
    {
        return $this->art_id;
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
    public function getContenu()
    {
        return (string) $this->contenu;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        $date = date_create($this->date_creation);
        return date_format($date, 'd/m/Y à H:i:s');
    }

    /**
     * @return mixed
     */
    public function getSignaler()
    {
        return (int) $this->signaler;
    }

    /**
     * @param mixed $signaler
     * @return Commentaires
     */
    public function setSignaler($signaler)
    {
        $this->signaler = $signaler;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNbCom()
    {
        return $this->nbCom;
    }

}