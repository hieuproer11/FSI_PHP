<?php

// Inclure la connexion et le DAO de Utilisateur
use DAO\UtilisateurDAO;
use BO\Utilisateur;

// Inclure les fichiers nécessaires
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\UtilisateurDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Utilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de UtilisateurDAO
    $utilisateurDAO = new DAO\UtilisateurDAO($conn);
/*
    // --- TEST : Création d'un nouvel utilisateur ---
    echo "\nTEST: Création d'un nouvel utilisateur\n";
    $utilisateur = new Utilisateur(
        null, // ID auto-généré
        "Dupont", // nomUti
        "Jean", // preUti
        "jean.dupont@example.com", // mailUti
        true, // altUti
        "0102030405", // telUti
        "10 Rue de Paris", // adrUti
        "75001", // cpUti
        "Paris", // vilUti
        "jdupont", // logUti
        "password123", // mdpUti
        1, // idTut
        1, // idSpe
        1, // idTypeuti
        1, // idMaitapp
        1, // idEnt
        1 // idCla
    );
    $utilisateurDAO->create($utilisateur);
    echo "Utilisateur créé avec succès !\n";

    // --- TEST : Récupération d'un utilisateur par ID ---
    echo "\nTEST: Récupération d'un utilisateur par ID\n";
    $idUtilisateur = 1; // Remplacer par un ID valide
    $utilisateurRecupere = $utilisateurDAO->getById($idUtilisateur);
    if ($utilisateurRecupere) {
        echo "Utilisateur récupéré :\n";
        echo "ID: " . $utilisateurRecupere->getIdUti() . " | Nom: " . $utilisateurRecupere->getNomUti() . " | Email: " . $utilisateurRecupere->getMailUti() . "\n";
    } else {
        echo "Erreur : Utilisateur avec l'ID " . $idUtilisateur . " non trouvé.\n";
    }
*/
    // --- TEST : Récupération de tous les utilisateurs ---
    echo "\nTEST: Récupération de tous les utilisateurs\n";
    $allUtilisateurs = $utilisateurDAO->getAll();
    if (!empty($allUtilisateurs)) {
        foreach ($allUtilisateurs as $utilisateur) {
            echo "ID: " . $utilisateur->getIdUti() . " | Nom: " . $utilisateur->getNomUti() . " | Email: " . $utilisateur->getMailUti() . "\n";
        }
    } else {
        echo "Aucun utilisateur trouvé.\n";
    }
/*
    // --- TEST : Mise à jour d'un utilisateur ---
    echo "\nTEST: Mise à jour d'un utilisateur\n";
    $idUtilisateur = 1; // Remplacer par un ID valide
    $utilisateurAUpdater = $utilisateurDAO->getById($idUtilisateur);

    if ($utilisateurAUpdater) {
        // Afficher les données actuelles avant mise à jour
        echo "Utilisateur avant mise à jour :\n";
        echo "ID: " . $utilisateurAUpdater->getIdUti() . " | Nom: " . $utilisateurAUpdater->getNomUti() . " | Email: " . $utilisateurAUpdater->getMailUti() . "\n";

        // Modifier les données
        $utilisateurAUpdater->setNomUti("Dupont Updated");
        $utilisateurAUpdater->setMailUti("jean.updated@example.com");

        // Mettre à jour dans la base de données
        $utilisateurDAO->update($utilisateurAUpdater);
        echo "Mise à jour effectuée avec succès !\n";

        // Vérification après mise à jour
        $utilisateurMiseAJour = $utilisateurDAO->getById($idUtilisateur);
        if ($utilisateurMiseAJour) {
            echo "Utilisateur après mise à jour :\n";
            echo "ID: " . $utilisateurMiseAJour->getIdUti() . " | Nom: " . $utilisateurMiseAJour->getNomUti() . " | Email: " . $utilisateurMiseAJour->getMailUti() . "\n";
        } else {
            echo "Erreur : Impossible de récupérer les données après mise à jour.\n";
        }
    } else {
        echo "Erreur : Utilisateur avec l'ID $idUtilisateur non trouvé.\n";
    }

    // --- TEST : Suppression d'un utilisateur ---
    echo "\nTEST: Suppression d'un utilisateur\n";
    $idToDelete = 1; // Remplacer par l'ID d'un utilisateur à supprimer
    $utilisateurDAO->delete($idToDelete);

    // Vérification de la suppression
    $deletedUtilisateur = $utilisateurDAO->getById($idToDelete);
    if ($deletedUtilisateur) {
        echo "Erreur : L'utilisateur n'a pas été supprimé.\n";
    } else {
        echo "Utilisateur supprimé avec succès !\n";
    }
*/
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
