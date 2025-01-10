<?php
if(!defined('DUMP')) {
    define('DUMP', true);
}

$infoBdd = array (
    'interface' => 'pdo',
    'type' => 'mysql',
    'host' => 'localhost',
    'port' => 3306,
    'charset' => 'UTF8',
    'dbname' => 'p2025-2sio-projet-tutorat',
    'user' => 'root',
    'pass' => ''
);

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
require_once 'globalConfig.php';