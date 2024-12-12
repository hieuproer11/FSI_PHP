<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Utilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\UtilisateurDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Etudiant.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Entreprise.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EntrepriseDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\TypeUtilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\TypeUtilisateurDAO.php';

use DAO\TypeUtilisateurDAO;
use DAO\EtudiantDAO;
use BO\Etudiant;

$conn = ConnexionBDD();
$etudiantDAO = new EtudiantDAO($conn);
$typeUti = new TypeUtilisateurDAO($conn);
$idUti = $typeUti->getById(1);
if($idUti){
    $Etu = $etudiantDAO->getById(1);
}else{
    echo 'erreur, vous etes pas le bon utilisateur';
}
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

                    <input required type="hidden" name = "idUti" value="<?php echo $Etu->getIdUti(); ?>">

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
