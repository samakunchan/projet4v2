<?php
session_start();
\Controlleur\BackEnd\ControlleurAuthentification::controlSession(true);
?>
<div class="row accueil">
    <div class="col-lg-8">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <h1>
                    <?php echo $donnee->getTitre(); ?>
                </h1>
                <p>
                    <?php echo $donnee->getExtrait();?>
                    <a href="index.php?page=articles&action&id= <?php echo $donnee->getId(); ?>">Voir la suite</a>
                </p>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
