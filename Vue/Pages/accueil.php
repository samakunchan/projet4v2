<p>
    <a href="index.php?page=form">S'inscrire/Se connecter</a>
</p>

<div class="row">
    <div class="col-lg-8">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <h2>
                    <?php echo $donnee->getTitre(); ?>
                </h2>
                <p>
                    <?php echo $donnee->getExtrait();?>
                    <a href="index.php?page=articles&id= <?php echo $donnee->getId(); ?>">Voir la suite</a>
                </p>
            <?php endforeach; ?>
        </ul>
    </div>
</div>