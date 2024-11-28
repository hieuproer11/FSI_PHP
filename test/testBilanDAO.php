<?php
// Inclure la connexion et les DAOs de Bilan1 et Bilan2
use DAO\Bilan1DAO;
use DAO\Bilan2DAO;

use BO\Bilan1;
use BO\Bilan2;


include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan2DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan1.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan2.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';

// Connexion à la base de données
$conn = ConnexionBDD();

// Création des instances des DAOs
$bilan1DAO = new Bilan1DAO($conn);
$bilan2DAO = new Bilan2DAO($conn);

/* // 1. Test de création d'un Bilan1
echo "Test de la création d'un Bilan1 :\n";
$bilan1 = new Bilan1(4, 15.50, 18.30, 17.00, 16.20, "Bon bilan", '2024-11-10');
$createdBilan1 = $bilan1DAO->create($bilan1);
if ($createdBilan1) {
    echo "Bilan1 créé avec succès.\n";
} else {
    echo "Échec de la création du Bilan1.\n";
}


// 2. Test de création d'un Bilan2
echo "\nTest de la création d'un Bilan2 :\n";
$bilan2 = new Bilan2(8, 14.50, 16.30, 15.60, "Bon bilan 2", "Sujet 1", '2024-11-15');
$createdBilan2 = $bilan2DAO->create($bilan2);
if ($createdBilan2) {
    echo "Bilan2 créé avec succès.\n";
} else {
    echo "Échec de la création du Bilan2.\n";
}

// 3. Test de lecture d'un Bilan1 par ID
echo "\nTest de la lecture d'un Bilan1 par ID :\n";
$bilan1ToRead = $bilan1DAO->read(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($bilan1ToRead) {
    echo "Bilan1 lu : " . $bilan1ToRead->getIdBil1() . ", " . $bilan1ToRead->getNotentBil1() . ", " . $bilan1ToRead->getDatevisiteBil1() . "\n";
} else {
    echo "Bilan1 non trouvé.\n";
}

// 4. Test de lecture d'un Bilan2 par ID
echo "\nTest de la lecture d'un Bilan2 par ID :\n";
$bilan2ToRead = $bilan2DAO->read(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($bilan2ToRead) {
    echo "Bilan2 lu : " . $bilan2ToRead->getIdBil2() . ", " . $bilan2ToRead->getNotdossBil2() . ", " . $bilan2ToRead->getSujmemBil2() . "\n";
} else {
    echo "Bilan2 non trouvé.\n";
}

// 5. Test de mise à jour d'un Bilan1
echo "\nTest de la mise à jour d'un Bilan1 :\n";
$bilan1ToUpdate = $bilan1DAO->read(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($bilan1ToUpdate) {
    $bilan1ToUpdate->setNotentBil1(17.50);
    $bilan1ToUpdate->setMoyBil1(18.00);
    $updatedBilan1 = $bilan1DAO->update($bilan1ToUpdate);
    if ($updatedBilan1) {
        echo "Bilan1 mis à jour avec succès.\n";
    } else {
        echo "Échec de la mise à jour du Bilan1.\n";
    }
} else {
    echo "Bilan1 non trouvé pour mise à jour.\n";
}

// 6. Test de mise à jour d'un Bilan2
echo "\nTest de la mise à jour d'un Bilan2 :\n";
$bilan2ToUpdate = $bilan2DAO->read(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($bilan2ToUpdate) {
    $bilan2ToUpdate->setNotdossBil2(17.00);
    $bilan2ToUpdate->setNotorBil2(16.80);
    $updatedBilan2 = $bilan2DAO->update($bilan2ToUpdate);
    if ($updatedBilan2) {
        echo "Bilan2 mis à jour avec succès.\n";
    } else {
        echo "Échec de la mise à jour du Bilan2.\n";
    }
} else {
    echo "Bilan2 non trouvé pour mise à jour.\n";
}

// 7. Test de suppression d'un Bilan1
echo "\nTest de la suppression d'un Bilan1 :\n";
$deletedBilan1 = $bilan1DAO->delete(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($deletedBilan1) {
    echo "Bilan1 supprimé avec succès.\n";
} else {
    echo "Échec de la suppression du Bilan1.\n";
}

// 8. Test de suppression d'un Bilan2
echo "\nTest de la suppression d'un Bilan2 :\n";
$deletedBilan2 = $bilan2DAO->delete(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($deletedBilan2) {
    echo "Bilan2 supprimé avec succès.\n";
} else {
    echo "Échec de la suppression du Bilan2.\n";
}
*/


// 9. Test de récupération de tous les Bilans1
echo "\nTest de la récupération de tous les Bilans1 :\n";
$bilans1 = $bilan1DAO->findAll();
if (count($bilans1) > 0) {
    echo "Bilans1 trouvés :\n";
    foreach ($bilans1 as $bilan1) {
        echo $bilan1->getIdBil() . ", " . $bilan1->getNotentBil() . ", " . $bilan1->getDatevisiteBil() . "\n";
    }
} else {
    echo "Aucun Bilan1 trouvé.\n";
}

// 10. Test de récupération de tous les Bilans2
echo "\nTest de la récupération de tous les Bilans2 :\n";
$bilans2 = $bilan2DAO->findAll();
if (count($bilans2) > 0) {
    echo "Bilans2 trouvés :\n";
    foreach ($bilans2 as $bilan2) {
        echo $bilan2->getIdBil() . ", " . $bilan2->getNotdossBil() . ", " . $bilan2->getSujmemBil2() . "\n";
    }
} else {
    echo "Aucun Bilan2 trouvé.\n";
}
