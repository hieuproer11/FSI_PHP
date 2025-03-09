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
            <h2>Ajouter un tuteur</h2>

            <form method="POST" action="../../src/traitAjoutTut.php">

                <div class="form-group">
                    <label for="preTut">Prénom du Tuteur :</label>
                    <input required type="text" name="preTut" id="preTut" placeholder="Exemple : Jean">
                </div>

                <div class="form-group">
                    <label for="nomTut">Nom du Tuteur :</label>
                    <input required type="text" name="nomTut" id="nomTut" placeholder="Exemple : Dupont">
                </div>

                <div class="form-group">
                    <label for="telTut">Numéro de téléphone :</label>
                    <input required type="tel" name="telTut" id="telTut" placeholder="Exemple : 0123456789" pattern="[0-9]{10}">
                </div>

                <div class="form-group">
                    <label for="mailTut">Adresse e-mail :</label>
                    <input required type="email" name="mailTut" id="mailTut" placeholder="Exemple : jean.dupont@mail.com">
                </div>

                <button type="submit" class="submit-btn">Ajouter</button>
            </form>
        </div>
    </div>
</div>
</body>
