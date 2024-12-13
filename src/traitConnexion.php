<?php

include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Utilisateur.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\UtilisateurDAO.php';

use DAO\UtilisateurDAO;

//connexion a la base
$conn = ConnexionBDD();
$utilisateurDAO = new UtilisateurDAO($conn);

$login = $_POST['login'];
$mdp = $_POST['mdp'];

$daoUti = $utilisateurDAO->findByLogin($login,$mdp);
if($daoUti == null){
    header('Location:../public/pages/PageConnexion.html');
} else {
    if($daoUti['typeutiTypeuti'] == 'Etudiant'){
        header("Location:../public/pages/PageMesInformationsEtudiant.php?idUti={$daoUti['idUti']}");
    }
    elseif ($daoUti['typeutiTypeuti'] == 'Tuteur'){
        header('Location:../public/pages/AccueilTuteur.php');
    }
}


