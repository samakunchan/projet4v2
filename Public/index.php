<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 13:42
 */
require '../Modele/App/App.php';
require '../Modele/Entity/Articles.php';
require '../Modele/Manager/ManagerDonnees.php';
require '../Modele/Manager/ManagerArticles.php';
require '../Vue/Core/Vue.php';
require '../Controlleur/Routeur/Routeur.php';
require '../Controlleur/ControlleurAccueil.php';
require '../Controlleur/ControlleurForm.php';
use Controlleur\Routeur\Routeur;
use Modele\Manager\ManagerArticles;

$siteWeb = new Routeur();
$siteWeb->start();

/*
$articles = new ManagerArticles();
$donnees = $articles->readAll();
var_dump($donnees);


/*
$bdd = new PDO('mysql:host=localhost;dbname=JFR', 'root', '');
var_dump($bdd);
$req = $bdd->query('SELECT * FROM articles');
$donnes = $req->fetchAll();
var_dump($donnes);*/


