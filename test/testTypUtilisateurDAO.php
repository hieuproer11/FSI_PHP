<?php

// Inclure la connexion et le DAO de TypeUtilisateur
use DAO\TypeUtilisateurDAO;
use BO\TypeUtilisateur;

// Inclure les fichiers nécessaires
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\TypeUtilisateurDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\TypeUtilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de TypeUtilisateurDAO
    $typeUtilisateurDAO = new DAO\TypeUtilisateurDAO($conn);

    // --- TEST : Création d'un nouveau type d'utilisateur ---
    echo "\nTEST: Création d'un nouveau type d'utilisateur\n";
    $typeUtilisateur = new TypeUtilisateur(null, "Administrateur"); // Passer null pour l'ID, il sera généré par la base
    $typeUtilisateurDAO->create($typeUtilisateur);
    echo "Type d'utilisateur créé avec succès !\n";

    // --- TEST : Récupération d'un type d'utilisateur par ID ---
    echo "\nTEST: Récupération d'un type d'utilisateur par ID\n";
    $idTypeUtilisateur = 1; // Remplacer par un ID valide
    $typeUtilisateurRecupere = $typeUtilisateurDAO->getById($idTypeUtilisateur);
    if ($typeUtilisateurRecupere) {
        echo "Type d'utilisateur récupéré :\n";
        echo "ID: " . $typeUtilisateurRecupere->getIdTypeuti() . " | Type: " . $typeUtilisateurRecupere->getTypeutiTypeuti() . "\n";
    } else {
        echo "Erreur : Type d'utilisateur avec l'ID " . $idTypeUtilisateur . " non trouvé.\n";
    }

    // --- TEST : Récupération de tous les types d'utilisateurs ---
    echo "\nTEST: Récupération de tous les types d'utilisateurs\n";
    $allTypeUtilisateurs = $typeUtilisateurDAO->getAll();
    if (!empty($allTypeUtilisateurs)) {
        foreach ($allTypeUtilisateurs as $typeUtilisateur) {
            echo "ID: " . $typeUtilisateur->getIdTypeuti() . " | Type: " . $typeUtilisateur->getTypeutiTypeuti() . "\n";
        }
    } else {
        echo "Aucun type d'utilisateur trouvé.\n";
    }

    // --- TEST : Mise à jour d'un type d'utilisateur ---
    echo "\nTEST: Mise à jour d'un type d'utilisateur\n";
    $idTypeUtilisateur = 1; // Remplacer par un ID valide
    $typeUtilisateurAUpdater = $typeUtilisateurDAO->getById($idTypeUtilisateur);

    if ($typeUtilisateurAUpdater) {
        // Afficher les données actuelles avant mise à jour
        echo "Type d'utilisateur avant mise à jour :\n";
        echo "ID: " . $typeUtilisateurAUpdater->getIdTypeuti() . " | Type: " . $typeUtilisateurAUpdater->getTypeutiTypeuti() . "\n";

        // Modifier les données
        $typeUtilisateurAUpdater->setTypeutiTypeuti("Utilisateur Standard");

        // Mettre à jour dans la base de données
        $typeUtilisateurDAO->update($typeUtilisateurAUpdater);
        echo "Mise à jour effectuée avec succès !\n";

        // Vérification après mise à jour
        $typeUtilisateurMiseAJour = $typeUtilisateurDAO->getById($idTypeUtilisateur);
        if ($typeUtilisateurMiseAJour) {
            echo "Type d'utilisateur après mise à jour :\n";
            echo "ID: " . $typeUtilisateurMiseAJour->getIdTypeuti() . " | Type: " . $typeUtilisateurMiseAJour->getTypeutiTypeuti() . "\n";
        } else {
            echo "Erreur : Impossible de récupérer les données après mise à jour.\n";
        }
    } else {
        echo "Erreur : Type d'utilisateur avec l'ID $idTypeUtilisateur non trouvé.\n";
    }

    // --- TEST : Suppression d'un type d'utilisateur ---
    echo "\nTEST: Suppression d'un type d'utilisateur\n";
    $idToDelete = 1; // Remplacer par l'ID d'un type d'utilisateur à supprimer
    $typeUtilisateurDAO->delete($idToDelete);

    // Vérification de la suppression
    $deletedTypeUtilisateur = $typeUtilisateurDAO->getById($idToDelete);
    if ($deletedTypeUtilisateur) {
        echo "Erreur : Le type d'utilisateur n'a pas été supprimé.\n";
    } else {
        echo "Type d'utilisateur supprimé avec succès !\n";
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
