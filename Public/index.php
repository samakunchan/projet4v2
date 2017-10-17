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
use Vue\Core\Vue;

if(isset($_GET['page'])){
    $pages = $_GET['page'];
}else{
    $pages = 'accueil';
}
$test = new Vue('accueil');
$test->genererPages();

/*
ob_start();
if($pages === 'acceuil'){
    require '../Vue/Pages/accueil.php';
}elseif ($pages=== 'articles'){
    require '../Vue/Pages/articles.php';
}else{
    echo 'Un problème est survenu losr du choix des pages - Voir Index.php';
}
$contenu = ob_get_clean();
require '../Vue/Gabarit/gabarit.php';*/


