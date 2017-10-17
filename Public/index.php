<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 13:42
 */
require '../Modele/App/App.php';
require '../Modele/Entity/Articles.php';
require '../Modele/Entity/Contact.php';
require '../Modele/Manager/ManagerDonnees.php';
require '../Modele/Manager/ManagerArticles.php';
require '../Modele/Manager/ManagerContact.php';
require '../Vue/Core/Vue.php';
require '../Controlleur/Routeur/Routeur.php';
require '../Controlleur/ControlleurAccueil.php';
require '../Controlleur/ControlleurForm.php';
require '../Controlleur/ControlleurContact.php';
use Controlleur\Routeur\Routeur;

$siteWeb = new Routeur();
$siteWeb->start();



