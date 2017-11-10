<?php
use Controlleur\ControlleurCommentaires;
use Controlleur\BackEnd\ControlleurAuthentification;
ControlleurAuthentification::controlSession();

?>
<div class="row articles">
    <div class="col-lg-12 texte">
        <h2 class="col-lg-offset-4">
            <?php echo $donnees[0]->getTitre(); ?> <span>Publié le : <?php echo $donnees[0]->getDateCreation()?></span>
        </h2>
            <?php echo $donnees[0]->getContenu();?>
    </div>
</div>
<hr>
<div class="row commentaires ">
    <div class="col-lg-12">
    <?php if ($donnees[1]): ?>
        <?php foreach ($donnees[1] as $commentaire):;?>
            <div class="comment row">
                <p class="col-lg-12">Auteur : <?php echo $commentaire->getAuteur()?></p>

                <p class="col-lg-12"> <?php echo $commentaire->getContenu()?> <span>Date de publication : <?php echo $commentaire->getDateCreation()?></span></p>

                <p>
                    <?php
                    ControlleurCommentaires::gestionCommentaire($commentaire->getId());
                    ControlleurCommentaires::boutonSignale($commentaire->getId(),$commentaire->getSignaler());
                    ?>
                </p>

            </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p class="nope">Il n'y a pas de commentaire pour cet article...</p>
    <?php endif; ?>
        <hr>
    </div>

<hr>
<?php if ($_SESSION): ?>
    <form action="index.php?page=articles&action=createcom&control=com&id=<?php echo $donnees[0]->getId() ?>" method="post">
        <p>
            <span id="auteur"> Auteur : <?php echo $_SESSION['pseudo'] ?></span>
        </p>
        <label for="contenu"></label>
        <textarea type="text" name="contenu" id="contenu"></textarea>
        <input type="hidden" name="auteur" value="<?php echo $_SESSION['pseudo'] ?>">
        <input type="hidden" name="art_id" value="<?php echo $_GET['id'] ?>">
        <input type="submit" value="Publier">
    </form>
<?php endif; ?>
</div>
