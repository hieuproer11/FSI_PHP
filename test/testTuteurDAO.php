<?php

// Inclure la connexion et le DAO de Tuteur
use DAO\TuteurDAO;
use BO\Tuteur;

// Inclure les fichiers nécessaires
require_once __DIR__ . '/../src/Model/DAO/TuteurDAO.php';
require_once __DIR__ . '/../src/Model/BO/Tuteur.php';
require_once __DIR__ . '/../src/Model/bddManager.php'; // Connexion à la base de données

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de TuteurDAO
    $tuteurDAO = new DAO\TuteurDAO($conn);

    // --- TEST : Création d'un nouveau tuteur ---
    echo "\nTEST: Création d'un nouveau tuteur\n";
    $tuteur = new Tuteur(16, "Jean", "Dupont", "0123456789", "jean.dupont@mail.com"); // Passer null pour l'ID, il sera généré par la base
    $tuteurDAO->create($tuteur);
    echo "Tuteur créé avec succès !\n";

    // --- TEST : Récupération d'un tuteur par ID ---
    echo "\nTEST: Récupération d'un tuteur par ID\n";
    $idTuteur = 1; // Remplacer par un ID valide de tuteur dans la base
    $tuteurRecupere = $tuteurDAO->getById($idTuteur);
    if ($tuteurRecupere) {
        echo "Tuteur récupéré :\n";
        echo "ID: " . $tuteurRecupere->getIdTut() . " | Prénom: " . $tuteurRecupere->getPreTut() . " | Nom: " . $tuteurRecupere->getNomTut() . " | Téléphone: " . $tuteurRecupere->getTelTut() . " | Mail: " . $tuteurRecupere->getMailTut() . "\n";
    } else {
        echo "Erreur : Tuteur avec l'ID " . $idTuteur . " non trouvé.\n";
    }

    // --- TEST : Récupération de tous les tuteurs ---
    echo "\nTEST: Récupération de tous les tuteurs\n";
    $allTuteurs = $tuteurDAO->getAll();
    if (!empty($allTuteurs)) {
        foreach ($allTuteurs as $tuteur) {
            echo "ID: " . $tuteur->getIdTut() . " | Prénom: " . $tuteur->getPreTut() . " | Nom: " . $tuteur->getNomTut() . " | Téléphone: " . $tuteur->getTelTut() . " | Mail: " . $tuteur->getMailTut() . "\n";
        }
    } else {
        echo "Aucun tuteur trouvé.\n";
    }

    // --- TEST : Mise à jour d'un tuteur ---
    echo "\nTEST: Mise à jour d'un tuteur\n";
    $idTuteur = 1; // Remplacer par un ID valide
    $tuteurAUpdater = $tuteurDAO->getById($idTuteur);

    if ($tuteurAUpdater) {
        // Afficher les données actuelles avant mise à jour
        echo "Tuteur avant mise à jour :\n";
        echo "ID: " . $tuteurAUpdater->getIdTut() . " | Prénom: " . $tuteurAUpdater->getPreTut() . " | Nom: " . $tuteurAUpdater->getNomTut() . " | Téléphone: " . $tuteurAUpdater->getTelTut() . " | Mail: " . $tuteurAUpdater->getMailTut() . "\n";

        // Modifier les données
        $tuteurAUpdater->setPreTut("Paul");
        $tuteurAUpdater->setNomTut("Durand");

        // Mettre à jour dans la base de données
        $tuteurDAO->update($tuteurAUpdater);
        echo "Mise à jour effectuée avec succès !\n";

        // Vérification après mise à jour
        $tuteurMiseAJour = $tuteurDAO->getById($idTuteur);
        if ($tuteurMiseAJour) {
            echo "Tuteur après mise à jour :\n";
            echo "ID: " . $tuteurMiseAJour->getIdTut() . " | Prénom: " . $tuteurMiseAJour->getPreTut() . " | Nom: " . $tuteurMiseAJour->getNomTut() . " | Téléphone: " . $tuteurMiseAJour->getTelTut() . " | Mail: " . $tuteurMiseAJour->getMailTut() . "\n";
        } else {
            echo "Erreur : Impossible de récupérer les données après mise à jour.\n";
        }
    } else {
        echo "Erreur : Tuteur avec l'ID $idTuteur non trouvé.\n";
    }

    // --- TEST : Suppression d'un tuteur ---
    echo "\nTEST: Suppression d'un tuteur\n";
    $idToDelete = 1; // Remplacer par l'ID d'un tuteur à supprimer
    $tuteurDAO->delete($idToDelete);

    // Vérification de la suppression
    $deletedTuteur = $tuteurDAO->getById($idToDelete);
    if ($deletedTuteur) {
        echo "Erreur : Le tuteur n'a pas été supprimé.\n";
    } else {
        echo "Tuteur supprimé avec succès !\n";
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
