<?php
session_start();
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
var_dump($_POST);
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
            <div class="comment">
                <p>Auteur : <?php echo $commentaire->getAuteur()?></p>
                <br>
                <p> <?php echo $commentaire->getContenu()?> <span>Date de publication : <?php echo $commentaire->getDateCreation()?></span></p>
                <br>
                <?php \Controlleur\ControlleurCommentaires::gestionCommentaire($commentaire->getId()); ?>
            </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Il n'y a pas de commentaire pour cet article...</p>
    <?php endif; ?>
    </div>
</div>
<hr>
<?php if ($_SESSION): ?>
    <form action="index.php?page=articles&action=createcom&control=com&id=<?php echo $donnees[0]->getId() ?>" method="post">
        <p>
            <span id="auteur"> Auteur : <?php echo $_SESSION['pseudo'] ?></span>
        </p>
        <label for="contenu">Contenu</label>
        <textarea type="text" name="contenu" id="contenu"></textarea>
        <input type="hidden" name="auteur" value="<?php echo $_SESSION['pseudo'] ?>">
        <input type="hidden" name="art_id" value="<?php echo $_GET['id'] ?>">
        <input type="submit" value="Publier">
    </form>
<?php endif; ?>
