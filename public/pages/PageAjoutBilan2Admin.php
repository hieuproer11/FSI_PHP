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

        <!--<form class="info-form" method="post" action="Pagebilan2Tuteur.php?idUti=1">-->
        <form class="info-form" method="post" action="PageAjoutBilan2Admin.php?idUti=<?php echo $_GET['idUti']; ?>">

            <div class="form-group">
                <label for="note-dossier">Note de dossier</label>
                <input type="number" id="note-dossier" name="note-dossier" min="0" max="20">
            </div>

            <div class="form-group">
                <label for="note-oral">Note d'oral</label>
                <input type="number" id="note-oral" name="note-oral" min="0" max="20">
            </div>

            <div class="form-group">
                <label for="date-visite">Date de visite</label>
                <input type="date" id="date-visite" name="date-visite">
            </div>

            <div class="form-group">
                <label for="appreciation">Appréciation</label>
                <textarea id="appreciation" name="appreciation" rows="4" style="width: 100%; border-radius: 10px; padding: 10px; border: 1px solid #ddd;"></textarea>
            </div>

            <div class="form-group">
                <label for="sujet-memoire">Sujet de mémoire</label>
                <input type="text" id="sujet-memoire" name="sujet-memoire">

                <div style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">

                    <input type="submit" value="Ajouter" class="btnvert" name="add" id="add">
                    <input type="button" value="Retour" class="btngris" onclick="window.location.href='PageBilan2Admin.php?idUti=<?php echo $_GET['idUti']; ?>'">
                </div>
        </form>
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

        $bilan2DAO = new bilan2DAO($conn);
        $Realisation2DAO = new Realisation2DAO($conn);
        $idetu = $_GET['idUti'];


        if(isset($_POST['add'])){
            if(isset($_POST['note-dossier']) && isset($_POST['note-oral']) && isset($_POST['date-visite']) && isset($_POST['appreciation']) && isset($_POST['sujet-memoire'])){
                $bilanbo = new \BO\Bilan2(0,0,0,0,0,"","",);
                $bilanbo->setNotdossBil(floatval($_POST['note-dossier']));
                $bilanbo->setNotorBil(floatval($_POST['note-oral']));
                $bilanbo->setRemarqueBil($_POST['appreciation']);
                $bilanbo->setDatevisiteBil($_POST['date-visite']);
                $bilanbo->setSujmemBil2($_POST['sujet-memoire']);
                $bilanbo->setMoyBil(($bilanbo->getNotentBil()+ $bilanbo->getNotdossBil()+$bilanbo-> getNotorBil())/3);
                $bilan2DAO->create($bilanbo);

                $real = new Realisation2(1,1);

                $real->setIdBil2($bilanbo->getIdBil());
                $real->setIdUti($idetu);

                var_dump($real);
                ////
                ///
                /// regler le probleme d id donc recupere l id du bilan creer pour le mettre dans le create de realisation
                $Realisation2DAO->create($real);
            }
        }


        ?>
    </div>