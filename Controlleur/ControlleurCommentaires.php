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
    private $vueCom;

    public function __construct()
    {
        $this->commentaires = new Commentaires();
        $this->managerCom = new ManagerCommentaires();
        $this->vue = new Vue('articles');
        $this->vueCom = new Vue('commentaires');
    }

    public function traitement($action)
    {
        if ($action==='createcom'){
            echo 'salut';
            $this->creerCommentaires();
        }elseif ($action==='modifcom'){
            $donnees = $this->managerCom->read($_GET['id']);
            $this->majCommentaires($donnees);
        }elseif ($action==='deletecom'){
            $this->delete($_GET['id']);
        }
    }

    public function majCommentaires($donnees)
    {
        $this->vueCom->genererPages([$donnees]);
        if ($_POST){
            $this->commentaires->setAuteur($_POST['auteur']);
            $this->commentaires->setContenu($_POST['contenu']);
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

    public function delete($id)
    {
        $this->managerCom->delete($id);
    }

    public static function gestionCommentaire($idcom, $ref)
    {
        $manager = new ManagerMembres();
        $managerCom = new ManagerCommentaires();
        if ($_SESSION){
            $res= $manager->read($_SESSION['pseudo']);
            $rescom = $managerCom->read($idcom);
            var_dump($ref);
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