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
use Modele\Manager\ManagerArticles;
use Modele\Entity\Articles;

$test = new ManagerArticles();
$test->readAll();
$articles = new Articles();

