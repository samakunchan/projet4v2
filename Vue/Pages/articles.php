<?php
session_start();
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
?>
<div class="row articles">
    <div class="col-lg-12">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <h2 class="col-lg-offset-4">
                        <?php echo $donnee->getTitre(); ?>
                </h2>

                    <?php echo $donnee->getContenu();?>

            <?php endforeach; ?>
        </ul>
    </div>
</div>