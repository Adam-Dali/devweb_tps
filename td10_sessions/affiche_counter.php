<?php

session_start();

if (isset($_SESSION['sess_counter'])) {
    echo "Valeur du compteur : " . $_SESSION['sess_counter'];
} else {
    echo "Y a rien";
}
?>