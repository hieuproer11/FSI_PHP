<?php

// Inclure la connexion et le DAO d'Entreprise
use BO\Entreprise;
use DAO\EntrepriseDAO;

// Inclure les fichiers nécessaires
require_once __DIR__ . '/../src/Model/DAO/EntrepriseDAO.php';
require_once __DIR__ . '/../src/Model/BO/Entreprise.php';
require_once __DIR__ . '/../src/Model/bddManager.php'; // Connexion à la base de données

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de EntrepriseDAO
    $entrepriseDAO = new DAO\EntrepriseDAO($conn);

    // --- TEST : Création d'une nouvelle entreprise ---
    echo "TEST: Création d'une entreprise\n";
    $entreprise = new Entreprise(17, "Test Entreprise", "123 Rue Exemple", "75000", "Paris", "0123456789", "contact@exemple.com");
    if ($entrepriseDAO->create($entreprise)) {
        echo "Erreur : échec de la création de l'entreprise.\n";
    } else {
        echo "Entreprise créée avec succès !\n";
    }


    // --- TEST : Lecture d'une entreprise par ID ---
    echo "\nTEST: Lecture d'une entreprise\n";
    $idEntreprise = 1; // Remplacez '1' par l'ID de l'entreprise que vous voulez récupérer
    $retrievedEntreprise = $entrepriseDAO->getById($idEntreprise);
    if ($retrievedEntreprise) {
        echo "Entreprise récupérée : \n";
        echo "ID: " . $retrievedEntreprise->getIdEnt() . "\n";
        echo "Nom: " . $retrievedEntreprise->getNomEnt() . "\n";
        echo "Adresse: " . $retrievedEntreprise->getAdrEnt() . "\n";
    } else {
        echo "Erreur : Entreprise avec l'ID " . $idEntreprise . " non trouvée.\n";
    }

    // --- TEST : Mise à jour d'une entreprise ---
    echo "\nTEST: Mise à jour d'une entreprise\n";

    // Spécifiez ici l'ID de l'entreprise à mettre à jour
    $idEntreprise = 1; // Remplacez par l'ID de l'entreprise que vous souhaitez tester

    // Récupération de l'entreprise à mettre à jour
    $entrepriseToUpdate = $entrepriseDAO->getById($idEntreprise);

    if ($entrepriseToUpdate) {
        // Afficher les données actuelles avant mise à jour
        echo "Entreprise avant mise à jour :\n";
        echo "ID: " . $entrepriseToUpdate->getIdEnt() . "\n";
        echo "Nom: " . $entrepriseToUpdate->getNomEnt() . "\n";
        echo "Adresse: " . $entrepriseToUpdate->getAdrEnt() . "\n";

        // Modification des données de l'entreprise
        $entrepriseToUpdate->setNomEnt("Entreprise Modifiée");
        $entrepriseToUpdate->setAdrEnt("456 Rue Modifiée");

        // Mise à jour dans la base de données
        if ($entrepriseDAO->update($entrepriseToUpdate)) {
            echo "Erreur : La mise à jour de l'entreprise a échoué.\n";

            // Vérification des nouvelles données
            $updatedEntreprise = $entrepriseDAO->getById($idEntreprise);
            if ($updatedEntreprise) {
                echo "Entreprise après mise à jour :\n";
                echo "ID: " . $updatedEntreprise->getIdEnt() . "\n";
                echo "Nom: " . $updatedEntreprise->getNomEnt() . "\n";
                echo "Adresse: " . $updatedEntreprise->getAdrEnt() . "\n";
            } else {
                echo "Erreur : Impossible de récupérer les données après la mise à jour.\n";
            }
        } else {
            echo "Mise à jour effectuée avec succès !\n";
        }
    } else {
        echo "Erreur : Entreprise avec l'ID $idEntreprise non trouvée.\n";
    }

    // --- TEST : Suppression d'une entreprise ---
    echo "\nTEST: Suppression d'une entreprise\n";
    $idToDelete = 1; // Remplacez '1' par l'ID de l'entreprise que vous voulez supprimer
    if ($entrepriseDAO->delete($idToDelete)) {
        echo "Entreprise supprimée avec succès !\n";

        // Vérification de la suppression
        $deletedEntreprise = $entrepriseDAO->getById($idToDelete);
        if ($deletedEntreprise) {
            echo "Erreur : L'entreprise n'a pas été supprimée.\n";
        } else {
            echo "L'entreprise a bien été supprimée.\n";
        }
    } else {
        echo "Erreur : échec de la suppression de l'entreprise.\n";
    }

    // --- TEST : Récupération de toutes les entreprises ---
    echo "\nTEST: Récupération de toutes les entreprises\n";
    $allEntreprises = $entrepriseDAO->getAll();
    if (!empty($allEntreprises)) {
        foreach ($allEntreprises as $entreprise) {
            echo "ID: " . $entreprise->getIdEnt() . " | Nom: " . $entreprise->getNomEnt() . " | Adresse: " . $entreprise->getAdrEnt() . "\n";
        }
    } else {
        echo "Aucune entreprise trouvée.\n";
    }


} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
