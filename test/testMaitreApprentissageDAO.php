<?php

// Inclure les fichiers nécessaires
use DAO\MaitreApprentissageDAO;
use BO\MaitreApprentissage;

// Connexion à la base de données
require_once __DIR__ . '/../src/Model/bddManager.php'; // Connexion à la base de données
require_once __DIR__ . '/../src/Model/BO/MaitreApprentissage.php';
require_once __DIR__ . '/../src/Model/DAO/MaitreApprentissageDAO.php';

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de MaitreApprentissageDAO
    $maitreDAO = new MaitreApprentissageDAO($conn);

    // --- TEST : Création d'un maître d'apprentissage ---
    echo "\nTEST: Création d'un maître d'apprentissage\n";
    $maitre = new MaitreApprentissage(18, "Dupont", "Jean", "jean.dupont@example.com", "0123456789", 2);
    $maitreDAO->create($maitre);
    echo "Maître d'apprentissage créé avec succès !\n";

    // --- TEST : Lecture d'un maître d'apprentissage par ID ---
    echo "\nTEST: Lecture d'un maître d'apprentissage par ID\n";
    $idMaitapp = 1; // Remplacez par l'ID du maître que vous souhaitez récupérer
    $retrievedMaitre = $maitreDAO->getById($idMaitapp);
    if ($retrievedMaitre) {
        echo "Maître récupéré : \n";
        echo "ID: " . $retrievedMaitre->getIdMaitapp() . "\n";
        echo "Nom: " . $retrievedMaitre->getNomMaitapp() . "\n";
        echo "Prénom: " . $retrievedMaitre->getPreMaitapp() . "\n";
        echo "Email: " . $retrievedMaitre->getMailMaitapp() . "\n";
        echo "Téléphone: " . $retrievedMaitre->getTelMaitapp() . "\n";
        echo "ID Entreprise: " . $retrievedMaitre->getIdEnt() . "\n";
    } else {
        echo "Erreur : Maître avec l'ID $idMaitapp non trouvé.\n";
    }

    // --- TEST : Mise à jour d'un maître d'apprentissage ---
    echo "\nTEST: Mise à jour d'un maître d'apprentissage\n";
    $maitreToUpdate = $maitreDAO->getById($idMaitapp);
    if ($maitreToUpdate) {
        // Afficher les données avant mise à jour
        echo "Avant mise à jour :\n";
        echo "Nom: " . $maitreToUpdate->getNomMaitapp() . "\n";
        echo "Prénom: " . $maitreToUpdate->getPreMaitapp() . "\n";

        // Mise à jour des données
        $maitreToUpdate->setNomMaitapp("Martin");
        $maitreToUpdate->setPreMaitapp("Paul");

        // Effectuer la mise à jour
        $maitreDAO->update($maitreToUpdate);
        echo "Mise à jour effectuée avec succès !\n";

        // Vérifier les nouvelles données
        $updatedMaitre = $maitreDAO->getById($idMaitapp);
        if ($updatedMaitre) {
            echo "Après mise à jour :\n";
            echo "Nom: " . $updatedMaitre->getNomMaitapp() . "\n";
            echo "Prénom: " . $updatedMaitre->getPreMaitapp() . "\n";
        } else {
            echo "Erreur : Impossible de récupérer les données après la mise à jour.\n";
        }
    } else {
        echo "Erreur : Maître avec l'ID $idMaitapp non trouvé pour mise à jour.\n";
    }

    // --- TEST : Suppression d'un maître d'apprentissage ---
    echo "\nTEST: Suppression d'un maître d'apprentissage\n";
    $idToDelete = 1; // Remplacez par l'ID du maître que vous souhaitez supprimer
    $maitreDAO->delete($idToDelete);
    echo "Maître d'apprentissage supprimé avec succès !\n";

    // Vérification de la suppression
    $deletedMaitre = $maitreDAO->getById($idToDelete);
    if ($deletedMaitre) {
        echo "Erreur : Le maître n'a pas été supprimé.\n";
    } else {
        echo "Le maître a bien été supprimé.\n";
    }

    // --- TEST : Récupération de tous les maîtres d'apprentissage ---
    echo "\nTEST: Récupération de tous les maîtres d'apprentissage\n";
    $allMaitres = $maitreDAO->getAll();
    if (!empty($allMaitres)) {
        foreach ($allMaitres as $maitre) {
            echo "ID: " . $maitre->getIdMaitapp() . " | Nom: " . $maitre->getNomMaitapp() . " | Prénom: " . $maitre->getPreMaitapp() . "\n";
        }
    } else {
        echo "Aucun maître d'apprentissage trouvé.\n";
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
