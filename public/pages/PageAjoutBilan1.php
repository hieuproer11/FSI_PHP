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
<?php include('../pages/HeaderAdmin.php'); ?>
<div class="container">
    <?php include('../pages/SidebarAdmin.php'); ?>

    <div class="content-card">
        <h2>Ajouter des notes</h2>

        <!--<form class="info-form" method="post" action="PageBilan1Tuteur.php?idUti=1">-->
        <form class="info-form" method="post" action="PageAjoutBilan1Admin.php?idUti=<?php echo $_GET['idUti']; ?>">

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
                <input type="button" value="Retour" class="btngris" onclick="window.location.href='PageBilan1Admin.php?idUti=<?php echo $_GET['idUti']; ?>'">

            </div>
        </form>
        <?php
        include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
        include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan.php';
        include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Realisation1.php';
        include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php';
        include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Realisation1DAO.php';

        use BO\Bilan1;
        use DAO\Bilan1DAO;
        use DAO\Realisation1DAO;
        use BO\Realisation1;


        $conn = ConnexionBDD();
        if (!$conn) {
            die('Échec de la connexion à la base de données');
        }

        $bilan1DAO = new Bilan1DAO($conn);
        $realisation1DAO = new Realisation1DAO($conn);
        $idetu = $_GET['idUti'];


        if(isset($_POST['add'])){
            if(isset($_POST['note-dossier']) && isset($_POST['note-oral']) && isset($_POST['note-entreprise']) && isset($_POST['date-visite']) && isset($_POST['appreciation'])){
                $bilanbo = new Bilan1(0,0,0,0,0,"","",);
                $bilanbo->setNotentBil(floatval($_POST['note-entreprise']));
                $bilanbo->setNotdossBil(floatval($_POST['note-dossier']));
                $bilanbo->setNotorBil(floatval($_POST['note-oral']));
                $bilanbo->setRemarqueBil($_POST['appreciation']);
                $bilanbo->setDatevisiteBil($_POST['date-visite']);
                $bilanbo->setMoyBil(($bilanbo->getNotentBil()+ $bilanbo->getNotdossBil()+$bilanbo-> getNotorBil())/3);
                $bilan1DAO->create($bilanbo);

                $real = new Realisation1($bilanbo->getIdBil(), $idetu);

                $real->setIdBil1($bilanbo->getIdBil());
                $real->setIdUti($idetu);

                var_dump($real);
                ////
                ///
                /// regler le probleme d id donc recupere l id du bilan creer pour le mettre dans le create de realisation
                $realisation1DAO->create($real);
            }
        }


        ?>
    </div>