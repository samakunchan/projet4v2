<?php
\Controlleur\ControlleurAuthentification::controlSession()
?>

<div class="row bord">
    <p class="col-lg-3">Nombres d'articles créé : <?php \Controlleur\ControlleurChapitres::total()?></p>
    <p class="col-lg-3">Signalement reçut : </p>
    <p class="col-lg-3">Message reçut : <?php \Controlleur\ControlleurContact::total() ?> </p>

</div>

<div class="row">
    <h2 class="col-lg-12">Voir les articles</h2>
    <ul>
        <?php foreach ($donnees as $donnee) :; ?>
            <li>
                <p>
                    <a href="index.php?page=articles&id=<?php echo $donnee->getId();?>">
                        <?php echo $donnee->getTitre();?>
                    </a>
                    <a href="">--Modifier</a>
                    <a href="index.php?page=admin&action=delete&id=<?php echo $donnee->getId()?>">--Supprimer</a>
                </p>

            </li>

        <?php endforeach; ?>
    </ul>
</div>

<div class="row editArt">
    <h2 class="col-lg-12">Ecrire un article</h2>
    <form method="post" class=" col-lg-offset-2 col-lg-10">
        <label for="titre" class="col-lg-6">Titre</label>
        <input type="text" name="titre" id="titre">
        <label for="contenu" class="col-lg-6">Contenu</label>
        <textarea name="contenu" id="contenu" cols="115" rows="10"></textarea>
        <input type="hidden" name="art" value="art">
        <input type="submit" value="Publier">
    </form>
</div>

<div class="row editArt">
    <h2 class="col-lg-12">Modifier un article</h2>
    <form method="post" class=" col-lg-offset-2 col-lg-10">
        <label for="titre" class="col-lg-6">Titre</label>
        <input type="text" name="titre" id="titre">
        <label for="contenu" class="col-lg-6">Contenu</label>
        <textarea name="contenu" id="contenu" cols="115" rows="10"></textarea>
        <input type="hidden" name="art" value="art">
        <input type="submit" value="Modifier">
    </form>
</div>

<div class="row editBio">
    <h2 class="col-lg-12">Editer la biographie</h2>
    <form method="post" class=" col-lg-offset-2 col-lg-10">
        <label for="titre" class="col-lg-6">Titre</label>
        <input type="text" name="titre" id="titre">
        <label for="contenu" class="col-lg-6">Contenu</label>
        <textarea name="contenu" id="contenu" cols="115" rows="10"></textarea>
        <input type="hidden" name="bio" value="bio">
        <input type="submit" value="Publier">
    </form>
</div>