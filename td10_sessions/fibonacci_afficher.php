<?php

session_start();

if (!isset($_SESSION['fibonacci'])) {
    echo "Pas de suite";
    exit;
}

echo "Fibonacci : ";
foreach ($_SESSION['fibonacci'] as $value) {
    echo $value . " \n";
}
?>