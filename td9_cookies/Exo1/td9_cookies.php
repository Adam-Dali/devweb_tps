<?php

if(isset($_COOKIE['chocolat'])){
    print 'Chocolat : ' . $_COOKIE['chocolat']; 
}
else { 
    setcookie("chocolat", 'quelconqueOuiGpaDidé)', time() + 2 * 60 * 60, '/Exo1');
    print 'Création du cookie'; 
}


//Exo 1 : le nom du header dans la réponse est 'Set-Cookie'
//Exo 2.2 : Dans un autre navigateur, 'Création du cookie' est directement affiché, car les cookies sont stockés par navigateur
//Exo 2.3 : Le header s'appelle Cookie
//Exo 2.4 : Quand j'exécute le premier et que je vais sur le deuxième, il me met que le cookie du premier programme est toujours présent

?>