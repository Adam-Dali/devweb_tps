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


//Exo 2
//Avec Postman, on peut modifier certaines caractéristiques d'une requête HTTP avant de l'envoyer.
//J'ai ajouté un header qu'on peut récupérer avec getallheaders()


//Exo 3
//1. on a bien un '201 created'
//2. on a de nouveau un '200 OK'
//3. On a bien un nouveau header dans la réponse
//4. On n'a plus le header dans la réponse, mais je n'ai pas de message d'erreur particulier
//5. On a de nouveau le header dans la réponse.

ob_start();
http_response_code(201);

//header('xxx-header: JustPlayTrails');

echo '<pre>'; 

/*$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$protocol = $_SERVER['SERVER_PROTOCOL'];

echo $method . ' ' . $uri . ' ' . $protocol . "\n";

$headers = getallheaders();

foreach ($headers as $name => $value) {
    echo $name . ': ' . $value . "\n";
}*/

echo "\n";

var_dump($_SERVER);

header('xxx-header: JustPlayTrails');

//http_response_code(201);


?>