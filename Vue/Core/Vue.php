<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 15:46
 */

namespace Vue\Core;


class Vue
{
    private $fichier;
    private $gabarit;

    public function __construct($page)
    {
        $this->fichier = '../Vue/Pages/'. $page .'.php';
        $this->gabarit = '../Vue/Gabarit/gabarit.php';
    }

    public function genererPages($donnees = false)
    {
        if ($donnees){
            if (file_exists($this->fichier)){
                ob_start();
                extract($donnees);
                require $this->fichier;
                $contenu = ob_get_clean();
                require $this->gabarit;
            }else{
                echo 'Fichier ' . $this->fichier . ' introuvable';
            }
        }else{
            ob_start();
            require $this->fichier;
            $donnees= '';
            $contenu = ob_get_clean();
            require $this->gabarit;
        }
    }

    public function sousPage($donnees = false)
    {
        if ($donnees){
            ob_start();
            require $this->fichier;
            $contenu = ob_get_clean();
            require $this->gabarit;
        }
    }


}