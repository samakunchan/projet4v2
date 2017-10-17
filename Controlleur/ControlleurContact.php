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
    public function formulaire()
    {
        $formulaire = new Vue('contact');
        $formulaire->genererPages();
        $this->gestionDonnees();
    }

    public function gestionDonnees()
    {
        if ($_POST){
            $contact = new Contact();
            $contact->setNom($_POST['nom']);
            $contact->setEmail($_POST['email']);
            $contact->setTitreMessage($_POST['titre']);
            $contact->setContenu($_POST['message']);
            $manager = new ManagerContact();
            $manager->create($contact);
        }
    }
}