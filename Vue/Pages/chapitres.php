<?php
session_start();
use Controlleur\BackEnd\ControlleurAuthentification;
use Controlleur\ControlleurChapitres;
ControlleurAuthentification::controlSession();
?>
<div class="row chapitres">
    <h1 class="col-lg-12">Liste de tout les chapitres</h1>
    <div class="col-lg-12 chap">
        <ol>
            <?php foreach ($donnees as $donnee) :; ?>
                <li>
                    <p>
                        <a href="index.php?page=articles&id=<?php echo $donnee->getId();?>">
                            <?php echo $donnee->getTitre();?>
                        </a>
                        <span class="col-lg-offset-1">
                            Articles créé le : <?php echo $donnee->getDateCreation()?>
                        </span>
                    </p>
                </li>
            <?php endforeach; ?>
        </ol>
        <div class="col-lg-12 pagination">
            <?php echo ControlleurChapitres::precedente(); echo ControlleurChapitres::suivante();?>
        </div>
    </div>
</div>