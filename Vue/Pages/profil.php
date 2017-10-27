<?php
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
foreach ($donnees as $donnee):
?>

<section class="row">
    <h2 class="col-lg-12">Modifier votre profil</h2>
    <form method="post">
        <label for="pseudo">Pseudo</label>
        <input id="pseudo" name="pseudo" type="text" value="<?php echo $donnee->getPseudo(); ?>">
        <label for="email">Modifier votre adresse email</label>
        <input id="email" type="email" name="email" value="<?php echo $donnee->getEmail();?>">
        <label for="password">Entrer votre nouveau mot de passe</label>
        <input id="password" type="password" name="password" >
        <label for="passwordConf">Confirmer votre nouveau mot de passe</label>
        <input id="passwordConf" type="password" name="passwordConf" >
        <input type="submit" value="Modifier">
    </form>
</section>
<?php endforeach;?>