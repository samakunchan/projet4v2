<?php if ($_SESSION){
    $log = '<span class="log">'.ucfirst($_SESSION['pseudo']).'</span>';
}else{
    $log = '<a href="index.php?page=form">Connection/Inscription</a>';
} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta
            charset="utf-8">
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta
            name="description"
            content="">
    <meta
            name="author"
            content="">
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <link
            rel="stylesheet"
            href="src/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link
            rel="stylesheet"
            href="src/style.css">
    <script
            src="src/js/formulaire/outils.js">

    </script>
    <title>Blog de Jean Forte-Roche</title>
</head>

<body>

<header class="navbar navbar-inverse ">
    <div class="navbar-header navbar-nav col-lg-12">
        <div class="col-xs-4 col-sm-5 col-md-5 col-lg-6"><a href="index.php?page=accueil">Blog de Jean Forte-Roche</a></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1 "><a href="index.php?page=accueil">Accueil</a> </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="index.php?page=biographie"> Biographie</a></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="index.php?page=chapitres&p=1"> Chapitres</a></div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $log; ?></div>
    </div>
</header>

<div class="container">

    <div class="starter-template">
        <?php echo $contenu;?>
    </div>

</div>

<script type="text/javascript" src='src/js/tinymce/tinymce.min.js'></script>
<script type="text/javascript" src="src/js/global.js"></script>

</body>
</html>
