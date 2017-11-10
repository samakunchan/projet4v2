<?php
foreach ($donnees as $donnee):
?>
    <div class="col-lg-12">
        <p class="col-lg-3 tb"> <a href="index.php?page=admin&action=tb">Tableau de bord</a></p>
        <p class="col-lg-1 deco"> <a href="index.php?page=deco" title="Déconnection"><span class="glyphicon glyphicon-log-out"></span></a></p>
    </div>
    <div class="col-lg-12"><?php echo \Controlleur\ControlleurError::messageErreur();?></div>
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