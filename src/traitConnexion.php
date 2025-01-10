<?php

include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Utilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\UtilisateurDAO.php';

use DAO\UtilisateurDAO;

session_start();
//connexion a la base
$conn = ConnexionBDD();
$utilisateurDAO = new UtilisateurDAO($conn);

$login = $_POST['login'];
$mdp = $_POST['mdp'];

$daoUti = $utilisateurDAO->findByLogin($login,$mdp);
if($daoUti == null){
    header('Location:../public/pages/PageConnexion.html');
} else {
    $_SESSION['idUti'] = $daoUti['idUti'];
    if($daoUti['typeutiTypeuti'] == 'Etudiant'){
        header("Location:../public/pages/PageMesBilansEtu.php?idUti={$daoUti['idUti']}");
    }
    elseif ($daoUti['typeutiTypeuti'] == 'Tuteur'){
        header("Location:../public/pages/AccueilTuteur.php?idUti={$daoUti['idUti']}");
    }
    elseif($daoUti['typeutiTypeuti'] == 'Administrateur'){
        header("Location:../public/pages/PageParametres.php?idUti={$daoUti['idUti']}");
    }
}


