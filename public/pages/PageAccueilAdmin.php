<?php
require_once __DIR__ . '/../../src/Model/bddManager.php';
require_once __DIR__ . '/../../src/Model/DAO/UtilisateurDAO.php';
require_once __DIR__ . '/../../src/Model/BO/Utilisateur.php';
use BO\Utilisateur;
use DAO\UtilisateurDAO;

session_start();
$id_session = $_SESSION['idUti'];

$conn = ConnexionBDD();
$utilisateurDAO = new UtilisateurDAO($conn);

// Récupération des informations de l'administrateur connecté
$admin = $utilisateurDAO->getById($id_session);
$nomAdmin = $admin ? $admin->getNomUti() : 'Administrateur inconnu';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Administrateur</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Conteneur principal qui ajuste la hauteur pour être centré */
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px); /* Ajuste en fonction du header */
            width: calc(100% - 250px); /* Prend en compte la sidebar */
            margin-left: 250px; /* Compense la largeur de la sidebar */
        }

        /* Boîte contenant le message de bienvenue */
        .welcome-box {
            background: white;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            max-width: 600px; /* Ajuste la largeur */
            width: 100%;
        }
    </style>
</head>
<body>

<?php include('../pages/HeaderAdmin.php'); ?>
<div class="container">
    <?php include('../pages/SidebarAdmin.php'); ?>

    <!-- Message de bienvenue parfaitement centré -->
    <div class="content-wrapper">
        <div class="welcome-box">
            <p>Bienvenue sur votre espace de travail M. <?= htmlspecialchars($nomAdmin) ?></p>
        </div>
    </div>

</div>
</body>
</html>