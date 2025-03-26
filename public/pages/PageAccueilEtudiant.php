<?php
session_start();
if (!isset($_SESSION['idUti'])) {
    /* Empêcher le cache du navigateur
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    */
    // Redirige vers la page de connexion
    header("Location: PageConnexion.html");
    exit();
}

include_once '../../src/Model/bddManager.php';
include_once '../../src/Model/DAO/EtudiantDAO.php';

use DAO\EtudiantDAO;

// Vérifier si l'étudiant est bien connecté
if (!isset($_SESSION['idUti'])) {
    header('Location: PageConnexion.html');
    exit();
}

$idUti = $_SESSION['idUti'];
$conn = ConnexionBDD();
$etudiantDAO = new EtudiantDAO($conn);
$etudiant = $etudiantDAO->getById($idUti);

if (!$etudiant) {
    echo "Erreur : Étudiant non trouvé.";
    exit();
}

$nom = htmlspecialchars($etudiant->getNomUti());
$prenom = htmlspecialchars($etudiant->getPreUti());
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Étudiant</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
            width: calc(100% - 250px);
            margin-left: 250px;
        }

        .welcome-box {
            background: white;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            max-width: 600px;
            width: 100%;
        }
    </style>
</head>
<body>

<?php include 'HeaderEleve.php'; ?>
<div class="container">
    <?php include 'SidebarEleve.php'; ?>

    <div class="content-wrapper">
        <div class="welcome-box">
            <p>Bienvenue sur votre espace d'études, <?= htmlspecialchars($prenom) ?> <?= htmlspecialchars($nom) ?></p>
        </div>
    </div>

</div>
</body>
</html>