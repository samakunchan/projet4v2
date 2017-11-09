<?php
use Controlleur\BackEnd\ControlleurAuthentification;
use Controlleur\ControlleurChapitres;
ControlleurAuthentification::controlSession();
?>
<div class="row chapitres">
    <h1 class="col-lg-12">Liste de tout les chapitres</h1>
    <div class="col-lg-12 chap">

        <table class=" panel-default col-lg-12">
            <tr class="panel">
                <td class="col-lg-8 tdart">
                    <h3>
                        Articles
                    </h3>
                </td>
                <td class="col-lg-4 tdcreate">
                    <h3>
                        Date de création
                    </h3>
                </td>
            </tr>
            <?php foreach ($donnees as $donnee) :; ?>
            <tr class="panel" >
                <td class="col-lg-8">
                    <p>
                        <a href="index.php?page=articles&id=<?php echo $donnee->getId();?>">
                            <?php echo $donnee->getTitre();?>
                        </a>
                    </p>
                </td>
                <td class="col-lg-4">
                    <p>
                        <span class="">
                             <?php echo $donnee->getDateCreation()?>
                        </span>
                    </p>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="row pagination">
            <table class="col-lg-12">
                <tr >
                    <td class="col-lg-1 btn-primary">
                        <?php echo ControlleurChapitres::precedente(); ?>
                    </td>
                    <td class="col-lg-1 btn-primary ">
                        <?php  echo ControlleurChapitres::suivante();?>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>