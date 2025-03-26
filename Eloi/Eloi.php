<?php

use DAO\EntrepriseDAO;
use DAO\MaitreApprentissageDAO;
use DAO\TuteurDAO;
use DAO\UtilisateurDAO;

//chemin relatif avec DIR
require_once __DIR__."/../src/Model/bddManager.php";
require_once __DIR__."/../src/Model/DAO/UtilisateurDAO.php";
require_once __DIR__."/../src/Model/BO/Utilisateur.php";
require_once __DIR__."/../src/Model/DAO/MaitreApprentissageDAO.php";
require_once __DIR__."/../src/Model/BO/MaitreApprentissage.php";
require_once __DIR__."/../src/Model/DAO/EntrepriseDAO.php";
require_once __DIR__."/../src/Model/BO/Entreprise.php";
require_once __DIR__."/../src/Model/DAO/TuteurDAO.php";
require_once __DIR__."/../src/Model/BO/Tuteur.php";


header('Content-Type: application/json');



if(!empty($_POST['login']) && !empty($_POST['mdp'])) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    $data = RecuperationDonnee($login, $mdp);
    echo json_encode($data);
}else{
    echo json_encode(["error" => "parametre manquant"]);
}




function RecuperationDonnee($login, $mdp){
    $bdd = ConnexionBDD();
    $utilisateurDAO = new UtilisateurDAO($bdd);
    $uti = $utilisateurDAO->findByLogin($login, $mdp);
    if($uti != null){
        if($uti['typeutiTypeuti'] === "Etudiant") {
            $iduti = $uti['idUti'];
            $utilisateur = $utilisateurDAO->getById($iduti);
            $maitreApprentissageDAO = new MaitreApprentissageDAO($bdd);
            $maitreApprentissage = $maitreApprentissageDAO->getById($utilisateur->getIdMaitapp());
            $entrepriseDAO = new EntrepriseDAO($bdd);
            $entreprise = $entrepriseDAO->getById($utilisateur->getIdEnt());
            $tuteurDAO = new TuteurDAO($bdd);
            $tuteur = $tuteurDAO->getById($utilisateur->getITutd());
            return $tuteur->getPreTut();










        }else{
            return "Vous n'êtes pas un élève sa degage";
        }
    }else{
        return "login ou mot de passe incorrect";
    }



}


?>
