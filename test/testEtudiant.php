<?php
require_once __DIR__ . '/../src/Model/DAO/UtilisateurDAO.php';
require_once __DIR__ . '/../src/Model/BO/Utilisateur.php';
require_once __DIR__ . '/../src/Model/BO/Etudiant.php';
require_once __DIR__ . '/../src/Model/BO/Bilan1.php';
require_once __DIR__ . '/../src/Model/BO/Bilan2.php';
require_once __DIR__ . '/../src/Model/BO/Entreprise.php';
require_once __DIR__ . '/../src/Model/BO/Specialite.php';
require_once __DIR__ . '/../src/Model/BO/Classe.php';
require_once __DIR__ . '/../src/Model/DAO/EtudiantDAO.php';
require_once __DIR__ . '/../src/Model/bddManager.php';

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de UtilisateurDAO
    $etudiantDAO = new DAO\EtudiantDAO($conn);

    echo "\nTEST: Récupération d'un utilisateur par ID\n";
    $idEtu = 2; // Remplacer par un ID valide
    $etudiantRecupere = $etudiantDAO->getById($idEtu);
    if ($etudiantRecupere) {
        echo "Utilisateur récupéré :\n";
        echo "ID: " . $etudiantRecupere->getIdUti() . " | Nom: " . $etudiantRecupere->getNomUti() .  " | Date Limite: " . $etudiantRecupere->getBilan1()->getDatelimiteBil() . " | Note oral: " . $etudiantRecupere->getBilan1()->getNotorBil() . "\n";
    } else {
        echo "Erreur : Utilisateur avec l'ID " . $idEtu . " non trouvé.\n";
    }
    var_dump($etudiantRecupere);



/*
    echo "\nTEST: Mise à jour d'un tuteur\n";
    $idEtu = 1; // Remplacer par un ID valide
    $etudiantAUpdater = $etudiantDAO->getById($idEtu);

    if ($etudiantAUpdater) {
        // Afficher les données actuelles avant mise à jour
        echo "Etudiant avant mise à jour :\n";
        echo "ID: " . $etudiantAUpdater->getIdUti() . " | Prénom: " . $etudiantAUpdater->getPreUti() . " | Nom: " . $etudiantAUpdater->getNomUti() . " | Téléphone: " . $etudiantAUpdater->getTelUti() . " | Mail: " . $etudiantAUpdater->getMailUti() . "\n";

        // Modifier les données
        $etudiantAUpdater->setPreUti("Pauline");
        $etudiantAUpdater->setNomUti("Wazowski");
        $etudiantAUpdater ->getEntreprise()->setNomEnt("Uber");
        $etudiantAUpdater->getEntreprise()->setAdrEnt("Silicon Valley");

        // Mettre à jour dans la base de données
        $etudiantDAO->update($etudiantAUpdater);
        echo "Mise à jour effectuée avec succès !\n";

        // Vérification après mise à jour
        $etudiantMiseAJour = $etudiantDAO->getById($idEtu);
        var_dump($etudiantMiseAJour);
        if ($etudiantMiseAJour) {
            echo "Tuteur après mise à jour :\n";
            echo "ID: " . $etudiantMiseAJour->getIdUti() . " | Prénom: " . $etudiantMiseAJour->getPreUti() . " | Nom: " . $etudiantMiseAJour->getNomUti() . " | Téléphone: " . $etudiantMiseAJour->getTelUti() . " | Mail: " . $etudiantMiseAJour->getMailUti() . "\n";
        } else {
            echo "Erreur : Impossible de récupérer les données après mise à jour.\n";
        }
    } else {
        echo "Erreur : Tuteur avec l'ID $idEtu non trouvé.\n";
    }
*/
/*
    $allEtudiants = $etudiantDAO->getAll();
    if (!empty($allEtudiants)) {
        foreach ($allEtudiants as $etudiant) {
            echo "ID: " . $etudiant->getIdUti() . " | Nom: " . $etudiant->getNomUti() . " | Email: " . $etudiant->getMailUti() . "| Specialite: ". $etudiant->getSpecialite()->getNomSpe     () . " | Date Limite: " . $etudiant->getBilan1()->getDatelimiteBil(); "\n";
        }
        var_dump($etudiant);
    } else {
        echo "Aucun utilisateur trouvé.\n";
    }
*/
}catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}