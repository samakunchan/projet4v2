<?php
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
//var_dump($donnees);
?>
<div class="row">
    <p class="col-lg-5 bienvenu">Bienvenu <?php echo $_SESSION['pseudo'];?></p>
</div>
<div class="col-lg-5 user">
    <h2>Profil</h2>
    <div>
        <p>Vous êtes connectés en tant que <?php echo $_SESSION['pseudo'];?></p>
        <p>Email :  <?php echo $_SESSION['email'];?></p>
        <button>
            <a href="index.php?page=profil&action=edit">Voir/Editer le profil</a>
        </button>
    </div>
</div>
<div class="col-lg-5 regle">
    <h2>Règle du site</h2>
    <div>
        <p>Bonjour, merci de votre inscription. Veuillez respectés les points ci-dessous. Cordialement</p>
        <p>
            <ol>
            <li>Ne poster pas de propos incitent à la discrimination fondée sur la race, le sexe,
                la religion, à la haine, à la violence, au racisme ou au révisionnisme </li>
            <li>En toute occasion restez poli, courtois et respectueux, cela commence par
                savoir dire « bonjour » ou « bonsoir » et « merci ».</li>
            <li>Afin d'être compréhensible, abstenez vous d'écrire en langage SMS ou d'utiliser
                des abréviations.</li>
            <li>les majuscules sont FAITES POUR CRIER, alors ne criez pas, svp ! :-)</li>
            <li>Abstenez-vous de mettre des commentaires liés à un intérêt manifestement commercial</li>
        </ol>
        </p>
    </div>
</div>
