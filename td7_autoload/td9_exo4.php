<?php
require_once 'vendor/autoload.php';

use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\render\AlbumTrackRenderer;

if (!isset($_COOKIE['track'])) {
    $track = new AlbumTrack('Why? RED induction', "1-07. Feelings -re.mp3", "Mon album", 1);
    $track->setArtiste('Myth&Roid');

    $pisteSerial = base64_encode(serialize($track));

    setcookie('track', $pisteSerial, time() + 60 * 60 * 2);

    print "Cookie crée";
} else {
    $pisteSerial = $_COOKIE['track'];
    
    $track = unserialize(base64_decode($pisteSerial));

    $renderer = new AlbumTrackRenderer($track);
    
    echo $renderer->render(2);

}

?>