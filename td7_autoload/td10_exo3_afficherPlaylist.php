<?php
require_once 'vendor/autoload.php';

use iutnc\deefy\render\AudioListRenderer;

session_start();

if (!isset($_SESSION['playlist'])) {
    echo "Pas de playlist";
    exit;
}

$playlist = $_SESSION['playlist'];
$renderer = new AudioListRenderer($playlist);
echo $renderer->render(1);
?>
