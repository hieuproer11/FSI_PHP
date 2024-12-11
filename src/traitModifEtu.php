<?php

include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Utilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\UtilisateurDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Etudiant.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Entreprise.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EntrepriseDAO.php';

use DAO\EtudiantDAO;
use DAO\EntrepriseDAO;

//connexion a la base
$conn = ConnexionBDD();
$etudiantDAO = new EtudiantDAO($conn);

//
$idUti =$_POST['idUti'];
$preUti =$_POST['preUti'];
$nomUti =$_POST['nomUti'];
$adrUti =$_POST['adrUti'];
$mailUti =$_POST['mailUti'];
$telUti =$_POST['telUti'];
$altUti =$_POST['altUti'];
$nomEnt =$_POST['nomEnt'];
$adrEnt =$_POST['adrEnt'];


//
$liste = array (
    'idUti' => $idUti,
    'preUti' => $preUti,
    'nomUti' => $nomUti,
    'adrUti' => $adrUti,
    'mailUti' => $mailUti,
    'telUti' => $telUti,
    'nomEnt' => $nomEnt,
    'adrEnt' => $adrEnt,
    'altUti' => $altUti
);

var_dump($liste);
$etudiantDAO->update($liste);
header('Location:../public/pages/PageMesInformationsEtudiant.php');



//$etudiant =$etudiantDAO ->getById($idUti);

