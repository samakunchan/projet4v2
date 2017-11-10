<?php
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurCommentaires;
use Controlleur\ControlleurContact;

?>
<div class="col-lg-12"><?php echo \Controlleur\ControlleurError::messageErreur();?></div>
<section id="sectionAdmin">
    <nav id="bord" class="row bord">
        <h2 class="col-lg-12">Résumé</h2>
        <p class="col-lg-3">Nombres d'articles créé : <?php echo ControlleurChapitres::total();?></p>
        <p class="col-lg-3">Signalement reçut : <?php echo ControlleurCommentaires::totalSignalement();?> </p>
        <p class="col-lg-3">Message reçut : <?php ControlleurContact::total(); ?> </p>
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
        <hr class="col-lg-12">
        <div class="col-lg-12">

            <table class=" panel-default col-lg-12">
                <?php
                for ($j=1; $j<=ControlleurChapitres::nombreArticlesParPages(); $j++){
                    echo '<span> <a href="index.php?page=admin&action&p='.$j.'">Page'. $j .'</a> </span>';
                } ?>
                <tr class="panel">
                    <td class="col-lg-10">
                        <h3 class="col-lg-offset-5">Liste des articles</h3>
                    </td>
                    <td colspan="2" class="col-lg-2">
                        <a href="index.php?page=articles&action=create&control=art" class="col-lg-offset-2">Créer un article</a>
                    </td>
                </tr>
            <?php if (!$donnees[0]): ?>
                <tr>
                    <td colspan="2">
                        Il n'y a pas d'articles
                    </td>
                </tr>
            <?php else :
            foreach ($donnees[0] as $donnee) :; ?>

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

            <?php endforeach; endif; ?>
            </table>
        </div>
        <hr class="col-lg-12">
    </nav>
    <?php if ($donnees[1]) :?>
    <nav class="row">
        <div class="col-lg-12" id="signal">
            <h2>Article signaler</h2>
            <?php if ($donnees[1]): ?>
                <?php foreach ($donnees[1] as $commentaire):;?>
                    <div class="comment row">
                        <p class="col-lg-3">Auteur : <?php echo $commentaire->getAuteur()?></p>
                        <br>
                        <p class="col-lg-12"> <?php echo $commentaire->getContenu()?> <span>Date de publication : <?php echo $commentaire->getDateCreation()?></span></p>
                        <br>
                        <p>
                            <a href="index.php?page=articles&action=deletecom&control=com&id=admin&idcom=<?php echo $commentaire->getId();?>">Supprimer</a>
                            <?php ControlleurCommentaires::boutonSignale($commentaire->getId(),$commentaire->getSignaler());?>
                        </p>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Il n'y a pas de commentaire pour cet article...</p>
            <?php endif; ?>
        </div>
    </nav>
    <?php endif; ?>
</section>
