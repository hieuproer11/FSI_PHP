<?php

require_once __DIR__ . '/../src/Model/bddManager.php';
require_once __DIR__ . '/../src/Model/BO/Utilisateur.php';
require_once __DIR__ . '/../src/Model/DAO/UtilisateurDAO.php';
require_once __DIR__ . '/../src/Model/BO/Etudiant.php';
require_once __DIR__ . '/../src/Model/DAO/EtudiantDAO.php';
require_once __DIR__ . '/../src/Model/BO/Entreprise.php';
require_once __DIR__ . '/../src/Model/DAO/EntrepriseDAO.php';

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

