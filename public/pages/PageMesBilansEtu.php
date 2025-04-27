<?php
require_once __DIR__ . '/../../src/Model/bddManager.php';
require_once __DIR__ . '/../../src/Model/BO/Utilisateur.php';
require_once __DIR__ . '/../../src/Model/DAO/UtilisateurDAO.php';
require_once __DIR__ . '/../../src/Model/BO/Etudiant.php';
require_once __DIR__ . '/../../src/Model/BO/Bilan1.php';
require_once __DIR__ . '/../../src/Model/BO/Bilan2.php';
require_once __DIR__ . '/../../src/Model/DAO/EtudiantDAO.php';
require_once __DIR__ . '/../../src/Model/BO/TypeUtilisateur.php';
require_once __DIR__ . '/../../src/Model/DAO/TypeUtilisateurDAO.php';

use DAO\TypeUtilisateurDAO;
use DAO\EtudiantDAO;
use BO\Etudiant;
use BO\Bilan1;
use BO\Bilan2;
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Bilans</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hidden {
            display: none;
        }
        .active-tab {
            background-color: #45a049;
            color: #E0E0E0;
        }
    </style>
</head>

<body>
<?php include('../pages/HeaderEleve.php'); ?>
<div class="container">
    <?php include('../pages/SidebarEleve.php'); ?>
    <div class="main-content">
        <h2>Mes Bilans</h2>
        <div class="content-card">
            <table class="students-table">
                <thead>
                <tr>
                    <th id="tabBilan1" class="tab-header active-tab"  onclick="setActiveTab('tabBilan1')">Bilan1</th>
                    <th id="tabBilan2" class="tab-header"  onclick="setActiveTab('tabBilan2')">Bilan2</th>
                </tr>
                </thead>
            </table>

            <!-- Tableau Bilan1 -->
            <table id="bilan1" class="students-table">
                <thead>
                <tr>
                    <th>Date de visite</th>
                    <th>Notes du dossier</th>
                    <th>Notes d'oral</th>
                    <th>Note de l'entreprise</th>
                    <th>Moyenne</th>
                    <th>Remarque</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $Etu->getBilan1()->getDatevisiteBil(); ?></td>
                    <td><?php echo $Etu->getBilan1()->getNotdossBil(); ?></td>
                    <td><?php echo $Etu->getBilan1()->getNotorBil(); ?></td>
                    <td><?php echo $Etu->getBilan1()->getNotentBil(); ?></td>
                    <td><?php echo $Etu->getBilan1()->getMoyBil(); ?></td>
                    <td><?php echo $Etu->getBilan1()->getRemarqueBil(); ?></td>
                </tr>
                </tbody>
            </table>

            <!-- Tableau Bilan2 -->
            <table id="bilan2" class="students-table hidden">
                <thead>
                <tr>
                    <th>Date de visite</th>
                    <th>Notes du dossier</th>
                    <th>Notes d'oral</th>
                    <th>Note de l'entreprise</th>
                    <th>Moyenne</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $Etu->getBilan2()->getDatevisiteBil(); ?></td>
                    <td><?php echo $Etu->getBilan2()->getNotdossBil(); ?></td>
                    <td><?php echo $Etu->getBilan2()->getNotorBil(); ?></td>
                    <td><?php echo $Etu->getBilan2()->getNotentBil(); ?></td>
                    <td><?php echo $Etu->getBilan2()->getMoyBil(); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function setActiveTab(tabId) {
        // Supprimer la classe active de tous les onglets
        const tabs = document.querySelectorAll('.tab-header');
        tabs.forEach(tab => tab.classList.remove('active-tab'));

        // Ajouter la classe active à l'onglet cliqué
        const activeTab = document.getElementById(tabId);
        activeTab.classList.add('active-tab');

        showBilan(tabId);
    }

    function showBilan(section) {
        // Hide both tables
        document.getElementById('bilan1').classList.add('hidden');
        document.getElementById('bilan2').classList.add('hidden');
        // Show the selected table and highlight the tab
        switch (section)  {
            case 'tabBilan1':
            document.getElementById('bilan1').classList.remove('hidden');
            break;

            case 'tabBilan2':
            document.getElementById('bilan2').classList.remove('hidden');
            break;
        }
    }
</script>
</body>
</html>
