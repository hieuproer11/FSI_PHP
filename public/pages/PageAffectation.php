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

// Traitement du formulaire d'affectation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idEtudiant = $_POST['idEtudiant'] ?? null;
    $idTuteur = $_POST['idTuteur'] ?? null;

    if ($idEtudiant && $idTuteur) {
        $stmt = $conn->prepare("UPDATE Utilisateur SET idTut = ? WHERE idUti = ?");
        $affectation = $stmt->execute([(int)$idTuteur, (int)$idEtudiant]);

        if ($affectation) {
            $message = "Affectation réussie.";
        } else {
            $message = "Erreur lors de l'affectation.";
        }
    } else {
        $message = "Veuillez sélectionner un étudiant et un tuteur.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affectation Tuteur-Étudiant</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php include('../pages/HeaderAdmin.php'); ?>
<div class="container">
    <?php include('../pages/SidebarAdmin.php'); ?>
    <main class="main-content">
        <h2>Affectation Tuteur-Étudiant</h2>

        <?php if ($message): ?>
            <p class="error-message"> <?php echo htmlspecialchars($message); ?> </p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="idEtudiant">Sélectionnez un étudiant :</label>
            <select name="idEtudiant" id="idEtudiant" required>
                <option value="">-- Choisir un étudiant --</option>
                <?php foreach ($etudiants as $etudiant): ?>
                    <option value="<?php echo $etudiant->getIdUti(); ?>">
                        <?php echo htmlspecialchars($etudiant->getNomUti() . ' ' . $etudiant->getPreUti()); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="idTuteur">Sélectionnez un tuteur :</label>
            <select name="idTuteur" id="idTuteur" required>
                <option value="">-- Choisir un tuteur --</option>
                <?php foreach ($tuteurs as $tuteur): ?>
                    <option value="<?php echo $tuteur->getIdTut(); ?>">
                        <?php echo htmlspecialchars($tuteur->getNomTut() . ' ' . $tuteur->getPreTut()); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Affecter</button>
        </form>
    </main>
</div>
</body>
</html>
