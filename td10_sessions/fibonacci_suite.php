<?php

session_start();

if (!isset($_SESSION['fibonacci'])) {
    echo "La suite n'existe pas";
    exit;
}

$fibonacci = $_SESSION['fibonacci'];
$compte = count($fibonacci);
$suivant = $fibonacci[$compte - 1] + $fibonacci[$compte - 2];

$_SESSION['fibonacci'][] = $suivant;
echo $suivant;
?>
