<?php
use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurCommentaires;
use Controlleur\ControlleurContact;
use Controlleur\BackEnd\ControlleurAuthentification;

?>
<div>
    <p class="col-lg-3 tb"> <a href="index.php?page=admin&action=tb&p=1">Tableau de bord</a></p>
    <p class="col-lg-1 deco"> <a href="index.php?page=deco" title="Déconnection"><span class="glyphicon glyphicon-log-out"></span></a></p>
</div>
<section id="sectionAdmin">
    <nav id="bord" class="row bord">
        <div class="panneau col-lg-12">
            <h2 class="col-lg-12">Résumé</h2>
            <p class="col-lg-3">Nombres d'articles créé : <?php echo ControlleurChapitres::total();?></p>
            <p class="col-lg-3 ">Signalement reçut : <?php echo ControlleurCommentaires::totalSignalement();?> </p>
        </div>
        <div class="col-lg-5 panneau">
            <h2>Biographie</h2>
            <div>
                <button>
                    <a href="index.php?page=biographie&action=edit">Voir/Editer la biographie</a>
                </button>
            </div>
        </div>
        <div class="col-lg-5 panneau">
            <h2>Profil</h2>
            <div>
                <p>Vous êtes connectés en tant que <?php echo $_SESSION['pseudo'];?></p>
                <p>Email :  <?php echo $_SESSION['email'];?></p>
                <button>
                    <a href="index.php?page=profil&action=edit">Voir/Editer le profil</a>
                </button>
            </div>
        </div>
    </nav>
    <nav id="voir" class="row">
        <hr class="col-lg-12">
        <div class="col-lg-12">
            <table class=" panel-default col-lg-12">
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
            <div class="row pagination col-lg-12">
                <p><?php echo ControlleurChapitres::precedente(); echo ControlleurChapitres::pageActuel() ;echo ControlleurChapitres::suivante();?></p>
            </div>
        </div>
        <hr class="col-lg-12">
    </nav>
    <?php if ($donnees[1]) :?>
    <nav class="row">
        <div class="col-lg-12" id="signal">
            <h2>Article signalé</h2>
            <?php if ($donnees[1]): ?>
                <?php foreach ($donnees[1] as $commentaire):; ?>
                    <div class="comment row">
                        <p class="col-lg-3">Auteur : <?php echo $commentaire->getAuteur()?></p>
                        <br>
                        <p class="col-lg-12"> <?php echo $commentaire->getContenu()?> <span>Date de publication : <?php echo $commentaire->getDateCreation()?></span></p>
                        <br>
                        <button>
                            <a href="index.php?page=articles&action=deletecom&control=com&id=admin&idcom=<?php echo $commentaire->getId();?>">Supprimer</a>
                        </button>
                        <button>
                            <a href="index.php?page=articles&action=sigcom&control=com&id=<?php echo $commentaire->getArtId()?>&idcom=<?php echo $commentaire->getId();?>&recup">Conserver</a>
                        </button>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Il n'y a pas de commentaire pour cet article...</p>
            <?php endif; ?>
        </div>
    </nav>
    <?php endif; ?>
</section>
