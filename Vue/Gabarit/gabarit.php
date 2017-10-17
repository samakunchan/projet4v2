<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="src/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="src/style.css">
    <title>JFR2</title>
</head>

<body>

<header class="navbar navbar-inverse ">
    <div class="navbar-header navbar-nav col-lg-12">
        <div class="col-xs-4 col-sm-5 col-md-5 col-lg-6"><a href="index.php">Blog de Jean Forte-Roche</a></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1 "><a href="index.php">Accueil</a> </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="#articles"> Biographie</a></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="index.php?id=chap"> Chapitres</a></div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="index.php?id=deco">Contact</a></div>
    </div>
</header>

<div class="container" style="padding-top: 100px;">

    <div class="starter-template">
        <?php echo $contenu;?>
    </div>

</div>
</body>
</html>
