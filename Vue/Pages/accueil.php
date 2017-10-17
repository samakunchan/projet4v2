<h1>Voici la Home page</h1>

<div class="row">
    <div class="col-lg-8">
        <ul>
            <?php foreach ($donnees as $donnee) : ?>
                <h2>
                    <a href="">
                        <?php echo $donnee->getTitre(); ?>
                    </a>
                </h2>
            <?php endforeach; ?>
        </ul>
    </div>

</div>