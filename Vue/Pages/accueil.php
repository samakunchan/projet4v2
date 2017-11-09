<?php
\Controlleur\BackEnd\ControlleurAuthentification::controlSession(true);
?>
<div class="row accueil">
    <div class="col-lg-8 extrait">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <h1>
                    <?php echo $donnee->getTitre(); ?>
                </h1>
                <p class="col-lg-12 ">
                    <?php echo $donnee->getExtrait();?>
                    <a href="index.php?page=articles&id= <?php echo $donnee->getId(); ?>">Voir la suite</a>
                </p>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
