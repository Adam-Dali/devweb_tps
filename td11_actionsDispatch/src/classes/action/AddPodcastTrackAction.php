<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\tracks\PodcastTrack;

class AddPodcastTrackAction extends Action {

    public function execute() : string {
        session_start();

        if (!isset($_SESSION['playlist'])) {
            return '<p>Playlist inexistante, veuillez en créer une</p>';
        }

        $titre = $_POST['title'] ?? 'Podcast';
        $chemin = $_POST['file'] ?? '';
        $track = new PodcastTrack($titre, $chemin);

        $_SESSION['playlist']->ajouterPiste($track);

        return '<h1>Podcast ajouté avec grand succès!</h1>
            <p>' . htmlspecialchars($titre, ENT_QUOTES, 'UTF-8') . '</p>';
    }
}
