<?php
session_start();
\Controlleur\ControlleurAuthentification::controlSession();
?>

<p class="col-lg-12">Bienvenu <?php echo $_SESSION['pseudo'];?></p>
