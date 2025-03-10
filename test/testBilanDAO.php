<?php

require_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan1.php'; // Inclure les fichiers des BO
require_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan2.php';
require_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php'; // Inclure les fichiers des DAO
require_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan2DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données

use BO\Bilan1;
use BO\Bilan2;
use DAO\Bilan1DAO;
use DAO\Bilan2DAO;

try {
    // Connexion à la base de données
    $conn = ConnexionBDD();

    // === Tests pour Bilan1 ===
    echo "=== Tests pour Bilan1 ===\n";
    $bilan1DAO = new Bilan1DAO($conn);

/*
    // Création d'un Bilan1
    $bilan1 = new Bilan1(16, 15, 14, 13, 14, "Très bon", "2024-12-01");
    $bilan1DAO->create($bilan1);
    echo "Bilan1 créé.\n";


// --- TEST : Lecture d'un Bilan1 par ID ---
    echo "\nTEST: Lecture d'un Bilan1\n";
    $idBilan1 = 15; // Remplacez '3' par l'ID du Bilan1 que vous voulez récupérer
    $retrievedBilan1 = $bilan1DAO->getById($idBilan1);

    if ($retrievedBilan1) {
        echo "Bilan1 récupéré : \n";
        echo "ID: " . $retrievedBilan1->getIdBil() . "\n";
        echo "Note entreprise: " . $retrievedBilan1->getNotentBil() . "\n";
        echo "Note dossier: " . $retrievedBilan1->getNotdossBil() . "\n";
        echo "Note orale: " . $retrievedBilan1->getNotorBil() . "\n";
        echo "Moyenne: " . $retrievedBilan1->getMoyBil() . "\n";
        echo "Remarque: " . $retrievedBilan1->getRemarqueBil() . "\n";
        echo "Date de visite: " . $retrievedBilan1->getDatevisiteBil() . "\n";
    } else {
        echo "Erreur : Aucun Bilan1 trouvé avec l'ID " . $idBilan1 . ".\n";
    }

// --- TEST : Mise à jour d'un Bilan1 ---
    echo "\nTEST: Mise à jour d'un Bilan1\n";

// Spécifiez ici l'ID du Bilan1 à mettre à jour
    $idBilan1 = 16; // Remplacez par l'ID du Bilan1 que vous souhaitez tester

// Récupération du Bilan1 à mettre à jour
    $retrievedBilan1 = $bilan1DAO->getById($idBilan1);

    if ($retrievedBilan1) {
        // Afficher les données actuelles avant mise à jour
        echo "Bilan1 avant mise à jour :\n";
        echo "ID: " . $retrievedBilan1->getIdBil() . "\n";
        echo "Note entreprise: " . $retrievedBilan1->getNotentBil() . "\n";
        echo "Remarque: " . $retrievedBilan1->getRemarqueBil() . "\n";

        // Modifier les données du Bilan1
        $retrievedBilan1->setNotentBil(16);
        $retrievedBilan1->setRemarqueBil("Excellent");

        // Mise à jour dans la base de données
        if ($bilan1DAO->update($retrievedBilan1)) {
            echo "Mise à jour effectuée avec succès !\n";

            // Vérification des nouvelles données
            $updatedBilan1 = $bilan1DAO->getById($idBilan1);
            if ($updatedBilan1) {
                echo "Bilan1 après mise à jour :\n";
                echo "ID: " . $updatedBilan1->getIdBil() . "\n";
                echo "Nouvelle note entreprise: " . $updatedBilan1->getNotentBil() . "\n";
                echo "Nouvelle remarque: " . $updatedBilan1->getRemarqueBil() . "\n";
            } else {
                echo "Erreur : Impossible de récupérer les données après la mise à jour.\n";
            }
        } else {
            echo "Erreur : La mise à jour du Bilan1 a échoué.\n";
        }
    } else {
        echo "Erreur : Aucun Bilan1 trouvé avec l'ID $idBilan1.\n";
    }


// --- TEST : Suppression d'un Bilan1 ---
echo "\nTEST: Suppression d'un Bilan1\n";

// Spécifiez ici l'ID du Bilan1 à supprimer
$idToDelete = 16; // Remplacez par l'ID du Bilan1 que vous souhaitez supprimer

// Suppression du Bilan1
if ($bilan1DAO->delete($idToDelete)) {
    echo "Bilan1 supprimé avec succès !\n";

    // Vérification de la suppression
    $deletedBilan1 = $bilan1DAO->getById($idToDelete);
    if ($deletedBilan1) {
        echo "Erreur : Le Bilan1 n'a pas été supprimé.\n";
    } else {
        echo "Le Bilan1 a bien été supprimé.\n";
    }
} else {
    echo "Erreur : échec de la suppression du Bilan1.\n";
}
*/





    // === Tests pour Bilan2 ===
    echo "\n=== Tests pour Bilan2 ===\n";
    $bilan2DAO = new Bilan2DAO($conn);
/*
    // Création d'un Bilan2
    $bilan2 = new Bilan2(16, 12, 11, 11.5, "Bien", "Mémoire sur l'IA", "2024-12-15");
    $bilan2DAO->create($bilan2);
    echo "Bilan2 créé.\n";




// --- TEST : Lecture d'un Bilan2 par ID ---
    echo "\nTEST: Lecture d'un Bilan2 par ID\n";

// Spécifiez l'ID du Bilan2 à récupérer
    $idBilan2 = 15; // Remplacez par l'ID du Bilan2 que vous souhaitez récupérer

// Récupération du Bilan2
    $retrievedBilan2 = $bilan2DAO->getById($idBilan2);

    if ($retrievedBilan2) {
        echo "Bilan2 récupéré :\n";
        echo "ID: " . $retrievedBilan2->getIdBil() . "\n";
        echo "Note dossier: " . $retrievedBilan2->getNotdossBil() . "\n";
        echo "Note entreprise: " . $retrievedBilan2->getNotorBil() . "\n";
        echo "Moyenne: " . $retrievedBilan2->getMoyBil() . "\n";
        echo "Remarque: " . $retrievedBilan2->getRemarqueBil() . "\n";
        echo "Sujet mémoire: " . $retrievedBilan2->getSujmemBil2() . "\n";
    } else {
        echo "Erreur : Aucun Bilan2 trouvé avec l'ID " . $idBilan2 . ".\n";
    }




// --- TEST : Mise à jour d'un Bilan2 ---
    echo "\nTEST: Mise à jour d'un Bilan2\n";

// Spécifiez l'ID du Bilan2 à mettre à jour
    $idBilan2 = 15; // Remplacez par l'ID du Bilan2 que vous souhaitez tester

// Récupération du Bilan2 à mettre à jour
    $retrievedBilan2 = $bilan2DAO->getById($idBilan2);

    if ($retrievedBilan2) {
        // Afficher les données actuelles avant mise à jour
        echo "Bilan2 avant mise à jour :\n";
        echo "ID: " . $retrievedBilan2->getIdBil() . "\n";
        echo "Note dossier: " . $retrievedBilan2->getNotdossBil() . "\n";
        echo "Note entreprise: " . $retrievedBilan2->getNotorBil() . "\n";
        echo "Moyenne: " . $retrievedBilan2->getMoyBil() . "\n";
        echo "Remarque: " . $retrievedBilan2->getRemarqueBil() . "\n";
        echo "Sujet mémoire: " . $retrievedBilan2->getSujmemBil2() . "\n";

        // Modification des données du Bilan2
        $retrievedBilan2->setNotdossBil(18);
        $retrievedBilan2->setRemarqueBil("Très bon");
        $retrievedBilan2->setSujmemBil2("Nouveau sujet");

        // Mise à jour dans la base de données
        if ($bilan2DAO->update($retrievedBilan2)) {
            echo "Bilan2 mis à jour avec succès !\n";

            // Vérification des nouvelles données
            $updatedBilan2 = $bilan2DAO->getById($idBilan2);
            if ($updatedBilan2) {
                echo "Bilan2 après mise à jour :\n";
                echo "ID: " . $updatedBilan2->getIdBil() . "\n";
                echo "Nouvelle Note dossier: " . $updatedBilan2->getNotdossBil() . "\n";
                echo "Nouvelle Remarque: " . $updatedBilan2->getRemarqueBil() . "\n";
                echo "Nouveau Sujet mémoire: " . $updatedBilan2->getSujmemBil2() . "\n";
            }
        } else {
            echo "Erreur : La mise à jour du Bilan2 a échoué.\n";
        }
    } else {
        echo "Erreur : Aucun Bilan2 trouvé avec l'ID " . $idBilan2 . ".\n";
    }




// --- TEST : Suppression d'un Bilan2 ---
    echo "\nTEST: Suppression d'un Bilan2\n";

// Spécifiez l'ID du Bilan2 à supprimer
    $idToDelete = 16; // Remplacez par l'ID du Bilan2 que vous souhaitez supprimer

// Suppression du Bilan2
    if ($bilan2DAO->delete($idToDelete)) {
        echo "Bilan2 supprimé avec succès !\n";

        // Vérification de la suppression
        $deletedBilan2 = $bilan2DAO->getById($idToDelete);
        if ($deletedBilan2) {
            echo "Erreur : Le Bilan2 n'a pas été supprimé.\n";
        } else {
            echo "Le Bilan2 a bien été supprimé.\n";
        }
    } else {
        echo "Erreur : échec de la suppression du Bilan2.\n";
    }

*/

// --- TEST : Récupération de tous les Bilan1 ---
    echo "\nTEST: Récupération de tous les Bilan1\n";
    $bilans1 = $bilan1DAO->getAll();
    foreach ($bilans1 as $bilan1) {
        echo "ID: " . $bilan1->getIdBil() . " - Note entreprise: " . $bilan1->getNotentBil() . "\n";
    }

// --- TEST : Récupération de tous les Bilan2 ---
    echo "\nTEST: Récupération de tous les Bilan2\n";
    $bilans2 = $bilan2DAO->getAll();
    foreach ($bilans2 as $bilan2) {
        echo "ID: " . $bilan2->getIdBil() . " - Note dossier: " . $bilan2->getNotdossBil() . "\n";
    }






} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
