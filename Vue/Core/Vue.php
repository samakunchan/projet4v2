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

    public function genererPages()
    {
        if (file_exists($this->fichier)){
            ob_start();
            require $this->fichier;
            $contenu = ob_get_clean();
            require $this->gabarit;
        }else{
            throw new Exception("Fichier '$this->fichier' introuvable");
        }
        /*
        ob_start();
        //var_dump($this->fichier);
        require $this->fichier;
        $contenu = ob_get_clean();
        require $this->gabarit;*/
    }


}