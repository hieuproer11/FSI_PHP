<?php

// Inclure la connexion et le DAO de Specialite
use DAO\SpecialiteDAO;
use BO\Specialite;

// Inclure les fichiers nécessaires
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\SpecialiteDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Specialite.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de SpecialiteDAO
    $specialiteDAO = new DAO\SpecialiteDAO($conn);

    // --- TEST : Création d'une nouvelle spécialité ---
    echo "\nTEST: Création d'une nouvelle spécialité\n";
    $specialite = new Specialite(18, "Informatique"); // Passer null pour l'ID, il sera généré par la base
    $specialiteDAO->create($specialite);
    echo "Spécialité créée avec succès !\n";

    // --- TEST : Récupération d'une spécialité par ID ---
    echo "\nTEST: Récupération d'une spécialité par ID\n";
    $idSpecialite = 1; // Remplacer par un ID valide de spécialité dans la base
    $specialiteRecuperee = $specialiteDAO->getById($idSpecialite);
    if ($specialiteRecuperee) {
        echo "Spécialité récupérée :\n";
        echo "ID: " . $specialiteRecuperee->getIdSpe() . " | Nom: " . $specialiteRecuperee->getNomSpe() . "\n";
    } else {
        echo "Erreur : Spécialité avec l'ID " . $idSpecialite . " non trouvée.\n";
    }

    // --- TEST : Récupération de toutes les spécialités ---
    echo "\nTEST: Récupération de toutes les spécialités\n";
    $allSpecialites = $specialiteDAO->getAll();
    if (!empty($allSpecialites)) {
        foreach ($allSpecialites as $specialite) {
            echo "ID: " . $specialite->getIdSpe() . " | Nom: " . $specialite->getNomSpe() . "\n";
        }
    } else {
        echo "Aucune spécialité trouvée.\n";
    }

    // --- TEST : Mise à jour d'une spécialité ---
    echo "\nTEST: Mise à jour d'une spécialité\n";
    $idSpecialite = 1; // Remplacer par un ID valide
    $specialiteAUpdater = $specialiteDAO->getById($idSpecialite);

    if ($specialiteAUpdater) {
        // Afficher les données actuelles avant mise à jour
        echo "Spécialité avant mise à jour :\n";
        echo "ID: " . $specialiteAUpdater->getIdSpe() . " | Nom: " . $specialiteAUpdater->getNomSpe() . "\n";

        // Modifier le nom de la spécialité
        $specialiteAUpdater->setNomSpe("Réseaux et Systèmes");

        // Mettre à jour dans la base de données
        $specialiteDAO->update($specialiteAUpdater);
        echo "Mise à jour effectuée avec succès !\n";

        // Vérification après mise à jour
        $specialiteMiseAJour = $specialiteDAO->getById($idSpecialite);
        if ($specialiteMiseAJour) {
            echo "Spécialité après mise à jour :\n";
            echo "ID: " . $specialiteMiseAJour->getIdSpe() . " | Nom: " . $specialiteMiseAJour->getNomSpe() . "\n";
        } else {
            echo "Erreur : Impossible de récupérer les données après mise à jour.\n";
        }
    } else {
        echo "Erreur : Spécialité avec l'ID $idSpecialite non trouvée.\n";
    }

    // --- TEST : Suppression d'une spécialité ---
    echo "\nTEST: Suppression d'une spécialité\n";
    $idToDelete = 1; // Remplacer par l'ID d'une spécialité à supprimer
    $specialiteDAO->delete($idToDelete);

    // Vérification de la suppression
    $deletedSpecialite = $specialiteDAO->getById($idToDelete);
    if ($deletedSpecialite) {
        echo "Erreur : La spécialité n'a pas été supprimée.\n";
    } else {
        echo "Spécialité supprimée avec succès !\n";
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
