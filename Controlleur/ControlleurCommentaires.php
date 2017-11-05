<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Controlleur;


use Modele\Entity\Commentaires;
use Controlleur\Routeur\Routeur;
use Modele\Manager\ManagerCommentaires;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;
class ControlleurCommentaires
{
    private $commentaires;
    private $managerCom;
    private $vue;
    private $traitement;

    public function __construct()
    {
        $this->commentaires = new Commentaires();
        $this->managerCom = new ManagerCommentaires();
        $this->vue = new Vue('articles');
        $this->traitement = new Vue('traitement');
    }

    public function traitement($action)
    {
        if ($action==='createcom'){
            echo 'salut';
            $this->creerCommentaires();
        }elseif ($action==='modifcom'){
            $donnees = $this->managerCom->readRefArticle($_GET['id']);
            $this->majCommentaires($donnees);
        }elseif ($action==='deletecom'){
            $this->delete();
        }
    }

    public function majCommentaires($donnees)
    {
        //$this->traitement->genererPages([$donnees]);
        if ($_POST){
            var_dump($_POST);
            $this->commentaires->setAuteur($_POST['auteur']);
            $this->commentaires->setContenu($_POST['contenu']);
            $this->commentaires->setArtId($_GET['id']);
            $this->managerCom->update($this->commentaires);
        }
    }
    public function creerCommentaires()
    {
        if ($_POST){
            $this->commentaires->setAuteur($_POST['auteur']);
            $this->commentaires->setContenu($_POST['contenu']);
            $this->commentaires->setArtId($_GET['id']);
            $this->managerCom->create($this->commentaires);
            Routeur::redirection('articles&control=art&id='.$_GET['id']);
        }
    }

    public function delete()
    {
        $this->managerCom->delete($_GET['id']);
        Routeur::redirection('admin');
    }

    public static function gestionCommentaire($idcom, $idart)
    {
        $manager = new ManagerMembres();
        $managerCom = new ManagerCommentaires();
        if ($_SESSION){
            $res= $manager->read($_SESSION['pseudo']);
            $rescom = $managerCom->read($idcom);
            $donnees = $managerCom->readRefArticle($idart);
            if ($res->getPseudo()=== $rescom->getAuteur() ):
                ?>
                <p>
                    <span>
                        <a href="index.php?page=articles&action=modifcom&control=com&id=<?php echo $rescom->getId();?>">Modifier</a>
                    </span>
            -
                    <span>
                        <a href="index.php?page=articles&action=deletecom&control=com&id=<?php echo $rescom->getId();?>">Supprimer</a>
                    </span>
            -
                    <span>
                        <a href="index.php?page=articles&action=sigcomcontrol=com&&id=<?php echo $rescom->getId();?>">Signaler ce commentaire</a>
                    </span>
                </p>
                <?php endif;
        }
    }
}