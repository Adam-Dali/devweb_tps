<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;

class AddPlaylistAction extends Action {

    public function execute() : string {
        session_start();

        $nom = $_POST['nom'] ?? 'Ma playlist';
        $playlist = new Playlist($nom);

        $_SESSION['playlist'] = $playlist;

        return '<h1>Playlist créée avec grand succès!</h1>
        <p>Nom : ' . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . '</p>';
    }
}
