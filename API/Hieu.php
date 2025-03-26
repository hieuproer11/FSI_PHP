<?php




include_once '../src/Model/bddManager.php';
include_once '../src/Model/DAO/UtilisateurDAO.php';
include_once '../src/Model/BO/Bilan.php';
include_once '../src/Model/BO/Bilan1.php';
include_once '../src/Model/BO/Bilan2.php';
use DAO\UtilisateurDAO;

header('Content-Type: application/json');


$conn = ConnexionBDD();
$utilisateurDAO = new UtilisateurDAO($conn);

if(isset($_POST['login']) && isset($_POST['mdp'])) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
}
// Récupération des informations de l'utilisateur avec ses bilans
$utilisateur = $utilisateurDAO->findByLogin($login, $mdp);

if ($utilisateur) {
    $response = [
        'etudiant' => [
            'idEtu' => $utilisateur['idUti'],
            'nomEtu' => $utilisateur['nomUti'],
            'preEtu' => $utilisateur['preUti'],
            'login' => $utilisateur['logUti'],
            'mdp' => $utilisateur['mdpUti'],
            'mailEtu' => $utilisateur['mailUti'],
            'classe' => $utilisateur['nomCla'],
            'specialite' => $utilisateur['nomSpe'],
            'adrEtu' => $utilisateur['adrUti'],
            'nomEnt' => $utilisateur['nomEnt'],
            'adrEnt' => $utilisateur['adrEnt'],
            'nomMai' => $utilisateur['nomMaitapp'],
            'preMai' => $utilisateur['preMaitapp'],
            'telMai' => $utilisateur['telMaitapp'],
            'mailMai' => $utilisateur['mailMaitapp'],
            'nomTut' => $utilisateur['nomTut'],
            'preTut' => $utilisateur['preTut'],
        ]
    ];

    // Vérifie si le bilan1 existe
    if (!empty($utilisateur['idBil1'])) {
        $response['bilan1'] = [
            'idBil1' => $utilisateur['idBil1'],
            'datevisiteBil1' => $utilisateur['datevisiteBil1'],
            'notdossBil1' => $utilisateur['notdossBil1'],
            'notorBil1' => $utilisateur['notorBil1'],
            'notentBil1' => $utilisateur['notentBil1'],
            'moyBil1' => $utilisateur['moyBil1'],
            'remarqueBil1' => $utilisateur['remarqueBil1'],
        ];
    } else {
        $response['bilan1'] = null;
    }

    // Vérifie si le bilan2 existe
    if (!empty($utilisateur['idBil2'])) {
        $response['bilan2'] = [
            'idBil2' => $utilisateur['idBil2'],
            'datevisiteBil2' => $utilisateur['datevisiteBil2'],
            'notdossBil2' => $utilisateur['notdossBil2'],
            'notorBil2' => $utilisateur['notorBil2'],
            'notentBil1' => $utilisateur['notentBil1'],
            'moyBil2' => $utilisateur['moyBil2'],
        ];
    } else {
        $response['bilan2'] = null;
    }

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['error' => 'Identifiants incorrects']);
}

?>
