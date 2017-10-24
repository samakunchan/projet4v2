<?php
\Controlleur\ControlleurAuthentification::controlSession()
?>
<section id="sectionAdmin">
    <nav id="bord" class="row bord">
        <h2 class="col-lg-12">Résumé</h2>
        <p class="col-lg-3">Nombres d'articles créé : <?php \Controlleur\ControlleurChapitres::total()?></p>
        <p class="col-lg-3">Signalement reçut : </p>
        <p class="col-lg-3">Message reçut : <?php \Controlleur\ControlleurContact::total() ?> </p>
    </nav>
    <nav id="voir" class="row">
        <div class="col-lg-5">
            <h2>Liste des articles</h2>
            <div><a href="index.php?page=articles&action=create">Créé un article</a></div>
            <ol >
                <?php foreach ($donnees as $donnee) :; ?>
                    <li>
                        <p>
                            <a href="index.php?page=articles&action&id=<?php echo $donnee->getId();?>">
                                <?php echo $donnee->getTitre();?>
                            </a>
                            <span><a href="index.php?page=articles&action=modif&id=<?php echo $donnee->getId()?>">Modifier</a></span>
                            <span><a href="index.php?page=articles&action=delete&id=<?php echo $donnee->getId()?>">Supprimer</a></span>
                        </p>

                    </li>

                <?php endforeach; ?>
            </ol>
        </div>
        <div class="col-lg-5">
            <h2>Le blog possède une biographie</h2>
            <div>
                <a href="index.php?page=biographie&action=edit">Voir/Editer la biographie</a>
            </div>
        </div>
    </nav>
</section>
