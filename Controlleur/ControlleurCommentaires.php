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
            $this->creerCommentaires();
        }elseif ($action==='modifcom'){
            $donnees = $this->managerCom->read($_GET['idcom']);
            $this->majCommentaires($donnees);
        }elseif ($action==='deletecom'){
            $this->delete($_GET['idcom']);
        }
    }

    public function creerCommentaires()
    {
        if ($_POST){
            if ($_POST['contenu']!==''){
                $this->commentaires->setAuteur($_POST['auteur']);
                $this->commentaires->setContenu($_POST['contenu']);
                $this->commentaires->setArtId($_GET['id']);
                $this->managerCom->create($this->commentaires);
                Routeur::redirection('articles&control=art&id='.$_GET['id']);
            }else{
                echo '<div>Veuillez saisir un commentaire <span><a href="index.php?page=articles&control=art&id='.$_GET['id'].'">Retour</a></span></div>';
            }
        }
    }

    public function majCommentaires($donnees)
    {
        $this->vueCom->genererPages([$donnees]);
        if ($_POST) {
            if (isset($_POST['contenu']) !== '') {
                $this->commentaires->setAuteur($_POST['auteur']);
                $this->commentaires->setContenu($_POST['contenu']);
                $this->managerCom->update($this->commentaires);
            }
        }
    }

    public function delete($id)
    {
        $this->managerCom->delete($id);
        Routeur::redirection('articles&control=art&id='.$_GET['id']);
    }

    public static function gestionCommentaire($idcom)
    {
        $manager = new ManagerMembres();
        $managerCom = new ManagerCommentaires();
        if ($_SESSION){
            $res= $manager->read($_SESSION['pseudo']);
            $rescom = $managerCom->read($idcom);
            if ($res->getPseudo()=== $rescom->getAuteur() ):
                ?>
                <p>
                    <span>
                        <a href="index.php?page=articles&action=modifcom&control=com&id=<?php echo $_GET['id']?>&idcom=<?php echo $rescom->getId();?>">Editer</a>
                    </span>
                <?php endif;?>
                    <span class="col-lg-offset-9">
                        <a href="index.php?page=articles&action=sigcomcontrol=com&id=<?php echo $_GET['id']?>&idcom=<?php echo $rescom->getId();?>">Signaler ce commentaire</a>
                    </span>
                </p>
<?php
        }
    }
}