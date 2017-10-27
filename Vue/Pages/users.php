<?php
session_start();
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
?>

<p class="col-lg-12">Bienvenu <?php echo $_SESSION['pseudo'];?></p>
<div class="col-lg-5">
    <h2>Profil</h2>
    <div>
        <p>Vous êtes connectés en tant que <?php echo $_SESSION['pseudo'];?></p>
        <p>Email :  <?php echo $_SESSION['email'];?></p>
        <a href="index.php?page=profil&action=edit">Voir/Editer le profil</a>
    </div>
</div>
