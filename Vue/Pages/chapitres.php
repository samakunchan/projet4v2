<?php
session_start();
\Controlleur\ControlleurAuthentification::controlSession();
?>
<div class="row chapitres">
    <h1>Liste de tout les chapitres</h1>
    <div class="col-lg-12">
        <ul>
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
        </ul>
    </div>
</div>