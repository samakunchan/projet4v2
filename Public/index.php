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


if(isset($_GET['page'])){
    $pages = $_GET['page'];
}else{
    $pages = 'accueil';
}

ob_start();
if($pages === 'acceuil'){
    require '../Vue/Pages/accueil.php';
}elseif ($pages=== 'single'){
    require '../Vue/Pages/single.php';
}elseif ($pages=== 'categorie'){
    require '../Vue/Pages/categories.php';
}else{
    echo 'Un problème est survenu dans le chargement de la page - Voir Index.php';
}
$contenu = ob_get_clean();
require '../Vue/Gabarit/gabarit.php';


