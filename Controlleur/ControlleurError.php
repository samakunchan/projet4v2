<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 19/10/2017
 * Time: 14:48
 */

namespace Controlleur;


class ControlleurError
{
    public static function accesInterdit()
    {
        header('HTTP/1.0 403 Forbidden');
        die('<p class="introuvable">Accès interdit</p>');
    }

    public static function pageIntrouvable()
    {
        header('HTTP/1.0 404 Not Found');
        die('<p class="introuvable">Page introuvable</p>');
    }

    public static function identifiantIncorrect()
    {
        echo '<div class="alert alert-danger">'. 'Identifiant incorrect' .'</div>';
    }

    public static function donneesMAJ()
    {
        if ($_POST){
            if($_POST['pseudo']===''){
                return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
            }elseif ($_POST['password']===''){
                return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
            }elseif ($_POST['email']===''){
                return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
            }
        }
        if (sha1($_POST['password'])!==sha1($_POST['passwordConf'])){
            return '<div class="alert alert-danger">Les mots de passe doivent etre identique</div>';
        }
    }

    public static function messageErreur()
    {
        if ($_POST){
            if ($_GET['action']==='connection'){
                if($_POST['pseudo']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif ($_POST['password']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }
            }elseif ($_GET['action']==='inscription'){
                if($_POST['pseudo']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif ($_POST['password']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif ($_POST['passwordConf']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif ($_POST['email']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }
            }elseif ($_GET['action']==='edit'){
                if ($_GET['page']==='articles'){
                    if($_POST['pseudo']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif ($_POST['password']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif ($_POST['email']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif ($_POST['pseudo']!=='' && $_POST['email']!=='' && $_POST['password']!=='' && $_POST['passwordConf']!==''){
                        return '<div class="alert alert-success">Les données ont bien été mis à jour</div>';
                    }
                }elseif ($_GET['page']=== 'biographie') {
                    if ($_POST['titre'] === '') {
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    } elseif ($_POST['contenu'] === '') {
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif ($_POST['titre']!=='' && $_POST['contenu']!==''){
                        return '<div class="alert alert-success">Les données ont bien été mis à jour</div>';
                    }
                }
            }elseif ($_GET['page']==='article'){
                if ($_GET['action']==='delete'){
                    return '<div class="alert alert-success">L\'article '.$donnee->getTitre().' a bien été supprimé </div>';
                }
            }elseif ($_GET['action']==='modif'){
                if ($_POST['titre']!=='' && $_POST['contenu']!==''){
                    return '<div class="alert alert-success">Les données ont bien été mis à jour</div>';
                }
            }elseif ($_GET['action']==='modifcom'){
                if($_POST['auteur']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif ($_POST['contenu']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif ($_POST['auteur']!=='' && $_POST['contenu']!==''){
                    return '<div class="alert alert-success">Les données ont bien été mis à jour</div>';
                }
            }
        }
    }
}