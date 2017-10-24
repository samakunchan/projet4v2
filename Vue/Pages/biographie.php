<?php
session_start();
\Controlleur\ControlleurAuthentification::controlSession();
?>
<div class="row biographie">
    <div class="col-lg-12">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <h1>
                    <?php echo $donnee->getTitre(); ?>
                </h1>
                <p>
                    <?php echo $donnee->getContenu();?>
                </p>
            <?php endforeach; ?>
        </ul>
    </div>
</div>