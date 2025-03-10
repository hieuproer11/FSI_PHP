<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Tuteur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\TuteurDAO.php';
use DAO\TuteurDAO;
use BO\Tuteur;

//connexion avec la BDD
$conn = ConnexionBDD();
$tuteurDAO = new TuteurDAO($conn);

//
$idTut = $_POST['idTut'];
$preTut = $_POST['preTut'];
$nomTut = $_POST['nomTut'];
$telTut = $_POST['telTut'];
$mailTut = $_POST['mailTut'];

//

$tuteur = new Tuteur($idTut, $preTut, $nomTut, $telTut, $mailTut);
$tuteur->setIdTut($idTut);
$tuteur->setPreTut($preTut);
$tuteur->setNomTut($nomTut);
$tuteur->setTelTut($telTut);
$tuteur->setMailTut($mailTut);

var_dump($tuteur);
$tuteurDAO->update($tuteur);
header('Location:../public/pages/PageParametres.php?success=1');
exit();

