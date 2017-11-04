<?php
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
use Controlleur\ControlleurChapitres;
?>
<div class="col-lg-12"><?php echo \Controlleur\ControlleurError::messageErreur();?></div>
<section id="sectionAdmin">
    <nav id="bord" class="row bord">
        <h2 class="col-lg-12">Résumé</h2>
        <p class="col-lg-3">Nombres d'articles créé : <?php echo ControlleurChapitres::total()?></p>
        <p class="col-lg-3">Signalement reçut : </p>
        <p class="col-lg-3">Message reçut : <?php \Controlleur\ControlleurContact::total() ?> </p>
    </nav>
    <nav id="voir" class="row">
        <div class="col-lg-5">
            <h2>Biographie</h2>
            <div>
                <a href="index.php?page=biographie&action=edit">Voir/Editer la biographie</a>
            </div>
        </div>
        <div class="col-lg-5">
            <h2>Profil</h2>
            <div>
                <p>Vous êtes connectés en tant que <?php echo $_SESSION['pseudo'];?></p>
                <p>Email :  <?php echo $_SESSION['email'];?></p>
                <a href="index.php?page=profil&action=edit">Voir/Editer le profil</a>
            </div>
        </div>
        <div class="col-lg-12">

            <table class=" panel-default">
                <?php
                for ($j=1; $j<=ControlleurChapitres::nombreArticlesParPages(); $j++){
                    echo '<span> <a href="index.php?page=admin&action&p='.$j.'">Page'. $j .'</a> </span>';
                } ?>
                <tr class="panel">
                    <td>
                        <h3 class="col-lg-offset-5">Liste des articles</h3>
                    </td>
                    <td colspan="2">
                        <a href="index.php?page=articles&action=create&control=art" class="col-lg-offset-2">Créer un article</a>
                    </td>
                </tr>
            <?php foreach ($donnees as $donnee) :; ?>

                <tr >
                    <td class="col-lg-10">
                        <a href="index.php?page=articles&control=art&id=<?php echo $donnee->getId();?>">
                            <?php echo substr($donnee->getTitre(), 0, 150).'...';?>
                        </a>
                    </td>
                    <td>
                        <span>
                            <a href="index.php?page=articles&control=art&action=modif&id=<?php echo $donnee->getId()?>">Modifier</a>
                        </span>
                    </td>
                    <td>
                        <span>
                            <a href="index.php?page=articles&control=art&action=delete&id=<?php echo $donnee->getId()?>">Supprimer</a>
                        </span>
                    </td>
                </tr>

            <?php endforeach; ?>
            </table>
        </div>
    </nav>
</section>
