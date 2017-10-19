<?php session_start();  ?>
<aside class="row">
    <nav class="col-lg-offset-4 col-lg-8">
        <button id="connection" class="col-lg-2">Connection</button>

        <button id="inscription" class="col-lg-2">Inscription</button>
    </nav>
</aside>
<article class="row connect">
    <p>Déja membre? Connectez-vous pour avoir accès à votre espace.</p>
    <p>Vous êtes nouveau sur le site? Cliquez sur "Inscription" pour créer votre espace membre.</p>
    <form id="formConnection"  method="post" class="col-lg-offset-3 col-lg-6">
        <label for="pseudo"> Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
        <label for="password"> Mot de passe</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Etablir la connection" id="pseudo">
    </form>

    <form id="formInscription" action="../Public/index.php?page=admin&action=souscription" method="post" class="col-lg-offset-3 col-lg-6 col-lg-offset-3">
        <label for="pseudo"> Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
        <label for="email"> Mail</label>
        <input type="email" name="email" id="email">
        <label for="password"> Mot de passe</label>
        <input type="password" name="password" id="password">
        <label for="passwordConf">Confirmer le mot de passe</label>
        <input type="password" id="passwordConf" name="passwordConf">
        <input type="submit" value="S'inscrire" id="pseudo">
    </form>
</article>
