<?php
session_start();
require_once __DIR__ . '/../../src/Model/bddManager.php';
require_once __DIR__ . '/../../src/Model/DAO/TuteurDAO.php';
require_once __DIR__ . '/../../src/Model/BO/Tuteur.php';

// Connexion à la base
$conn = ConnexionBDD();
$tuteurDAO = new DAO\TuteurDAO($conn);

// Vérification de l'authentification
$idUti = $_SESSION['idUti'] ?? null;
if (!$idUti) {
    header("Location: PageConnexion.php");
    exit;
}

// Récupérer l'ID du tuteur associé à l'utilisateur
$query = $conn->prepare("SELECT idTut FROM Utilisateur WHERE idUti = ?");
$query->execute([$idUti]);
$tuteurId = $query->fetchColumn();

if (!$tuteurId) {
    echo "Erreur : aucun tuteur trouvé.";
    exit;
}

// Récupérer les informations du tuteur
$tuteur = $tuteurDAO->getById($tuteurId);

// Vérifier si le formulaire a été soumis pour mettre à jour les informations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);

    // Vérification des champs non vides
    if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($telephone)) {
        // Mise à jour du tuteur via TuteurDAO
        $tuteur->setPreTut($prenom);
        $tuteur->setNomTut($nom);
        $tuteur->setMailTut($email);
        $tuteur->setTelTut($telephone);

        $tuteurDAO->update($tuteur);

        // Rafraîchir la page avec un message de succès
        header("Location: PageMesInformationsTuteur.php?success=1");
        exit;
    } else {
        $error = "Tous les champs doivent être remplis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Informations</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="info-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <?php include('../pages/SidebarTuteur.php'); ?>
    <main class="main-content">
        <h2>Mes informations</h2>

        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <p style="color: green;">Informations mises à jour avec succès !</p>
        <?php elseif (isset($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="content-card">
            <form class="info-form" method="POST">
                <div class="form-group">
                    <input type="text" name="prenom" value="<?= htmlspecialchars($tuteur->getPreTut()); ?>" placeholder="Prénom">
                </div>

                <div class="form-group">
                    <input type="text" name="nom" value="<?= htmlspecialchars($tuteur->getNomTut()); ?>" placeholder="Nom">
                </div>

                <div class="form-group">
                    <input type="email" name="email" value="<?= htmlspecialchars($tuteur->getMailTut()); ?>" placeholder="Adresse mail">
                </div>

                <div class="form-group">
                    <input type="text" name="telephone" value="<?= htmlspecialchars($tuteur->getTelTut()); ?>" placeholder="Numéro de téléphone">
                </div>

                <button type="submit" class="submit-btn">Modifier</button>
            </form>
        </div>
    </main>
</div>
</body>
</html>
