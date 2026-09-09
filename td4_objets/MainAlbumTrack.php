<?php
//Exo 2
require_once 'AlbumTrack.php';
require_once 'AlbumTrackRenderer.php';
$ab = new AlbumTrack("The Cradle by Starlight", "4-21. The Cradle by Starlight.mp3", "Kai no Kiseki OST", 1);
$ab->artiste = "Falcom Sound Team jdk";
$ab->annee = 2024;
$ab->duree = 240;

$ac = new AlbumTrack("Large Map", "1-12. Large Map.mp3", "Shin Megami Tensei IV Final OST", 2);
$ac->artiste = "Atlus - Ryota Kozuka";
$ac->annee = 2016;
$ac->duree = 140;

/*echo $ab . "\n";

print $ab . "\n";

printf($ab);*/

/*echo $ab->__toString() . "\n";
print_r($ab->__toString()) . "\n";
var_dump($ab->__toString()) . "\n";*/

$render = new AlbumTrackRenderer($ab);
$render2 = new AlbumTrackRenderer($ac);

print $render->render(2);
print $render2->render(2);

?>