<?php

// Inclure la connexion et le DAO de Alerte
use BO\Alerte;
use DAO\AlerteDAO;

// Inclure les fichiers nécessaires
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\AlerteDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Alerte.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de AlerteDAO
    $alerteDAO = new DAO\AlerteDAO($conn);

   // --- TEST : Création d'une nouvelle alerte ---
    echo "TEST: Création d'une alerte\n";
    $alerte = new Alerte(5, "2024-12-11", "2024-12-22");
    if ($alerteDAO->create($alerte)) {
        echo "Erreur : échec de la création de l'alerte.\n";
    } else {
        echo "Alerte créée avec succès !\n";
    }

    // --- TEST : Lecture d'une alerte par ID ---
    echo "\nTEST: Lecture d'une alerte\n";
    $idAlerte = 5; // Remplacez '1' par l'ID de l'alerte que vous voulez récupérer
    $retrievedAlerte = $alerteDAO->getById($idAlerte);
    if ($retrievedAlerte) {
        echo "Alerte récupérée : \n";
        echo "ID: " . $retrievedAlerte->getIdAl() . "\n";
        echo "Date Limite 1: " . $retrievedAlerte->getDatelimbil1Al() . "\n";
        echo "Date Limite 2: " . $retrievedAlerte->getDatelimbil2Al() . "\n";
    } else {
        echo "Erreur : Alerte avec l'ID " . $idAlerte . " non trouvée.\n";
    }

// --- TEST : Mise à jour d'une alerte ---
    echo "\nTEST: Mise à jour d'une alerte\n";

// Spécifiez ici l'ID de l'alerte à mettre à jour
    $idAlerte = 5; // Remplacez par l'ID de l'alerte que vous souhaitez tester

// Récupération de l'alerte à mettre à jour
    $alerteToUpdate = $alerteDAO->getById($idAlerte);

    if ($alerteToUpdate) {
        // Afficher les données actuelles avant mise à jour
        echo "Alerte avant mise à jour :\n";
        echo "ID: " . $alerteToUpdate->getIdAl() . "\n";
        echo "Date Limite 1: " . $alerteToUpdate->getDatelimbil1Al() . "\n";
        echo "Date Limite 2: " . $alerteToUpdate->getDatelimbil2Al() . "\n";

        // Modification des données de l'alerte
        $alerteToUpdate->setDatelimbil1Al("2023-09-09");
        $alerteToUpdate->setDatelimbil2Al("2019-04-08");

        // Mise à jour dans la base de données
        if ($alerteDAO->update($alerteToUpdate)) {
            echo "Erreur : La mise à jour de l'alerte a échoué.\n";

            // Vérification des nouvelles données
            $updatedAlerte = $alerteDAO->getById($idAlerte);
            if ($updatedAlerte) {
                echo "Alerte après mise à jour :\n";
                echo "ID: " . $updatedAlerte->getIdAl() . "\n";
                echo "Nouvelle Date Limite 1: " . $updatedAlerte->getDatelimbil1Al() . "\n";
                echo "Nouvelle Date Limite 2: " . $updatedAlerte->getDatelimbil2Al() . "\n";
            } else {
                echo "Erreur : Impossible de récupérer les données après la mise à jour.\n";
            }
        } else {
            echo "Mise à jour effectuée avec succès !\n";
        }
    } else {
        echo "Erreur : Alerte avec l'ID $idAlerte non trouvée.\n";
    }








    // --- TEST : Suppression d'une alerte ---
    echo "\nTEST: Suppression d'une alerte\n";
    $idToDelete = 1; // Remplacez '1' par l'ID de l'alerte que vous voulez supprimer
    if ($alerteDAO->delete($idToDelete)) {
        echo "Alerte supprimée avec succès !\n";

        // Vérification de la suppression
        $deletedAlerte = $alerteDAO->getById($idToDelete);
        if ($deletedAlerte) {
            echo "Erreur : L'alerte n'a pas été supprimée.\n";
        } else {
            echo "L'alerte a bien été supprimée.\n";
        }
    } else {
        echo "Erreur : échec de la suppression de l'alerte.\n";
    }


    // --- TEST : Récupération de toutes les alertes ---
    echo "\nTEST: Récupération de toutes les alertes\n";
    $allAlertes = $alerteDAO->getAll();
    if (!empty($allAlertes)) {
        foreach ($allAlertes as $alerte) {
            echo "ID: " . $alerte->getIdAl() . " | Date Limite 1: " . $alerte->getDatelimbil1Al() . " | Date Limite 2: " . $alerte->getDatelimbil2Al() . "\n";
        }
    } else {
        echo "Aucune alerte trouvée.\n";
    }


    



} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
