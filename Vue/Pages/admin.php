<?php
\Controlleur\ControlleurAuthentification::controlSession()
?>
<section id="sectionAdmin">
    <nav id="bord" class="row bord">
        <h2 class="col-lg-12">Résumé</h2>
        <p class="col-lg-3">Nombres d'articles créé : <?php \Controlleur\ControlleurChapitres::total()?></p>
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
                <a href="index.php?page=profil&action=edit">Voir/Editer le profil</a>
            </div>
        </div>
        <div class="col-lg-12">

            <div class="panel-body">

            </div>

            <table class=" panel-default">
                <tr class="panel">
                    <td>
                        <h3 class="col-lg-offset-5">Liste des articles</h3>
                    </td>
                    <td colspan="2">
                        <a href="index.php?page=articles&action=create" class="col-lg-offset-2">Créer un article</a>
                    </td>
                </tr>
            <?php foreach ($donnees as $donnee) :; ?>

                <tr >
                    <td class="col-lg-10">
                        <a href="index.php?page=articles&action&id=<?php echo $donnee->getId();?>">
                            <?php echo substr($donnee->getTitre(), 0, 150).'...';?>
                        </a>
                    </td>
                    <td>
                        <span>
                            <a href="index.php?page=articles&action=modif&id=<?php echo $donnee->getId()?>">Modifier</a>
                        </span>
                    </td>
                    <td>
                        <span>
                            <a href="index.php?page=articles&action=delete&id=<?php echo $donnee->getId()?>">Supprimer</a>
                        </span>
                    </td>
                </tr>

            <?php endforeach; ?>
            </table>
        </div>
    </nav>
</section>
