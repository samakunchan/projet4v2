<?php
session_start();
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
foreach ($donnees as $donnee): ?>
<div class="col-lg-12"><?php echo \Controlleur\ControlleurError::messageErreur();?></div>
<div class="row articles">
    <div class="col-lg-12">
        <p>
            <span>
                <a href="index.php?page=articles&action=deletecom&control=com&id=<?php echo $_GET['id'];?>&idcom=<?php echo $donnee->getId();?>">Supprimer</a>
            </span>
        </p>
        <form method="post">
            <p>Auteur du commentaire : <span><?php echo $donnee->getAuteur();?></span></p>
            <label for="contenu">Contenu</label>
            <textarea name="contenu" id="contenu" cols="30" rows="10"><?php echo $donnee->getContenu();?></textarea>
            <input type="hidden" name="auteur" value="<?php echo $donnee->getAuteur(); ?>">
            <input type="submit" value="Modifier">
        </form>
    </div>
</div>
<?php endforeach; ?>