<?php

namespace iutnc\deefy\action;

class DisplayPlaylistAction extends Action {

    public function execute() : string {
        session_start();

        if (!isset($_SESSION['playlist'])) {
            return '<p>Pas de playlist en session</p>';
        }

        $playlist = $_SESSION['playlist'];
        $html = '<h1>Ma playlist</h1>';

        $renderer = new \iutnc\deefy\render\AudioListRenderer($playlist);
        $html .= $renderer->render(2);
        return $html;
    }
}
