<?php
namespace iutnc\deefy\render;
use iutnc\deefy\audio\tracks\PodcastTrack;
require_once __DIR__ . '/../audio/tracks/PodcastTrack.php';

class PodcastRenderer extends AudioTrackRenderer {

    /*public PodcastTrack $podcastTrack;

    public function __construct(PodcastTrack $p) {
        parent::__construct($p);
    }*/

    public function renderLong(): string {
        return '<div class="audio-long" style="padding:20px; border:1px solid #ccc; max-width:600px;">
        <h2>' . htmlspecialchars($this->audioTrack->titre) . " par " . htmlspecialchars($this->audioTrack->auteur) . '</h2>
        <audio src="' . htmlspecialchars($this->audioTrack->nomFichier) . '" controls style="width:100%;"></audio>
        </div>';
    }

    /*public function render(int $selector): string {
        switch($selector){
            case "1":
                return $this->renderCompact();
            case "2": 
                return $this->renderLong();
            default: 
                return $this->renderCompact();
        }
    }*/
}

?>