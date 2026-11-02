<?php

session_start();

$value = isset($_GET['value']) ? (int) $_GET['value'] : 1;

if (isset($_SESSION['sess_counter'])) {
    $_SESSION['sess_counter'] += $value;
} else {
    $_SESSION['sess_counter'] = $value;
}

echo "Compteur : " . $_SESSION['sess_counter'];
?>
