<?php
session_start();
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
//var_dump($donnees[0]);
?>
<div class="row articles">
    <div class="col-lg-12">
        <h2 class="col-lg-offset-4">
            <?php echo $donnees[0]->getTitre(); ?> <span>Publié le : <?php echo $donnees[0]->getDateCreation()?></span>
        </h2>
            <?php echo $donnees[0]->getContenu();?>
    </div>
</div>
<hr>
<div class="row commentaires">
    <div class="col-lg-12">
    <?php if ($donnees[1]): ?>
        <?php foreach ($donnees[1] as $commentaire):;?>
            <p>Nom : <?php echo $commentaire->getAuteur()?></p>
            <br>
            <p>Contenu : <?php echo $commentaire->getContenu()?> <span>Date de publication : <?php echo $commentaire->getDateCreation()?></span></p>
            <br>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Il n'y a pas de commentaire pour cet article...</p>
    <?php endif; ?>
    </div>
</div>