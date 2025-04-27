<?php
require_once __DIR__ . '/../../src/Model/bddManager.php';
require_once __DIR__ . '/../../src/Model/BO/Etudiant.php';
require_once __DIR__ . '/../../src/Model/DAO/EtudiantDAO.php';
require_once __DIR__ . '/../../src/Model/BO/TypeUtilisateur.php';
require_once __DIR__ . '/../../src/Model/DAO/TypeUtilisateurDAO.php';

use DAO\etudiantDAO;
use DAO\TypeUtilisateurDAO;
session_start();
$id_session=$_SESSION['idUti'];

$conn = ConnexionBDD();
$etudiantDAO = new etudiantDAO($conn);
$typeUti = new TypeUtilisateurDAO($conn);
$etudiants = $etudiantDAO->getAll();
?>
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
                <?php if (!empty($etudiants)): ?>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <tr>
                            <td><?= htmlspecialchars($etudiant->getNomUti()) ?></td>
                            <td><?= htmlspecialchars($etudiant->getPreUti()) ?></td>
                            <td><?= htmlspecialchars($etudiant->getTelUti()) ?></td>
                            <td><?= htmlspecialchars($etudiant->getMailUti()) ?></td>
                            <td><?= htmlspecialchars($etudiant->getSpecialite()->getNomSpe()) ?></td>
                            <td><?= htmlspecialchars($etudiant->getClasse()->getNomCla()) ?></td>
                            <td>
                                <button type="button" class="edit-btn" onclick="window.location.href='EditInformations.php?idUti=<?php echo $etudiant->getIdUti()?>'">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="view-btn" onclick="window.location.href='PageInformationsEleveAdmin.php?idUti=<?php echo $etudiant->getIdUti()?>'">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Aucun étudiant trouvé.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>