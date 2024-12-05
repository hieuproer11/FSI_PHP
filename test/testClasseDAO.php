<?php

require_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Classe.php'; // Inclure le fichier du BO
require_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\ClasseDAO.php'; // Inclure le fichier du DAO
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données

use BO\Classe;
use DAO\ClasseDAO;

try {
    // Connexion à la base de données
    $conn = ConnexionBDD();

    // === Tests pour Classe ===
    echo "=== Tests pour Classe ===\n";
    $classeDAO = new ClasseDAO($conn);

    // --- TEST : Création d'une Classe ---
    echo "\nTEST: Création d'une Classe\n";
    $classe = new Classe(16, "Test16");
    $classeDAO->create($classe);
    echo "Classe créée : " . $classe->getNomCla() . "\n";


    // --- TEST : Lecture d'une Classe par ID ---
    echo "\nTEST: Lecture d'une Classe par ID\n";
    $idClasse = 16; // Remplacez par l'ID de la classe que vous souhaitez récupérer
    $retrievedClasse = $classeDAO->getById($idClasse);

    if ($retrievedClasse) {
        echo "Classe récupérée : \n";
        echo "ID: " . $retrievedClasse->getIdCla() . "\n";
        echo "Nom: " . $retrievedClasse->getNomCla() . "\n";
    } else {
        echo "Erreur : Aucun classe trouvé avec l'ID " . $idClasse . ".\n";
    }

    // --- TEST : Mise à jour d'une Classe ---
    echo "\nTEST: Mise à jour d'une Classe\n";

    // Récupération de la Classe à mettre à jour
    $retrievedClasse = $classeDAO->getById($idClasse);

    if ($retrievedClasse) {
        // Afficher les données actuelles avant mise à jour
        echo "Classe avant mise à jour :\n";
        echo "ID: " . $retrievedClasse->getIdCla() . "\n";
        echo "Nom: " . $retrievedClasse->getNomCla() . "\n";

        // Modifier les données de la Classe
        $retrievedClasse->setNomCla("Informatique");

        // Mise à jour dans la base de données
        if ($classeDAO->update($retrievedClasse)) {
            echo "Mise à jour effectuée avec succès !\n";

            // Vérification des nouvelles données
            $updatedClasse = $classeDAO->getById($idClasse);
            if ($updatedClasse) {
                echo "Classe après mise à jour :\n";
                echo "ID: " . $updatedClasse->getIdCla() . "\n";
                echo "Nouveau nom: " . $updatedClasse->getNomCla() . "\n";
            } else {
                echo "Erreur : Impossible de récupérer les données après la mise à jour.\n";
            }
        } else {
            echo "Erreur : La mise à jour de la classe a échoué.\n";
        }
    } else {
        echo "Erreur : Aucun classe trouvé avec l'ID $idClasse.\n";
    }

    // --- TEST : Suppression d'une Classe ---
    echo "\nTEST: Suppression d'une Classe\n";

    // Suppression de la Classe
    if ($classeDAO->delete($idClasse)) {
        echo "Classe supprimée avec succès !\n";

        // Vérification de la suppression
        $deletedClasse = $classeDAO->getById($idClasse);
        if ($deletedClasse) {
            echo "Erreur : La classe n'a pas été supprimée.\n";
        } else {
            echo "La classe a bien été supprimée.\n";
        }
    } else {
        echo "Erreur : échec de la suppression de la classe.\n";
    }


    // --- TEST : Récupération de toutes les Classes ---
    echo "\nTEST: Récupération de toutes les Classes\n";
    $classes = $classeDAO->getAll();
    foreach ($classes as $classe) {
        echo "ID: " . $classe->getIdCla() . " - Nom: " . $classe->getNomCla() . "\n";
    }



} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
