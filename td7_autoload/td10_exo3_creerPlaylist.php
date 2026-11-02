<?php
require_once 'vendor/autoload.php';

use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\audio\tracks\AlbumTrack;

session_start();

if (!isset($_SESSION['playlist'])) {
    echo "Pas de playlist";
    exit;
}

$playlist = $_SESSION['playlist'];
$track = new AlbumTrack('Omen', "1-03 Omen.mp3", "FECCC", 1);
$playlist->addTrack($track);

$_SESSION['playlist'] = $playlist;
echo "Piste ajoutée à la playlist.";
?>