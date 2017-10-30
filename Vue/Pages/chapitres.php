<?php
session_start();
use Controlleur\BackEnd\ControlleurAuthentification;
use Controlleur\ControlleurChapitres;
ControlleurAuthentification::controlSession();
?>
<div class="row chapitres">
    <h1>Liste de tout les chapitres</h1>
    <div class="col-lg-12">
        <ol>
            <?php foreach ($donnees as $donnee) :; ?>
                <li>
                    <p>
                        <a href="index.php?page=articles&action&id=<?php echo $donnee->getId();?>">
                            <?php echo $donnee->getTitre();?>
                        </a>
                        <span class="col-lg-offset-1">
                            Articles créé le : <?php echo $donnee->getDateCreation()?>
                        </span>
                    </p>
                </li>
            <?php endforeach; ?>
        </ol>
        <?php
        for ($i=1; $i<=ControlleurChapitres::nombreArticlesParPages(); $i++){
            echo '<span> <a href="index.php?page=chapitres&p='.$i.'">Page'. $i .'</a> </span>';
        } ?>
    </div>
</div>