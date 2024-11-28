<?php
define('DUMP', true);

require_once '../config/appConfig.php';
use BO\Utilisateur;
use DAO\UtilisateurDAO;
require_once ("../src/Model/bddManager.php");

$bdd=ConnexionBDD();
$Utilisateur1 = new Utilisateur(3,"Tran","Hieu","trhieus@gmail.com","0667075123","28 rue Antoine Bernoux","69100","Villeurbanne","Hieu123");
$UtilisateurDAO = new UtilisateurDAO($bdd);
$testgetall = $UtilisateurDAO->getAllUtilisateur();
var_dump($testgetall);
