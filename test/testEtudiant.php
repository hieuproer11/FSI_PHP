<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\UtilisateurDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Utilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Etudiant.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Entreprise.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';

try {
    // Créer une instance de la connexion PDO
    $conn = ConnexionBDD();

    // Créer une instance de UtilisateurDAO
    $etudiantDAO = new DAO\EtudiantDAO($conn);
/*
    echo "\nTEST: Récupération d'un utilisateur par ID\n";
    $idEtu = 1; // Remplacer par un ID valide
    $etudiantRecupere = $etudiantDAO->getById($idEtu);
    if ($etudiantRecupere) {
        echo "Utilisateur récupéré :\n";
        echo "ID: " . $etudiantRecupere->getIdUti() . " | Nom: " . $etudiantRecupere->getNomUti() . " | Email: " . $etudiantRecupere->getAdrUti() . "\n";
    } else {
        echo "Erreur : Utilisateur avec l'ID " . $idEtu . " non trouvé.\n";
    }
*/

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
}catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}