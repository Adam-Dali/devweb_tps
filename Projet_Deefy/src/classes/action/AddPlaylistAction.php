<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\render\AudioListRenderer;

class AddPlaylistAction extends Action {

    public function execute() : string {

        //requête get -> afficher formulaire
        if ($this->http_method === 'GET') {
            return <<<HTML
                <h2>Créer une playlist</h2>

                <form method="post" action="?action=add-playlist">
                    <label for="name">Nom de la playlist :</label>
                    <input type="text" name="name" id="name" required>

                    <button type="submit">Créer</button>
                </form>
                HTML;
        }

        // requête post créer playlist
        if ($this->http_method === 'POST') {

            $name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty(trim($name))) {
                return '<p>Saisissez un nom de playlist</p>';
            }

            $playlist = new Playlist($name);

            $_SESSION['playlist'] = $playlist;

            $renderer = new AudioListRenderer($playlist);

            return $renderer->render(2) . '<p><a href="?action=add-track">Ajouter un podcast</a></p>';
        }
        return '<p>Méthode non autorisée.</p>';
    }
}
