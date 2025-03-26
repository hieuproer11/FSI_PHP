<?php

use DAO\Bilan1DAO;
use DAO\EntrepriseDAO; // Gère les entreprises
use DAO\MaitreApprentissageDAO; // Gère les maîtres d'apprentissage
use DAO\TuteurDAO; // Gère les tuteurs
use DAO\UtilisateurDAO; // Gère les utilisateurs
use DAO\Realisation1DAO;
use DAO\Realisation2DAO;
Use DAO\Bilan2DAO;


require_once __DIR__ . "/../src/Model/bddManager.php";
require_once __DIR__ . "/../src/Model/DAO/UtilisateurDAO.php";
require_once __DIR__ . "/../src/Model/BO/Utilisateur.php";
require_once __DIR__ . "/../src/Model/DAO/MaitreApprentissageDAO.php";
require_once __DIR__ . "/../src/Model/BO/MaitreApprentissage.php";
require_once __DIR__ . "/../src/Model/DAO/EntrepriseDAO.php";
require_once __DIR__ . "/../src/Model/BO/Entreprise.php"; // Objet Entreprise
require_once __DIR__ . "/../src/Model/DAO/TuteurDAO.php"; // Accès aux tuteurs en base
require_once __DIR__ . "/../src/Model/BO/Tuteur.php"; // Objet Tuteur
require_once __DIR__ . "/../src/Model/DAO/Realisation1DAO.php";
require_once __DIR__ . "/../src/Model/BO/Realisation1.php";
require_once __DIR__ . "/../src/Model/DAO/Realisation2DAO.php";
require_once __DIR__ . "/../src/Model/BO/Realisation2.php";
require_once __DIR__ . "/../src/Model/DAO/Bilan1DAO.php";
require_once __DIR__ . "/../src/Model/BO/Bilan1.php";
require_once __DIR__ . "/../src/Model/DAO/Bilan2DAO.php";
require_once __DIR__ . "/../src/Model/BO/Bilan2.php";

header('Content-Type: application/json');

if(!empty($_POST['login']) && !empty($_POST['mdp'])) {
    $login = $_POST['login']; // Récupération du login
    $mdp = $_POST['mdp']; // Récupération du mot de passe

    // Appel de la fonction pour récupérer les données en fonction des identifiants fournis
    $data = RecuperationDonnee($login, $mdp);

    echo json_encode($data);
} else {
    echo json_encode(["error" => "parametre manquant"]);
}

function RecuperationDonnee($login, $mdp){
    // Connexion à la base de données
    $bdd = ConnexionBDD();

    // Création d'un objet DAO pour interagir avec la table des utilisateurs
    $utilisateurDAO = new UtilisateurDAO($bdd);

    // Recherche de l'utilisateur par login et mot de passe
    $uti = $utilisateurDAO->verifmdp($login, $mdp);

    // Vérification si l'utilisateur existe
    if($uti != null){
        // Vérification du type de l'utilisateur
        if($uti['typeutiTypeuti'] === "Etudiant") {
            $iduti = $uti['idUti']; // Récupération de l'ID utilisateur

            // Récupération de l'objet utilisateur à partir de son ID
            $utilisateur = $utilisateurDAO->getById($iduti);

            // Récupération du maître d'apprentissage lié à l'utilisateur
            $maitreApprentissageDAO = new MaitreApprentissageDAO($bdd);
            $maitreApprentissage = $maitreApprentissageDAO->getById($utilisateur->getIdMaitapp());

            // Récupération de l'entreprise liée à l'utilisateur
            $entrepriseDAO = new EntrepriseDAO($bdd);
            $entreprise = $entrepriseDAO->getById($utilisateur->getIdEnt());

            // Récupération du tuteur lié à l'utilisateur
            $tuteurDAO = new TuteurDAO($bdd);
            $tuteur = $tuteurDAO->getById($utilisateur->getITutd());

            $realisaton1DAO = new Realisation1DAO($bdd);
            $realisation1 = $realisaton1DAO->findByIdUti($utilisateur->getIdUti());

            $realisaton2DAO = new Realisation2DAO($bdd);
            $realisation2 = $realisaton2DAO->findByIdUti($utilisateur->getIdUti());

            $bilan1dao = new Bilan1dao($bdd);
            $bilan1 = $bilan1dao->getById($realisation1->getIdBil1());

            $bilan2dao = new Bilan2dao($bdd);
            $bilan2 = $bilan2dao->getById($realisation2->getIdBil2());

            $data = [
                'idUti' => $utilisateur->getIdUti(),
                'nomUti' => $utilisateur->getNomUti(),
                'preUti' => $utilisateur->getPreUti(),
                'telUti' => $utilisateur->getTelUti(),
                'mailUti' => $utilisateur->getMailUti(),
                'nomMaitapp' => $maitreApprentissage->getNomMaitapp(),
                'preMaitapp' => $maitreApprentissage->getPreMaitapp(),
                'telMaitapp' => $maitreApprentissage->getTelMaitapp(),
                'mailMaitapp' => $maitreApprentissage->getMailMaitapp(),
                'nomEnt' => $entreprise->getNomEnt(),
                'nomTut' => $tuteur->getNomTut(),
                'preTut' => $tuteur->getPreTut(),
                'telTut' => $tuteur->getTelTut(),
                'mailTut' => $tuteur->getMailTut(),
                'datVisBil1' => $bilan1->getDatevisiteBil(),
                'notEntBil1' => $bilan1->getNotentBil(),
                'notDossBil1' => $bilan1->getNotdossBil(),
                'notOrBil1' => $bilan1->getNotorBil(),
                'moyBil1' => $bilan1->getMoyBil(),
                'remBil1' => $bilan1->getRemarqueBil(),
                'datVisBil2' => $bilan2->getDatevisiteBil(),
                'notDossBil2' => $bilan2->getNotdossBil(),
                'notOrBil2' => $bilan2->getNotorBil(),
                'moyBil2' => $bilan2->getMoyBil(),
                'remBil2' => $bilan2->getRemarqueBil()


            ];
            return $data;


        } else {
            // Message d'erreur si l'utilisateur n'est pas un étudiant
            return "Vous n'êtes pas un élève sa degage";
        }
    } else {
        // Message d'erreur si le login ou le mot de passe est incorrect
        return "login ou mot de passe incorrect";
    }
}
?>
