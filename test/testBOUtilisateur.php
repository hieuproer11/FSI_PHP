<?php

//  Permet d'utiliser le typage fort. !! Laisser en première ligne !!
declare(strict_types=1);

//  Pour forcer les dumps pendant les tests
define('DUMP', true);

require_once '../config/appConfig.php';
//  Pour utiliser les fonctions
require_once '../public/fonctionUtile.php';

use BO\Utilisateur;
$db = connectBdd($infoBdd);
dump_var($db, DUMP, 'Objet PDO:');
echo '<h1>teste BO User</h1>';
echo '<h1>Instanciation par défaut</h1>';
$obj = new Utilisateur();
dump_var($obj, DUMP, 'User par défaut:');