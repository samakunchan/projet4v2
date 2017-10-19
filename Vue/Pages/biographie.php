<?php
session_start();
\Controlleur\ControlleurAuthentification::controlSession();
?>
<div class="row biographie">
    <h1>Il était une fois..Jean ForteRoche</h1>
    <div class="col-lg-12">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <h1>
                    <?php echo $donnee->getTitre(); ?>
                </h1>
                <p>
                    <?php echo $donnee->getExtrait();?>
                    <a href="index.php?page=articles&id= <?php echo $donnee->getId(); ?>">Voir la suite</a>
                </p>
            <?php endforeach; ?>
        </ul>
    </div>
</div>