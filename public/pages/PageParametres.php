<?php
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Etudiant.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\EtudiantDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Tuteur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\TuteurDAO.php';

use DAO\EtudiantDAO;
use DAO\TuteurDAO;
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
$id_session=$_SESSION['idUti'];

$conn = ConnexionBDD();
$etudiantDAO = new EtudiantDAO($conn);
$tuteurDAO = new TuteurDAO($conn);
$etudiants = $etudiantDAO->getAll();
$tuteurs = $tuteurDAO->getAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hidden { display: none; }
        .active-tab { background-color: #45a049; color: #fff; }
        .students-table tbody tr:hover {
            background-color: #f0f8ff;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
    </style>
</head>

<body>
<?php include('../pages/HeaderAdmin.php'); ?>
<div class="container">
    <?php include('../pages/SidebarAdmin.php'); ?>
    <main class="main-content">
        <h2>Paramètres</h2>
        <div class="content-card">
            <table class="students-table">
                <thead>
                <tr>
                    <th id="tabEleve" class="tab-header active-tab" onclick="setActiveTab('tabEleve')">
                        Ajouter un élève
                        <button class="add-btn" onclick="openForm('formEleve')">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </th>
                    <th id="tabTuteur" class="tab-header" onclick="setActiveTab('tabTuteur')">
                        Ajouter un tuteur
                        <button class="add-btn" onclick="openFormInNewTab()">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </th>
                    <th id="tabAffTut" class="tab-header" onclick="setActiveTab('tabAffTut')">
                        Affecter un tuteur
                    </th>
                    <th id="tabGen" class="tab-header" onclick="setActiveTab('tabGen')">
                        Paramètres généraux
                    </th>
                </tr>
                </thead>
            </table>

            <!-- Tableau des Étudiants -->
            <table id="eleves" class="students-table">
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
                                <button type="button" class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="view-btn">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7">Aucun étudiant trouvé.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>

            <!-- Tableau des Tuteurs -->
            <table id="tuteurs" class="students-table hidden">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($tuteurs)): ?>
                    <?php foreach ($tuteurs as $tuteur): ?>
                        <tr>
                            <td><?= htmlspecialchars($tuteur->getNomTut()) ?></td>
                            <td><?= htmlspecialchars($tuteur->getPreTut()) ?></td>
                            <td><?= htmlspecialchars($tuteur->getTelTut()) ?></td>
                            <td><?= htmlspecialchars($tuteur->getMailTut()) ?></td>
                            <td>
                                <a href ="PageModifierTuteur.php?idTut=<?= $tuteur->getIdTut(); ?>" class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="../../src/traitDeleteTut.php?idTut=<?php echo $tuteur->getIdTut(); ?>"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce tuteur ?');">
                                    <i class="fa-solid fa-trash-can" style="color: red;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5">Aucun tuteur trouvé.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>

            <!-- Tableau d'Affectation Tuteur -->
            <table id="affectation" class="students-table hidden">
                <thead>
                <tr>
                    <th>Nom élève</th>
                    <th>Prénom élève</th>
                    <th>Nom tuteur</th>
                    <th>prénom tuteur</th>
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
                                <button type="button" class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="view-btn">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7">Aucun étudiant trouvé.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </main>
</div>

<script>
    function setActiveTab(tabId) {
        // Supprimer la classe active de tous les onglets
        const tabs = document.querySelectorAll('.tab-header');
        tabs.forEach(tab => tab.classList.remove('active-tab'));

        // Ajouter la classe active à l'onglet cliqué
        const activeTab = document.getElementById(tabId);
        activeTab.classList.add('active-tab');

        showSection(tabId);
    }
    function openFormInNewTab() {
        // Ouvre le formulaire dans un nouvel onglet
        window.open("PageAjouterTuteur.php", "_blank");
    }

    function showSection(section) {
        // Masquer tous les tableaux
        document.getElementById('eleves').classList.add('hidden');
        document.getElementById('tuteurs').classList.add('hidden');
        document.getElementById('affectation').classList.add('hidden');

        // Afficher le tableau correspondant
        switch (section) {
            case 'tabEleve':
                document.getElementById('eleves').classList.remove('hidden');
                break;
            case 'tabTuteur':
                document.getElementById('tuteurs').classList.remove('hidden');
                break;
            case 'tabAffTut':
                document.getElementById('affectation').classList.remove('hidden');
                break;
            case 'tabGen':
                window.location.href='PageParametresGeneraux.php';
                break;
        }
    }

</script>
</body>
</html>
