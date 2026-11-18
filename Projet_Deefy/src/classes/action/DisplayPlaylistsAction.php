<?php

namespace iutnc\deefy\action;

use iutnc\deefy\repository\DeefyRepository;

class DisplayPlaylistsAction extends Action {

    public function execute() : string {
        $repo = DeefyRepository::getInstance();
        $playlists = $repo->findAllPlaylists();
        $html = '<h2>Mes playlists</h2>';

        if (empty($playlists)) {
            return $html . '<p>Aucune playlist disponible.</p>';
        }

        $html .= '<ul>';

        foreach ($playlists as $pl) {

            $nom = htmlspecialchars(
                $pl->nom,
                ENT_QUOTES,
                'UTF-8'
            );
            $html .= '<li>';
            $html .= '<a href="?action=select-playlist&id=' . (int) $pl->id . '">';
            $html .= $nom;
            $html .= '</a>';
            $html .= '</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
