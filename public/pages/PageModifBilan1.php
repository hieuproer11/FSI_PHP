<?php
require_once __DIR__ . '/../../src/Model/bddManager.php';
require_once __DIR__ . '/../../src/Model/BO/Bilan.php';
require_once __DIR__ . '/../../src/Model/BO/Realisation1.php';
require_once __DIR__ . '/../../src/Model/DAO/Bilan1DAO.php';
require_once __DIR__ . '/../../src/Model/DAO/Realisation1DAO.php';

use BO\Bilan1;
use DAO\Bilan1DAO;
use DAO\Realisation1DAO;
use BO\Realisation1;

$conn = ConnexionBDD();
if (!$conn) {
    die('Échec de la connexion à la base de données');
}

$bilan1DAO = new Bilan1DAO($conn);
$idUti = isset($_GET['idUti']) ? $_GET['idUti'] : 0;
$idBil = isset($_GET['idBil']) ? $_GET['idBil'] : 0;

// Récupérer les données du bilan existant
$bilanExistant = null;

if ($idBil > 0) {
    $bilanExistant = $bilan1DAO->getById($idBil);

}

// Traitement de la modification
if (isset($_POST['update'])) {
    if (isset($_POST['note-dossier']) && isset($_POST['note-oral']) && isset($_POST['note-entreprise']) && isset($_POST['date-visite']) && isset($_POST['appreciation'])) {
        $bilanbo = new Bilan1($idBil, 0, 0, 0, 0, "", "");
        $bilanbo->setNotentBil(floatval($_POST['note-entreprise']));
        $bilanbo->setNotdossBil(floatval($_POST['note-dossier']));
        $bilanbo->setNotorBil(floatval($_POST['note-oral']));
        $bilanbo->setRemarqueBil($_POST['appreciation']);
        $bilanbo->setDatevisiteBil($_POST['date-visite']);
        $bilanbo->setMoyBil(($bilanbo->getNotentBil() + $bilanbo->getNotdossBil() + $bilanbo->getNotorBil()) / 3);

        $bilan1DAO->update($bilanbo);

        header("Location: PageBilan1Tuteur.php?idUti=" . $idUti);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le bilan</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <?php include('../pages/SidebarTuteur.php'); ?>

    <div class="content-card">
        <h2>Modifier le bilan</h2>


        <form class="info-form" method="post" action="PageModifBilan1.php?idUti=<?php echo $idUti; ?>&idBil=<?php echo $idBil; ?>">
            <div class="form-group">
                <label for="note-dossier">Note de dossier</label>
                <input type="number" id="note-dossier" name="note-dossier" step="0.01" min="0" max="20" value="<?php echo $bilanExistant ? $bilanExistant->getNotdossBil() : ''; ?>">
            </div>

            <div class="form-group">
                <label for="note-oral">Note d'oral</label>
                <input type="number" id="note-oral" name="note-oral" step="0.01" min="0" max="20" value="<?php echo $bilanExistant ? $bilanExistant->getNotorBil() : ''; ?>">
            </div>

            <div class="form-group">
                <label for="note-entreprise">Note de l'entreprise</label>
                <input type="number" id="note-entreprise" name="note-entreprise" step="0.01" min="0" max="20" value="<?php echo $bilanExistant ? $bilanExistant->getNotentBil() : ''; ?>">
            </div>

            <div class="form-group">
                <label for="date-visite">Date de visite</label>
                <input type="date" id="date-visite" name="date-visite" value="<?php echo $bilanExistant ? $bilanExistant->getDatevisiteBil() : ''; ?>">
            </div>

            <div class="form-group">
                <label for="appreciation">Appréciation</label>
                <textarea id="appreciation" name="appreciation" rows="4" style="width: 100%; border-radius: 10px; padding: 10px; border: 1px solid #ddd;"><?php echo $bilanExistant ? $bilanExistant->getRemarqueBil() : ''; ?></textarea>
            </div>

            <div style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
                <input type="submit" value="Modifier" class="btnvert" name="update" id="update">
                <input type="button" value="Retour" class="btngris" onclick="window.location.href='PageBilan1Tuteur.php?idUti=<?php echo $idUti; ?>'">
            </div>
        </form>
    </div>
</div>
</body>
</html>