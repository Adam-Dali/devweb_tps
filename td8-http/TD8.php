<?php

/*
 * Si la désactivation de la temporisation de sortie ne fonctionne pas avec le .htaccess 
 * fourni, il est possible de forcer l'envoi les données du tampon de sortie et d'éteindre 
 * la temporisation de sortie avec la fonction ob_end_flush() au début du script.
 */

//Exo 1 : 
//REQUEST_METHOD = GET
//HTTP_HOST = localhost
//SCRIPT_NAME = devWeb/devweb_tps/td8-http/TD8.php
//SERVER_PROTOCOL = HTTP/1.1

echo '<pre>'; 

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$protocol = $_SERVER['SERVER_PROTOCOL'];

echo $method . ' ' . $uri . ' ' . $protocol . "\n";

$headers = getallheaders();

foreach ($headers as $name => $value) {
    echo $name . ': ' . $value . "\n";
}

echo "\n";

var_dump($_SERVER);

?>