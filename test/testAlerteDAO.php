<?php

// Inclure la connexion et le DAO de Alerte
use BO\Alerte;
use DAO\AlerteDAO;

// Inclure les fichiers nécessaires
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\AlerteDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Alerte.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données

// Créer une instance de la connexion PDO
$conn = ConnexionBDD();

// Créer une instance de AlerteDAO
$alerteDAO = new DAO\AlerteDAO($conn);

// Tester la méthode create()
echo "Test de la méthode create :\n";
// Passer directement les valeurs aux setters
$alerte = new BO\Alerte();  // Utilisation d'un constructeur sans paramètres

$alerte->setIdAl('4664');
$alerte->setDatelimbil1Al('2024-11-01');
$alerte->setDatelimbil2Al('2024-12-15');

if ($alerteDAO->create($alerte)) {
    echo "Alerte créée avec succès.\n";
} else {
    echo "Échec de la création de l'alerte.\n";
}

// Tester la méthode getById()
echo "\nTest de la méthode getById :\n";
$alerteId = 1; // ID à tester, assurez-vous que l'ID existe dans la base de données
$retrievedAlerte = $alerteDAO->getById($alerteId);

if ($retrievedAlerte) {
    echo "Alerte récupérée avec succès : \n";
    echo "ID : " . $retrievedAlerte->getIdAl() . "\n";
    echo "Date limite 1 : " . $retrievedAlerte->getDatelimbil1Al() . "\n";
    echo "Date limite 2 : " . $retrievedAlerte->getDatelimbil2Al() . "\n";
} else {
    echo "Alerte non trouvée.\n";
}

// Tester la méthode update()
echo "\nTest de la méthode update :\n";
$alerteToUpdate = $retrievedAlerte;
$alerteToUpdate->setDatelimbil1Al('2025-01-01');
$alerteToUpdate->setDatelimbil2Al('2025-02-01');

if ($alerteDAO->update($alerteToUpdate)) {
    echo "Alerte mise à jour avec succès.\n";
} else {
    echo "Échec de la mise à jour de l'alerte.\n";
}

// Tester la méthode delete()
echo "\nTest de la méthode delete :\n";
$alerteIdToDelete = 1; // ID à tester, assurez-vous que l'ID existe dans la base de données
if ($alerteDAO->delete($alerteIdToDelete)) {
    echo "Alerte supprimée avec succès.\n";
} else {
    echo "Échec de la suppression de l'alerte.\n";
}

// Tester la méthode getAll()
echo "\nTest de la méthode getAll :\n";
$alertes = $alerteDAO->getAll();

if (!empty($alertes)) {
    echo "Alertes récupérées avec succès :\n";
    foreach ($alertes as $alerte) {
        echo "ID : " . $alerte->getIdAl() . " - ";
        echo "Date limite 1 : " . $alerte->getDatelimbil1Al() . " - ";
        echo "Date limite 2 : " . $alerte->getDatelimbil2Al() . "\n";
    }
} else {
    echo "Aucune alerte trouvée.\n";
}
