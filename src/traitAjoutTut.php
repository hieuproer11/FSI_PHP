<?php
require_once __DIR__ . '/../src/Model/bddManager.php';
require_once __DIR__ . '/../src/Model/BO/Tuteur.php';
require_once __DIR__ . '/../src/Model/DAO/TuteurDAO.php';

use DAO\TuteurDAO;
use BO\Tuteur;

// Connexion à la base de données
$conn = ConnexionBDD();
$tuteurDAO = new TuteurDAO($conn);

// Récupération des données depuis le formulaire
$preTut = $_POST['preTut'];
$nomTut = $_POST['nomTut'];
$telTut = $_POST['telTut'];
$mailTut = $_POST['mailTut'];

// Création d'un nouvel objet Tuteur
$tuteur = new Tuteur(null, $preTut, $nomTut, $telTut, $mailTut);

// Appel de la méthode create pour insérer le tuteur dans la base de données
$tuteurDAO->create($tuteur);
// Redirection vers la page des tuteurs avec un message de succès
header('Location: ../public/pages/PageAjouterTuteur.php');
exit();