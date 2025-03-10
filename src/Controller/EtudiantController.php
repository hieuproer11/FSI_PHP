<?php
// Import des classes nécessaires
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan2DAO.php';

use DAO\EtudiantDAO;
use DAO\Bilan1DAO;
use DAO\Bilan2DAO;

// Connexion à la base de données
$conn = ConnexionBDD();
$etudiantDAO = new EtudiantDAO($conn);
$bilan1DAO = new Bilan1DAO($conn);
$bilan2DAO = new Bilan2DAO($conn);

// Récupération de l'étudiant via son ID passé en paramètre GET
$idEtudiant = $_GET['id'] ?? null;

if (!$idEtudiant) {
    die("ID étudiant non fourni.");
}

$etudiant = $etudiantDAO->getById((int)$idEtudiant);

if (!$etudiant) {
    die("Étudiant non trouvé.");
}

// Récupération des bilans associés
$bilan1 = $bilan1DAO->getById($etudiant->getBilan1()->getIdBil());
$bilan2 = $bilan2DAO->getById($etudiant->getBilan2()->getIdBil());

// Inclusion de la vue
include '../views/etudiant_details.php';
