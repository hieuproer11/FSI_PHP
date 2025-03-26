<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Realisation2.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan2DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Realisation2DAO.php';

use BO\Bilan2;
use DAO\Bilan2DAO;
use DAO\Realisation2DAO;
use BO\Realisation2;

$conn = ConnexionBDD();
if (!$conn) {
    die('Échec de la connexion à la base de données');
}

$bilan2DAO = new Bilan2DAO($conn);
$idUti = isset($_GET['idUti']) ? $_GET['idUti'] : 0;
$idBil = isset($_GET['idBil']) ? $_GET['idBil'] : 0;

// Récupérer les données du bilan existant
$bilanExistant = null;

if ($idBil > 0) {
    $bilanExistant = $bilan2DAO->getById($idBil);

}

// Traitement de la modification
if (isset($_POST['update'])) {
    if(isset($_POST['note-dossier']) && isset($_POST['note-oral']) && isset($_POST['date-visite']) && isset($_POST['appreciation']) && isset($_POST['sujet-memoire'])){
        $bilanbo = new \BO\Bilan2($idBil,0,0,0,0,"","",);
        $bilanbo->setNotdossBil(floatval($_POST['note-dossier']));
        $bilanbo->setNotorBil(floatval($_POST['note-oral']));
        $bilanbo->setMoyBil(($bilanbo->getNotentBil()+ $bilanbo->getNotdossBil()+$bilanbo-> getNotorBil())/3);
        $bilanbo->setRemarqueBil($_POST['appreciation']);
        $bilanbo->setSujmemBil2($_POST['sujet-memoire']);
        $bilanbo->setDatevisiteBil($_POST['date-visite']);

        $bilan2DAO->update($bilanbo);

        // Rediriger vers la page de détail après modification
        header("Location: PageBilan2Tuteur.php?idUti=" . $idUti);
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


        <form class="info-form" method="post" action="PageModifBilan2.php?idUti=<?php echo $idUti; ?>&idBil=<?php echo $idBil; ?>">
            <div class="form-group">
                <label for="note-dossier">Note de dossier</label>
                <input type="number" id="note-dossier" name="note-dossier" step="0.01" min="0" max="20" value="<?php echo $bilanExistant ? $bilanExistant->getNotdossBil() : ''; ?>">
            </div>

            <div class="form-group">
                <label for="note-oral">Note d'oral</label>
                <input type="number" id="note-oral" name="note-oral" step="0.01" min="0" max="20" value="<?php echo $bilanExistant ? $bilanExistant->getNotorBil() : ''; ?>">
            </div>

            <div class="form-group">
                <label for="date-visite">Date de visite</label>
                <input type="date" id="date-visite" name="date-visite" value="<?php echo $bilanExistant ? $bilanExistant->getDatevisiteBil() : ''; ?>">
            </div>

            <div class="form-group">
                <label for="appreciation">Appréciation</label>
                <textarea id="appreciation" name="appreciation" rows="4" style="width: 100%; border-radius: 10px; padding: 10px; border: 1px solid #ddd;"><?php echo $bilanExistant ? $bilanExistant->getRemarqueBil() : ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="sujet-memoire">Sujet de mémoire</label>
                <input type="text" id="sujet-memoire" name="sujet-memoire" value="<?php echo $bilanExistant ? $bilanExistant->getSujmemBil2() : ''; ?>">

                <div style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
                    <input type="submit" value="Modifier" class="btnvert" name="update" id="update">
                    <input type="button" value="Retour" class="btngris" onclick="window.location.href='PageBilan2Tuteur.php?idUti=<?php echo $idUti; ?>'">
                </div>
        </form>
    </div>
</div>
</body>
</html>