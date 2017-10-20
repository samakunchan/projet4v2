<?php
session_start();
\Controlleur\ControlleurAuthentification::controlSession();
?>
<div class="row articles">
    <div class="col-lg-12">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <h2 class="col-lg-offset-4">
                        <?php echo $donnee->getTitre(); ?>
                </h2>
                <p>
                    <?php echo $donnee->getContenu();?>
                </p>
            <?php endforeach; ?>
        </ul>
    </div>
</div>