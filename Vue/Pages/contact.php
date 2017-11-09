<article class="row contact">
    <form id="formContact" action="index.php?page=contact" method="post" class="col-lg-12 ">
        <label for="pseudo"> Nom</label>
        <input type="text" name="nom" id="nom">
        <label for="email"> Mail</label>
        <input type="email" name="email" id="email">
        <label for="titre"> Titre du message</label>
        <input type="text" name="titre" id="titre">
        <label for="message">Votre message</label>
        <textarea rows="10" cols="120" name="message" id="message" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> </textarea>
        <input type="submit" value="Envoyer votre message" id="envoie">
    </form>
</article>