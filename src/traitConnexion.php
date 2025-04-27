<?php
require_once __DIR__ . '/../src/Model/bddManager.php';
require_once __DIR__ . '/../src/Model/BO/Utilisateur.php';
require_once __DIR__ . '/../src/Model/DAO/UtilisateurDAO.php';

use DAO\UtilisateurDAO;


session_start();
//connexion a la base
$conn = ConnexionBDD();
$utilisateurDAO = new UtilisateurDAO($conn);

$login = $_POST['login'];
$mdp = $_POST['mdp'];


$daoUti = $utilisateurDAO->findByLogin($login,$mdp);
if($daoUti == null || empty($_POST['login']) || empty($_POST['mdp']) ){
    header('Location:../public/pages/PageConnexion.php');
} else {
    $_SESSION['idUti'] = $daoUti['idUti'];
    if($daoUti['typeutiTypeuti'] == 'Etudiant'){
        header("Location:../public/pages/PageAccueilEtudiant.php?idUti={$daoUti['idUti']}");
    }
    elseif ($daoUti['typeutiTypeuti'] == 'Tuteur'){
        header("Location:../public/pages/AccueilTuteur.php?idUti={$daoUti['idUti']}");
    }
    elseif($daoUti['typeutiTypeuti'] == 'Administrateur'){
        header("Location:../public/pages/PageAccueilAdmin.php?idUti={$daoUti['idUti']}");
    }
}
