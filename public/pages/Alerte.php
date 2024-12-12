<?php
// Import des classes nécessaires
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Alerte.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\AlerteDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan2DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan.php';


use DAO\AlerteDAO;
use DAO\Bilan1DAO;
use DAO\Bilan2DAO;

// Connexion à la base de données
$conn = ConnexionBDD();
$bilan1DAO = new Bilan1DAO($conn);
$bilan2DAO = new Bilan2DAO($conn);

// Récupération des bilans
$bilans1 = $bilan1DAO->getAll();
$bilans2 = $bilan2DAO->getAll();

// Fonction pour vérifier les alertes sur les bilans
function verifierAlertes($bilans1, $bilans2) {
    $alertes = [];
    $dateCourante = date('Y-m-d');

    foreach ($bilans1 as $bilan1) {
        if (strtotime($bilan1->getDatevisiteBil()) < strtotime($dateCourante)) {
            $alertes[] = "La date de visite entreprise pour le Bilan 1 (ID : " . $bilan1->getIdBil() . ") est en retard.";
        }
        if ($bilan1->getNotentBil() === null && strtotime($bilan1->getDatelimiteBil()) < strtotime($dateCourante)) {
            $alertes[] = "La note de Bilan 1 (ID : " . $bilan1->getIdBil() . ") est non renseignée.";
        }
    }

    foreach ($bilans2 as $bilan2) {
        if (empty($bilan2->getSujmemBil2())) {
            $alertes[] = "Le sujet de mémoire est manquant pour le Bilan 2 (ID : " . $bilan2->getIdBil() . ").";
        }
        if ($bilan2->getNotdossBil() === null && strtotime($bilan2->getDatelimiteBil()) < strtotime($dateCourante)) {
            $alertes[] = "La note de Bilan 2 (ID : " . $bilan2->getIdBil() . ") est non renseignée.";
        }
    }

    return $alertes;
}

$alertes = verifierAlertes($bilans1, $bilans2);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alertes Bilans</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <?php include('../pages/SidebarTuteur_Admin.php'); ?>

    <!-- Main Content -->
    <main class="main-content">
        <h2>Liste des alertes pour les bilans</h2>
        <div class="content-card">
            <table class="alertes-table">
                <thead>
                <tr>
                    <th>Nom de l'éléve</th>
                    <th>Prénom de l'éléve</th>
                    <th>Date de visiste bilan 1</th>
                    <th>Date de visiste bilan 2</th>
                    <th>Date limite bilan 1</th>
                    <th>Date limite bilan 2</th>
                </tr>
                </thead>
                <tbody>
                <?php if (empty($alertes)): ?>
                    <tr>
                        <td>Aucune alerte pour le moment.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($alertes as $alerte): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($alerte); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
