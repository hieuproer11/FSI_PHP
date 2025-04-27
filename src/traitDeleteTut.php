<?php
require_once __DIR__ . '/../src/Model/bddManager.php';
require_once __DIR__ . '/../src/Model/DAO/TuteurDAO.php';

use DAO\TuteurDAO;

// Connexion à la base de données
$conn = ConnexionBDD();
$tuteurDAO = new TuteurDAO($conn);

// Vérifier que l'ID est présent dans l'URL
if (isset($_GET['idTut']) && !empty($_GET['idTut'])) {
    $idTut = intval($_GET['idTut']); // Sécuriser l'ID

    try {
        $tuteurDAO->delete($idTut);
        header('Location: ../public/pages/PageParametres.php?delete=success'); // Redirection après suppression
        exit();
    } catch (Exception $e) {
        die("Erreur lors de la suppression : " . $e->getMessage());
    }
} else {
    die("ID du tuteur invalide !");
}
