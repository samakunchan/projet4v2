<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 23:19
 */

namespace Controlleur;

use Modele\Manager\ManagerContact;
use Modele\Entity\Contact;
use Vue\Core\Vue;
class ControlleurContact
{
    private $vue;
    private $contact;
    private $manager;

    public function __construct()
    {
        $this->vue = new Vue('contact');
        $this->contact = new Contact();
        $this->manager = new ManagerContact();
    }

    public function formulaire()
    {
        $this->vue->genererPages();
        $this->gestionDonnees();
    }

    public function gestionDonnees()
    {
        if ($_POST){
            $this->contact->setNom($_POST['nom']);
            $this->contact->setEmail($_POST['email']);
            $this->contact->setTitreMessage($_POST['titre']);
            $this->contact->setContenu($_POST['message']);
            $this->manager->create($this->contact);
        }
    }

    public static function total()
    {
        $contact = new ManagerContact();
        $res = $contact->readAll();
        echo count($res);
    }
}