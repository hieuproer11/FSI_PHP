<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan2DAO.php';

use DAO\EtudiantDAO;
use DAO\Bilan1DAO;
use DAO\Bilan2DAO;

// Connexion à la base de données
$conn = ConnexionBDD();
$etudiantDAO = new EtudiantDAO($conn);
$bilan1DAO = new Bilan1DAO($conn);
$bilan2DAO = new Bilan2DAO($conn);

// Initialisation des variables
$etudiant = null;
$bilan1 = null;
$bilan2 = null;

// Récupération de l'ID de l'étudiant via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idEtudiant = $_POST['idEtudiant'] ?? null;

    if ($idEtudiant) {
        $etudiant = $etudiantDAO->getById((int)$idEtudiant);

        if ($etudiant) {
            $bilan1 = $etudiant->getBilan1() ? $bilan1DAO->getById($etudiant->getBilan1()->getIdBil()) : null;
            $bilan2 = $etudiant->getBilan2() ? $bilan2DAO->getById($etudiant->getBilan2()->getIdBil()) : null;
        } else {
            $message = "Étudiant non trouvé pour l'ID $idEtudiant.";
        }
    } else {
        $message = "Veuillez entrer un ID étudiant.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Étudiant</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <?php include('../pages/SidebarTuteur_Admin.php'); ?>

    <main class="main-content">
        <h2>Détails de l'étudiant</h2>

        <form method="POST" action="" class="id-form">
            <label for="idEtudiant">Entrez l'ID de l'étudiant :</label>
            <input type="number" name="idEtudiant" id="idEtudiant" required>
            <button type="submit">Rechercher</button>
        </form>

        <?php if (isset($message)): ?>
            <p class="error-message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <?php if ($etudiant): ?>
            <div class="content-card">
                <h3>Informations personnelles</h3>
                <table class="alertes-table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($etudiant->getNomUti()); ?></td>
                        <td><?php echo htmlspecialchars($etudiant->getPreUti()); ?></td>
                        <td><?php echo htmlspecialchars($etudiant->getAdrUti()); ?></td>
                        <td><?php echo htmlspecialchars($etudiant->getMailUti()); ?></td>
                        <td><?php echo htmlspecialchars($etudiant->getTelUti()); ?></td>
                    </tr>
                    </tbody>
                </table>

                <h3>Informations sur l'entreprise</h3>
                <table class="alertes-table">
                    <thead>
                    <tr>
                        <th>Nom de l'entreprise</th>
                        <th>Adresse</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($etudiant->getEntreprise()->getNomEnt()); ?></td>
                        <td><?php echo htmlspecialchars($etudiant->getEntreprise()->getAdrEnt()); ?></td>
                    </tr>
                    </tbody>
                </table>

                <h3>Bilan 1</h3>
                <table class="alertes-table">
                    <thead>
                    <tr>
                        <th>Date de visite</th>
                        <th>Note entreprise</th>
                        <th>Remarque</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($bilan1): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($bilan1->getDatevisiteBil()); ?></td>
                            <td><?php echo htmlspecialchars($bilan1->getNotentBil()); ?></td>
                            <td><?php echo htmlspecialchars($bilan1->getRemarqueBil()); ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Aucun Bilan 1 trouvé.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>

                <h3>Bilan 2</h3>
                <table class="alertes-table">
                    <thead>
                    <tr>
                        <th>Date de visite</th>
                        <th>Sujet de mémoire</th>
                        <th>Remarque</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($bilan2): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($bilan2->getDatevisiteBil()); ?></td>
                            <td><?php echo htmlspecialchars($bilan2->getSujmemBil2()); ?></td>
                            <td><?php echo htmlspecialchars($bilan2->getRemarqueBil()); ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Aucun Bilan 2 trouvé.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</div>
</body>
</html>
