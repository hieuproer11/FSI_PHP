<?php

require_once('../src/Model/bddManager.php');
require_once('../src/Model/BO/Alerte.php');
require_once('../src/Model/DAO/AlerteDAO.php');

// Initialisation de la connexion à la base de données
$bdd = ConnexionBDD();

$alerteDAO = new \DAO\AlerteDAO($bdd);

// Création d'objets Alerte pour les tests
$alerte1 = new \BO\Alerte(1, new \DateTime('2024-11-01'), new \DateTime('2024-12-15'), new \DateTime('2024-11-10'), new \DateTime('2024-12-20'));
$alerte2 = new \BO\Alerte(2, new \DateTime('2024-10-05'), new \DateTime('2024-11-15'), new \DateTime('2024-10-20'), new \DateTime('2024-12-01'));

// ----------------- Tests de récupération -----------------
$monAlerte = $alerteDAO->getAlerte(1);
var_dump($monAlerte); // Devrait afficher les détails de l'alerte avec l'ID 1

// ----------------- Tests de création -----------------
// $testCreateAlerte = $alerteDAO->createAlerte($alerte2);
// var_dump($testCreateAlerte); // Devrait retourner `true` si l'insertion a réussi

// ----------------- Tests de mise à jour -----------------
// $alerte1->setDatelim1Al(new \DateTime('2024-11-15'));
// $testUpdateAlerte = $alerteDAO->updateAlerte($alerte1);
// var_dump($testUpdateAlerte); // Devrait retourner `true` si la mise à jour a réussi

// ----------------- Tests de suppression -----------------
// $testDeleteAlerte = $alerteDAO->deleteAlerte(2);
// var_dump($testDeleteAlerte); // Devrait retourner `true` si la suppression a réussi

// ----------------- Tests pour toutes les alertes -----------------
// $allAlertes = $alerteDAO->getAllAlertes();
// var_dump($allAlertes); // Devrait afficher un tableau avec toutes les alertes existantes

?>

