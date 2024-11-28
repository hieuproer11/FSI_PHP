<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="../css/HeaderTuteur-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="logo">
            <img src="../img/FSI_logo.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li class="active"><a href="AccueilTuteur.php">Liste des étudiants</a></li>
            <li><a href="InformationsTuteurs.php">Mes informations</a></li>
            <li><a href="#">Alertes</a></li>
        </ul>
        <div class="collapse-button">
            <span class="collapse-icon">◄</span>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <h2>Liste des étudiants</h2>
        <div class="content-card">
            <table class="students-table">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                    <th>Spécialité</th>
                    <th>Classe</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="edit-btn">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button type="button" class="view-btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>