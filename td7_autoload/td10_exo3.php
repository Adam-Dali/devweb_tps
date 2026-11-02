<?php
require_once 'vendor/autoload.php';

use iutnc\deefy\audio\lists\Playlist;

session_start();
$playlist = new Playlist("Ma playlist");
$_SESSION['playlist'] = $playlist;

echo "Playlist créée";
?>