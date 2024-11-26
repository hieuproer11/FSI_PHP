<?php
function connectBdd(array $infoBdd): ?\PDO
{
    $myport = ($infoBdd['port']);
    $mycharset = ($infoBdd['charset']);
    $hostname = ($infoBdd['host']);
    $mydbname = ($infoBdd['dbname']);
    $myusername = ($infoBdd['user']);
    $mypassword = ($infoBdd['pass']);

    //  Composition du DSN
    $dsn = "mysql:dbname=$mydbname;host=$hostname;port=$myport;charset=$mycharset";
    //  Instanciation de PDO (le \ pour l'espace de nom racine... peut être utile par la suite)
    $db = new \PDO($dsn, $myusername, $mypassword);
    // renvoi de votre object PDO
    return $db;

}