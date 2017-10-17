<p>
    <a href="index.php?page=form">S'inscrire/Se connecter</a>
</p>

<div class="row">
    <div class="col-lg-8">
        <ul>
            <?php foreach ($donnees as $donnee) : ?>
                <h1>
                    <a href="">
                        <?php echo $donnee->getTitre(); ?>
                    </a>
                </h1>
                <p><?php echo $donnee->getContenu();?> </p>
            <?php endforeach; ?>
        </ul>
    </div>
</div>