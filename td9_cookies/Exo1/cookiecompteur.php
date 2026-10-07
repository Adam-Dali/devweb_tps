<?php
if(isset($_COOKIE['cliquer'])){
    $compteur = (int) $_COOKIE['cliquer'];
    $compteur++;
    if($compteur == 44) {
        print 'T es un bon toi';
    }
}
else { 
    $compteur = 1;
}

setcookie("cliquer", (string) $compteur, time() + 2 * 60 * 60);
echo ' Nombre de clics : ' . $compteur . " \n";

?>