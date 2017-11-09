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
    private static $managerCom;
    private $vue;
    private $vueCom;
    private static $membres;

    public function __construct()
    {
        $this->commentaires = new Commentaires();
        self::$managerCom = new ManagerCommentaires();
        $this->vue = new Vue('articles');
        $this->vueCom = new Vue('commentaires');
        self::$membres = new ManagerMembres();
    }

    public function traitement($action)
    {
        if ($action==='createcom'){
            $this->creerCommentaires($_POST['auteur'], $_POST['contenu'], $_GET['id']);
        }elseif ($action==='modifcom'){
            $donnees = self::$managerCom->read($_GET['idcom']);
            $this->vueCom->genererPages([$donnees]);
            if ($_POST) {
                if (isset($_POST['contenu']) !== '') {
                    $this->majCommentaires($_POST['auteur'], $_POST['contenu'], 0);
                }
                return true;
            }
        }elseif ($action==='deletecom'){
            $this->delete($_GET['idcom']);
        }elseif ($action==='sigcom'){
            $this->signalement();
        }
    }

    public function creerCommentaires($auteur, $contenu, $id)
    {
        if ($_POST){
            if ($_POST['contenu']!==''){
                $this->commentaires->setAuteur($auteur);
                $this->commentaires->setContenu($contenu);
                $this->commentaires->setArtId($id);
                $this->commentaires->setSignaler(0);
                var_dump($this->commentaires);
                self::$managerCom->create($this->commentaires);
                Routeur::redirection('articles&control=art&id='.$_GET['id']);
            }else{
                echo '<div>Veuillez saisir un commentaire <span><a href="index.php?page=articles&control=art&id='.$_GET['id'].'">Retour</a></span></div>';
            }
        }
    }

    public function majCommentaires($auteur, $contenu, $signal)
    {
        $this->commentaires->setAuteur($auteur);
        $this->commentaires->setContenu($contenu);
        $this->commentaires->setSignaler($signal);
        self::$managerCom->update($this->commentaires);
    }

    public function delete($id)
    {
        self::$managerCom->delete($id);
        Routeur::redirection('articles&control=art&id='.$_GET['id']);
        exit();
    }


    public static function gestionCommentaire($idcom)
    {
        $rescom = self::$managerCom->read($idcom);
        if ($_SESSION){
            $res= self::$membres->read($_SESSION['pseudo']);
            if ($res->getPseudo()=== $rescom->getAuteur() ):
               echo ''.self::boutonEdition($idcom);
                endif;
        }
    }

    public function signalement()
    {
        $this->commentaires->setSignaler(1);
        var_dump($this->commentaires);
        self::$managerCom->updateSignaler($this->commentaires);
        Routeur::redirection('articles&control=art&id='.$_GET['id']);
        exit();
    }

    public static function boutonSignale($id,$signal)
    {
        if ($signal=== 0){
            echo '<span class="col-lg-offset-9">
                        <a href="index.php?page=articles&action=sigcom&control=com&id='.$_GET['id'].'&idcom='.$id.'">Signaler ce commentaire</a>
                    </span>';
        }else{
            echo '<span class="col-lg-offset-9">
                        Ce commentaire a été signalé.
                    </span>';
        }
    }

    public static function boutonEdition($idcom)
    {
        $rescom = self::$managerCom->read($idcom);
        echo '<span>
                    <a href="index.php?page=articles&action=modifcom&control=com&id='.$_GET['id'].'&idcom='.$rescom->getId().'">Editer</a>
                   </span>';
    }

    public static function totalSignalement()
    {
        $res = self::$managerCom->getTotalSigalement();
        //var_dump($res[0]->getnbCom());
        if ($res[0]->getnbCom()!=='0'){
            echo $res[0]->getnbCom();
            echo '<br><span><a href="#">Voir</a></span>';
            return true;
        }else{
            echo $res[0]->getnbCom();
            return true;
        }
    }
}