<?php

session_start();

$premier = isset($_GET['premier']) ? (int) $_GET['premier'] : 0;
$deuxieme = isset($_GET['deuxieme']) ? (int) $_GET['deuxieme'] : 1;

$_SESSION['fibonacci'] = [$premier, $deuxieme];

echo "Suite initialisée : ";
echo $premier . ", " . $deuxieme;
?>