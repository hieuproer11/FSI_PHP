<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Etudiant.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Tuteur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\TuteurDAO.php';

use DAO\EtudiantDAO;
use DAO\TuteurDAO;
session_start();
$id_session=$_SESSION['idUti'];

$conn = ConnexionBDD();
$tuteurDAO = new TuteurDAO($conn);
if (!isset($_GET['idTut'])) {
    die("ID tuteur manquant !");
}
$id_tuteur = intval($_GET['idTut']);
$tuteur = $tuteurDAO->getById($id_tuteur);
if (!$tuteur) {
    die("Tuteur introuvable !");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un tuteur</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class = "container">
    <?php include('../pages/SidebarTuteur_Admin.php'); ?>
    <div class="main-content">
        <div class="content-card informations-eleve">
            <h2>Modifier le tuteur</h2>
            <form method="post" action="../../src/traitModifTut.php">

                <input type="hidden" name = "idTut" value="<?php echo $tuteur->getIdTut(); ?>">

                <div class="form-group">
                    <input required  type="text" name = "preTut" value="<?php echo $tuteur->getPreTut(); ?>">
                </div>

                <div class="form-group">
                    <input required  type="text" name = "nomTut" value="<?php echo $tuteur->getNomTut(); ?>">
                </div>

                <div class="form-group">
                    <input required  type="number" name = "telTut" value="<?php echo $tuteur->getTelTut(); ?>">
                </div>
                <div class="form-group">
                    <input required  type="email" name = "mailTut" value="<?php echo $tuteur->getMailTut(); ?>">
                </div>
                <button type="submit" class="submit-btn">Modifier</button>
            </form>
        </div>
    </div>
</div>
</body>

