<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Classe.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\ClasseDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Specialite.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\SpecialiteDAO.php';

use DAO\ClasseDAO;
use DAO\SpecialiteDAO;
use BO\Classe;
use BO\Specialite;

session_start();
$id_session = $_SESSION['idUti'];

$conn = ConnexionBDD();
$classeDAO = new ClasseDAO($conn);
$specialiteDAO = new SpecialiteDAO($conn);

// Traitement du formulaire unique
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Mise à jour des classes
    if (isset($_POST['idCla']) && isset($_POST['nomCla'])) {
        foreach ($_POST['idCla'] as $key => $idCla) {
            $nomCla = $_POST['nomCla'][$key];
            $classe = new Classe($idCla, $nomCla);
            $classeDAO->update($classe);
        }
    }

    // Mise à jour des spécialités
    if (isset($_POST['idSpe']) && isset($_POST['nomSpe'])) {
        foreach ($_POST['idSpe'] as $key => $idSpe) {
            $nomSpe = $_POST['nomSpe'][$key];
            $specialite = new Specialite($idSpe, $nomSpe);
            $specialiteDAO->update($specialite);
        }
    }

    header("Location: PageParametresGeneraux.php");
    exit;
}

// Récupération des classes et spécialités depuis la BDD
$classes = $conn->query("SELECT idCla, nomCla FROM classe")->fetchAll(PDO::FETCH_ASSOC);
$specialites = $conn->query("SELECT idSpe, nomSpe FROM specialite")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres Généraux</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderAdmin.php'); ?>
<div class="container">
    <?php include('../pages/SidebarAdmin.php'); ?>

    <div class="main-content">
        <form method="post" action="PageParametresGeneraux.php">
            <!-- Section pour modifier les classes -->
            <div class="content-card informations-eleve">
                <h2>Modifier les noms des classes</h2>
                <?php foreach ($classes as $classe): ?>
                    <div class="form-group">
                        <input type="hidden" name="idCla[]" value="<?php echo $classe['idCla']; ?>">
                        <input type="text" name="nomCla[]" value="<?php echo htmlspecialchars($classe['nomCla']); ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="content-card informations-entreprise">
                <h2>Modifier les noms des spécialités</h2>
                <?php foreach ($specialites as $specialite): ?>
                    <div class="form-group">
                        <input type="hidden" name="idSpe[]" value="<?php echo $specialite['idSpe']; ?>">
                        <input type="text" name="nomSpe[]" value="<?php echo htmlspecialchars($specialite['nomSpe']); ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="content-card informations-tuteur">
                <h2>Date limite</h2>
                <div class="form-group">
                    <input type="text" placeholder="Date limite">
                </div>
            </div>

            <div class="submit-container">
                <input type="submit" value="Modifier" class="btnvert">
                <input type="button" value="Retour" class="btnvert" onclick="window.location.href='PageParametres.php'">
            </div>
        </form>
    </div>
</div>
</body>
</html>