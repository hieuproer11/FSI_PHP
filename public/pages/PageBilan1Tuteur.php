<?php
require_once __DIR__ . '/../../src/Model/bddManager.php';
require_once __DIR__ . '/../../src/Model/BO/Bilan.php';
require_once __DIR__ . '/../../src/Model/DAO/Bilan1DAO.php';

use DAO\Bilan1DAO;


$conn = ConnexionBDD();
if (!$conn) {
    die('Échec de la connexion à la base de données');
}

$bilan1DAO = new Bilan1DAO($conn);
$idetu = $_GET['idUti'];

    $bilans = $bilan1DAO->getById($idetu);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <?php include('../pages/SidebarTuteur.php'); ?>

    <main class="main-content">
        <h2>Bilan 1</h2>
        <div class="content-card">
            <table class="students-table">
                <thead>
                <tr>
                    <th>Date de visite</th>
                    <th>Note du dossier</th>
                    <th>Note d'oral</th>
                    <th>Note de l'entreprise</th>
                    <th>Moyenne</th>
                    <th>Remarques</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($bilans): ?>
                        <tr>
                            <td><?= htmlspecialchars($bilans->getDatevisiteBil()) ?></td>
                            <td><?= htmlspecialchars($bilans->getNotdossBil()) ?></td>
                            <td><?= htmlspecialchars($bilans->getNotorBil()) ?></td>
                            <td><?= htmlspecialchars($bilans->getNotentBil()) ?></td>
                            <td><?= htmlspecialchars($bilans->getMoyBil()) ?></td>
                            <td><?= htmlspecialchars($bilans->getRemarqueBil()) ?></td>
                        </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucun étudiant trouvé.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
                <button type="button" class="btnvert"">
                    Bilan 1
                </button>
                <button type="button" class="btngris" onclick="window.location.href='PageBilan2Tuteur.php?idUti=<?php echo $idetu ?>'">
                    Bilan 2
                </button>
                <button type="button" class="btnvert" onclick="window.location.href='PageAjoutBilan1.php?idUti=<?php echo $idetu ?>'">
                    Ajouter
                </button>
                <button type="button" class="btngris" onclick="window.location.href='PageModifBilan1.php?idUti=<?php echo $idetu ?>&idBil=<?php echo $bilans->getIdBil(); ?>'">
                    Modifier
                </button>
            </table>
        </div>
    </main>
</div>
</body>
</html>