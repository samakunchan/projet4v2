<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 13:42
 */


require '../Vue/Core/Vue.php';
require '../Modele/App/App.php';

require '../Modele/Entity/Articles.php';
require '../Modele/Entity/Contact.php';
require '../Modele/Entity/Commentaires.php';
require '../Modele/Entity/Membres.php';

require '../Modele/Manager/ManagerDonnees.php';
require '../Modele/Manager/ManagerArticles.php';
require '../Modele/Manager/ManagerContact.php';
require '../Modele/Manager/ManagerMembres.php';
require '../Modele/Manager/ManagerCommentaires.php';
require '../Modele/Manager/ManagerBiographie.php';

require '../Controlleur/ControlleurAccueil.php';
require '../Controlleur/ControlleurUtilisateur.php';
require '../Controlleur/ControlleurArticles.php';
require '../Controlleur/ControlleurBiographie.php';
require '../Controlleur/ControlleurChapitres.php';
require '../Controlleur/ControlleurCommentaires.php';
require '../Controlleur/ControlleurContact.php';
require '../Controlleur/ControlleurForm.php';
require '../Controlleur/Routeur/Routeur.php';

use Controlleur\Routeur\Routeur;

$siteWeb = new Routeur();
$siteWeb->start();



