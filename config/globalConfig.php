<?php

// Définition des chemins:
define('BASE_DIR', dirname(dirname(__FILE__)));	 // Le dossier de l'application
define('PUBLIC_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);    //  Pour les fichiers publics
define('CONFIG_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);    //  Pour les fichiers de configuration
define('SRC_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'src\Model' . DIRECTORY_SEPARATOR);     //  Pour vos classes
define('LOG_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR);     //  Pour les fichiers de journalisation

//  Définition du path d'inclusion
define('CLASS_DIR', SRC_DIR . PATH_SEPARATOR );
set_include_path(get_include_path() . PATH_SEPARATOR . CLASS_DIR);


//  Active ou pas l'affichage de debug et les var_dump
if (DUMP) {
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 'On');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', LOG_DIR . 'error_log.txt');
}


//  Autoload avec prise en compte des espaces de nom et compatibilité Linux (pb des séparateurs d'espace de nom...)
spl_autoload_register(function ($className) {
    $extension = '.php';
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once($className . $extension);
});




//  Lancement des sessions, si ce n'est pas déjà fait.
//  Le faire après l'inclusion de 'globalConfig.php' permet d'avoir l'autoload actif
//  et de pouvoir désérializer des objets depuis les sessions.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


//  Fonction à utiliser de préférence à var_dump() lorsque XDebug n'est pas configuré sur la configuration
//  Attention, pour voir les affichages, il faut:
//	* soit basculer la constante DUMP à TRUE dans votre application...
//	* soit passer TRUE en deuxième paramètre.
//  Vous pouvez passer en 3ème paramètre une chaîne de caractères pour commenter le dump.
//  Dans ce cas, vous DEVEZ donner une valeur pour le deuxième paramètre (soit DUMP, soit TRUE).
if(!function_exists('dump_var'))
{
    function dump_var($var, $dump=DUMP, $msg=null)
    {
        if($dump) {
            if($msg)
                echo"<p><strong>$msg</strong></p>";
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
    }
}