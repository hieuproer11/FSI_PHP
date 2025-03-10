<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\TuteurDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Tuteur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Etudiant.php';

use DAO\EtudiantDAO;
use DAO\TuteurDAO;
use BO\Tuteur;
use BO\Etudiant;

// Connexion à la base de données
$conn = ConnexionBDD();
$etudiantDAO = new EtudiantDAO($conn);
$tuteurDAO = new TuteurDAO($conn);

// Récupération des étudiants et tuteurs
$etudiants = $etudiantDAO->getAll();
$tuteurs = $tuteurDAO->getAll();

$message = "";

// Gestion des actions (ajout, modification, suppression)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['supprimer'])) {
        $idEtudiant = $_POST['idEtudiant'] ?? null;
        if ($idEtudiant) {
            $suppression = $etudiantDAO->deleteEtudiant((int)$idEtudiant);
            $message = $suppression ? "Suppression réussie." : "Erreur lors de la suppression.";
        }
    } elseif (isset($_POST['ajouter'])) {
        $etudiantDAO->ajouterEtudiant($_POST);
    } elseif (isset($_POST['modifier'])) {
        $etudiantDAO->modifierEtudiant($_POST);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Étudiants</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <?php include('../pages/SidebarTuteur_Admin.php'); ?>
    <main class="main-content">
        <h2>Gestion des Étudiants</h2>

        <?php if ($message): ?>
            <p class="error-message"> <?php echo htmlspecialchars($message); ?> </p>
        <?php endif; ?>

        <h3>Ajouter un Étudiant</h3>
        <form method="POST">
            <input type="text" name="nomUti" placeholder="Nom" required>
            <input type="text" name="preUti" placeholder="Prénom" required>
            <input type="email" name="mailUti" placeholder="Email" required>
            <button type="submit" name="ajouter">Ajouter</button>
        </form>

        <h3>Liste des Étudiants</h3>
        <table class="alertes-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?php echo htmlspecialchars($etudiant->getIdUti()); ?></td>
                    <td><?php echo htmlspecialchars($etudiant->getNomUti()); ?></td>
                    <td><?php echo htmlspecialchars($etudiant->getPreUti()); ?></td>
                    <td><?php echo htmlspecialchars($etudiant->getMailUti()); ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="idEtudiant" value="<?php echo $etudiant->getIdUti(); ?>">
                            <button type="submit" name="supprimer" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="idEtudiant" value="<?php echo $etudiant->getIdUti(); ?>">
                            <input type="text" name="nomUti" value="<?php echo htmlspecialchars($etudiant->getNomUti()); ?>" required>
                            <input type="text" name="preUti" value="<?php echo htmlspecialchars($etudiant->getPreUti()); ?>" required>
                            <input type="email" name="mailUti" value="<?php echo htmlspecialchars($etudiant->getMailUti()); ?>" required>
                            <button type="submit" name="modifier">Modifier</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</div>
</body>
</html>