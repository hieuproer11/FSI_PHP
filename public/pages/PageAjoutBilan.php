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
<?php include('../pages/SidebarTuteur_Admin.php'); ?>

    <div class="content-card">
        <h2>Ajouter des notes</h2>

        <!--<form class="info-form" method="post" action="PageBilan1Tuteur.php?idUti=1">-->
            <form class="info-form" method="post" action="PageAjoutBilan.php">

            <div class="form-group">
                <label for="note-dossier">Note de dossier</label>
                <input type="number" id="note-dossier" name="note-dossier" min="0" max="20">
            </div>

            <div class="form-group">
                <label for="note-oral">Note d'oral</label>
                <input type="number" id="note-oral" name="note-oral" min="0" max="20">
            </div>

            <div class="form-group">
                <label for="note-entreprise">Note de l'entreprise</label>
                <input type="number" id="note-entreprise" name="note-entreprise" min="0" max="20">
            </div>

            <div class="form-group">
                <label for="date-visite">Date de visite</label>
                <input type="date" id="date-visite" name="date-visite">
            </div>

            <div class="form-group">
                <label for="appreciation">Appréciation</label>
                <textarea id="appreciation" name="appreciation" rows="4" style="width: 100%; border-radius: 10px; padding: 10px; border: 1px solid #ddd;"></textarea>
            </div>

            <div style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">

                <input type="submit" value="Ajouter" class="btnvert" name="add" id="add">
                <input type="submit" value="Retour" class="btngris" name="back">

            </div>
        </form>
        <?php
        include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
        include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan.php';
        include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php';

        use BO\Bilan1;
        use DAO\Bilan1DAO;


        $conn = ConnexionBDD();
        if (!$conn) {
            die('Échec de la connexion à la base de données');
        }

        $bilan1DAO = new Bilan1DAO($conn);
        $liéDAO = new RealiserDAO($conn);
        $liébo =new Realiser();
        $idetu = $_GET['idUti'];



        if(isset($_POST['add'])){
            $bilanbo = new Bilan1(0,0,0,0,0,"","",);
            $bilanbo->setNotentBil(floatval($_POST['note-entreprise']));
            $bilanbo->setNotdossBil(floatval($_POST['note-dossier']));
            $bilanbo->setNotorBil(floatval($_POST['note-oral']));
            $bilanbo->setRemarqueBil($_POST['appreciation']);
            $bilanbo->setDatevisiteBil($_POST['date-visite']);
            $bilanbo->setMoyBil(($bilanbo->getNotentBil()+ $bilanbo->getNotdossBil()+$bilanbo-> getNotorBil())/3);
            $bilan1DAO->create($bilanbo);
        }
        $liébo->setIdUti($idetu);
        $liébo->setIdBil1($idetu);
        $liéDAO->create($liébo);
        ?>
    </div>
