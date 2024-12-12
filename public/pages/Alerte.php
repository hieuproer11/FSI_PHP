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
$alerteDAO = new AlerteDAO($conn);

// Récupération des bilans
$bilans1 = $bilan1DAO->getAll();
$bilans2 = $bilan2DAO->getAll();

// Récupération des alertes (qui contiennent les dates limites)
$alertes = $alerteDAO->getAll();

// Fonction pour vérifier les alertes sur les bilans
function verifierAlertes($bilans1, $bilans2, $alertes) {
    $alertesResult = [];
    $dateCourante = date('Y-m-d');

    // Vérification des alertes pour les bilans 1
    foreach ($bilans1 as $bilan1) {
        foreach ($alertes as $alerte) {
            // Alerte pour Bilan 1
            $alerteBilan1 = [];
            if (strtotime($bilan1->getDatevisiteBil()) < strtotime($dateCourante)) {
                $alerteBilan1 = [
                    'date_visite_bilan_1' => $bilan1->getDatevisiteBil(),
                    'date_limite_bilan_1' => $alerte->getDatelimbil1Al(),
                    'alerte' => "La date de visite entreprise pour le Bilan 1 (ID : " . $bilan1->getIdBil() . ") est en retard."
                ];
            }
            if ($bilan1->getNotentBil() === null && strtotime($alerte->getDatelimbil1Al()) < strtotime($dateCourante)) {
                $alerteBilan1 = [
                    'date_visite_bilan_1' => $bilan1->getDatevisiteBil(),
                    'date_limite_bilan_1' => $alerte->getDatelimbil1Al(),
                    'alerte' => "La note de Bilan 1 (ID : " . $bilan1->getIdBil() . ") est non renseignée."
                ];
            }

            // Ajouter l'alerte pour le Bilan 1 si elle existe
            if (!empty($alerteBilan1)) {
                $alertesResult[] = $alerteBilan1;
            }
        }
    }

    // Vérification des alertes pour les bilans 2
    foreach ($bilans2 as $bilan2) {
        foreach ($alertes as $alerte) {
            // Alerte pour Bilan 2
            $alerteBilan2 = [];
            if (empty($bilan2->getSujmemBil2())) {
                $alerteBilan2 = [
                    'date_visite_bilan_2' => $bilan2->getDatevisiteBil(),
                    'date_limite_bilan_2' => $alerte->getDatelimbil2Al(),
                    'alerte' => "Le sujet de mémoire est manquant pour le Bilan 2 (ID : " . $bilan2->getIdBil() . ")."
                ];
            }
            if ($bilan2->getNotdossBil() === null && strtotime($alerte->getDatelimbil2Al()) < strtotime($dateCourante)) {
                $alerteBilan2 = [
                    'date_visite_bilan_2' => $bilan2->getDatevisiteBil(),
                    'date_limite_bilan_2' => $alerte->getDatelimbil2Al(),
                    'alerte' => "La note de Bilan 2 (ID : " . $bilan2->getIdBil() . ") est non renseignée."
                ];
            }

            // Ajouter l'alerte pour le Bilan 2 si elle existe
            if (!empty($alerteBilan2)) {
                $alertesResult[] = $alerteBilan2;
            }
        }
    }

    return $alertesResult;
}

$alertesFinales = verifierAlertes($bilans1, $bilans2, $alertes);
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
                    <th>Date de visite Bilan 1</th>
                    <th>Date limite Bilan 1</th>
                    <th>Date de visite Bilan 2</th>
                    <th>Date limite Bilan 2</th>
                    <th>Type d'alerte</th>
                </tr>
                </thead>
                <tbody>
                <?php if (empty($alertesFinales)): ?>
                    <tr>
                        <td colspan="5">Aucune alerte pour le moment.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($alertesFinales as $alerte): ?>
                        <tr>
                            <td><?php echo !empty($alerte['date_visite_bilan_1']) ? htmlspecialchars($alerte['date_visite_bilan_1']) : ''; ?></td>
                            <td><?php echo !empty($alerte['date_limite_bilan_1']) ? htmlspecialchars($alerte['date_limite_bilan_1']) : ''; ?></td>
                            <td><?php echo !empty($alerte['date_visite_bilan_2']) ? htmlspecialchars($alerte['date_visite_bilan_2']) : ''; ?></td>
                            <td><?php echo !empty($alerte['date_limite_bilan_2']) ? htmlspecialchars($alerte['date_limite_bilan_2']) : ''; ?></td>
                            <td><?php echo htmlspecialchars($alerte['alerte']); ?></td>
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
