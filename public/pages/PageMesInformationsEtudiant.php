<?php
require_once __DIR__ . '/../../src/Model/bddManager.php';
require_once __DIR__ . '/../../src/Model/BO/Utilisateur.php';
require_once __DIR__ . '/../../src/Model/DAO/UtilisateurDAO.php';
require_once __DIR__ . '/../../src/Model/BO/Etudiant.php';
require_once __DIR__ . '/../../src/Model/DAO/EtudiantDAO.php';
require_once __DIR__ . '/../../src/Model/BO/Entreprise.php';
require_once __DIR__ . '/../../src/Model/DAO/EntrepriseDAO.php';
require_once __DIR__ . '/../../src/Model/BO/TypeUtilisateur.php';
require_once __DIR__ . '/../../src/Model/DAO/TypeUtilisateurDAO.php';

use DAO\TypeUtilisateurDAO;
use DAO\EtudiantDAO;
use BO\Etudiant;
session_start();
if (!isset($_SESSION['idUti'])) {
    /* Empêcher le cache du navigateur
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    */
    // Redirige vers la page de connexion
    header("Location: PageConnexion.php");
    exit();
}

$id_session=$_SESSION['idUti'];

$conn = ConnexionBDD();
$etudiantDAO = new EtudiantDAO($conn);
$typeUti = new TypeUtilisateurDAO($conn);
$Etu = $etudiantDAO->getById($id_session);


//(int)$_GET['idUti']
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Informations Etudiant</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php include('../pages/HeaderEleve.php'); ?>
<div class = "container">
    <?php include('../pages/SidebarEleve.php'); ?>
    <div class="main-content">
        <div class="content-card informations-eleve">
            <h2>Informations élève</h2>
            <form method="post" action="../../src/traitModifEtu.php">

                    <input type="hidden" name = "idUti" value="<?php echo $Etu->getIdUti(); ?>">

                <div class="form-group">
                    <input required  type="text" name = "preUti" value="<?php echo $Etu->getPreUti(); ?>">
                </div>

                <div class="form-group">
                    <input required  type="text" name = "nomUti" value="<?php echo $Etu->getNomUti(); ?>">
                </div>

                <div class="form-group">
                    <input required  type="text" name = "adrUti" value="<?php echo $Etu->getAdrUti(); ?>">
                </div>

                <div class="form-group">
                    <input required  type="email" name = "mailUti" value="<?php echo $Etu->getMailUti(); ?>">
                </div>

                <div class="form-group">
                    <input required  type="number" name = "telUti" value="<?php echo $Etu->getTelUti(); ?>">
                </div>

                <div class="form-group">
                    <input required  type="text" name = "nomEnt" value="<?php echo $Etu->getEntreprise()->getNomEnt();?>">
                </div>

                <div class="form-group">
                    <input required  type="text" name = "adrEnt" value="<?php echo $Etu->getEntreprise()->getAdrEnt();?>">
                </div>

                <div class="form-group">
                    <input required  type="text" name = "altUti" value="<?php echo $Etu->getAltUti();?>">
                </div>

                <button type="submit" class="submit-btn">Modifier</button>
            </form>
        </div>
    </div>
</div>
</body>
