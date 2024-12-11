<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\UtilisateurDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Utilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Etudiant.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de UtilisateurDAO
    $etudiantDAO = new DAO\UtilisateurDAO($conn);

    echo "\nTEST: Récupération d'un utilisateur par ID\n";
    $idEtu = 1; // Remplacer par un ID valide
    $etudiantRecupere = $etudiantDAO->getById($idEtu);
    if ($etudiantRecupere) {
        echo "Utilisateur récupéré :\n";
        echo "ID: " . $etudiantRecupere->getIdUti() . " | Nom: " . $etudiantRecupere->getNomUti() . " | Email: " . $etudiantRecupere->getAdrUti() . "\n";
    } else {
        echo "Erreur : Utilisateur avec l'ID " . $idEtu . " non trouvé.\n";
    }

}catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}