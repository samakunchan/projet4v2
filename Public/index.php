<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 13:42
 */
require '../Modele/App/App.php';
require '../Modele/Entity/Articles.php';
require '../Modele/Manager/ManagerDonnees.php';
require '../Modele/Manager/ManagerArticles.php';

$test = new \Modele\Manager\ManagerArticles();
$test->readAll();
//$test->read(1);
$articles = new \Modele\Entity\Articles();
$articles->setTitre('Un article un peu plus long');
$articles->setContenu('Etenim si attendere diligenter, existimare vere de omni hac 
causa volueritis, sic constituetis, iudices, nec descensurum quemquam ad hanc accusationem 
fuisse, cui, utrum vellet, liceret, nec, cum descendisset, quicquam habiturum spei fuisse,
 nisi alicuius intolerabili libidine et nimis acerbo odio niteretur. Sed ego Atratino, 
 humanissimo atque optimo adulescenti meo necessario, ignosco, qui habet excusationem vel 
 pietatis vel necessitatis vel aetatis. Si voluit accusare, pietati tribuo, si iussus est');
var_dump($articles);
$test->create($articles);
