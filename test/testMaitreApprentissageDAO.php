<?php
use DAO\MaitreApprentissageDAO;
use BO\MaitreApprentissage;
use BO\Entreprise;
use DAO\EntrepriseDAO;
// Inclure la connexion et le DAO de Entreprise
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\MaitreApprentissageDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\MaitreApprentissage.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';

// Connexion à la base de données
$conn = ConnexionBDD();
// Création de l'instance du DAO Maitre Entreprise
$maitreAppDAO = new MaitreApprentissageDAO($conn);
echo "<br>Test de la création d'un Maitre : <br>";
$maitreApp = new MaitreApprentissage(3, 'Tran', 'Hieu', 'tranquanghieustudent@gmail.com', '0667075123', 0);
$createdMaitre = $maitreAppDAO->create($maitreApp);
if ($createdMaitre) {
    echo "Maitre Entreprise créée avec succès : " . $createdMaitre->getNom() . "\n";
} else {
    echo "Échec de la création de la maitre apprentissage.\n";
}

//  Test de récupération de toutes les Entreprises
echo "\nTest de la récupération de toutes les Entreprises :\n";
$maitreApps = $maitreAppDAO->findAll();
if (count($maitreApps) > 0) {
    echo "Entreprises trouvées :\n";
    foreach ($maitreApps as $maitreApp) {
        echo $maitreApp->getNomMaitapp() . ", " . $maitreApp->getPreMaitapp() . "\n";
    }
} else {
    echo "Aucune Entreprise trouvée.\n";
}


