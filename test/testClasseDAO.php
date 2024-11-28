<?php

// Inclure les classes nécessaires
use DAO\ClasseDAO;
use BO\Classe;

include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\ClasseDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Classe.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données

// Créer une instance de la connexion PDO
$conn = ConnexionBDD();

// Créer une instance de ClasseDAO
$classeDAO = new ClasseDAO($conn);

// Test de la méthode create()

/* echo "Test de la méthode create :\n";
$classe = new Classe(3, "Classe A");
if ($classeDAO->create($classe)) {
    echo "Classe créée avec succès.\n";
} else {
    echo "Échec de la création de la classe.\n";
}
// Test de la méthode read()
echo "\nTest de la méthode read :\n";
$retrievedClasse = $classeDAO->read(1); // ID à tester
if ($retrievedClasse) {
    echo "Classe récupérée avec succès :\n";
    echo "ID : " . $retrievedClasse->getIdCla() . "\n";
    echo "Nom : " . $retrievedClasse->getNomCla() . "\n";
} else {
    echo "Aucune classe trouvée avec cet ID.\n";
}
// Test de la méthode update()
echo "\nTest de la méthode update :\n";
if ($retrievedClasse) {
    $retrievedClasse->setNomCla("Classe A Modifiée");
    if ($classeDAO->update($retrievedClasse)) {
        echo "Classe mise à jour avec succès.\n";
    } else {
        echo "Échec de la mise à jour de la classe.\n";
    }
} else {
    echo "Impossible de tester la mise à jour : classe non trouvée.\n";
}
// Test de la méthode delete()
echo "\nTest de la méthode delete :\n";
if ($classeDAO->delete(1)) {
    echo "Classe supprimée avec succès.\n";
} else {
    echo "Échec de la suppression de la classe.\n";
}
*/

// Test de la méthode findAll()
echo "\nTest de la méthode findAll :\n";
$allClasses = $classeDAO->findAll();
if (!empty($allClasses)) {
    echo "Toutes les classes récupérées avec succès :\n";
    foreach ($allClasses as $class) {
        echo "ID : " . $class->getIdCla() . " - ";
        echo "Nom : " . $class->getNomCla() . "\n";
    }
} else {
    echo "Aucune classe trouvée.\n";
}