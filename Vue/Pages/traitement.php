<?php
session_start();
\Controlleur\ControlleurAuthentification::controlSession();
?>
<div class="row articles">
    <div class="col-lg-12">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <form method="post">
                    <input type="text" name="titre" value="<?php echo $donnee->getTitre(); ?>">
                    <textarea name="contenu" id="contenu" cols="30" rows="10">
                        <?php echo $donnee->getContenu();?>
                    </textarea>
                    <input type="submit" value="Modifier">
                </form>
            <?php endforeach; ?>
        </ul>
    </div>
</div>