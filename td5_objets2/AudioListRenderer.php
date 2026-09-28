<?php
require_once 'AudioList.php';
class AudioListRenderer implements Renderer {

    private AudioList $listeAudio;

    public function __construct(AudioList $liste) {
        $this->listeAudio = $liste;
    }

    public function render(int $selector) : string {
        $html = "<div class=\"audio-list\">\n";
        $html .= "<h2>" . $this->listeAudio->nom . "</h2>\n";

        foreach ($this->listeAudio->pistes as $piste) {
            if ($piste instanceof AlbumTrack) {
                $renderer = new AlbumTrackRenderer($piste);
                $html .= $renderer->render(1);
            } elseif ($piste instanceof PodcastTrack) {
                $renderer = new PodcastRenderer($piste);
                $html .= $renderer->render(1);
            }
        }

        $html .= "<p>Nombre de pistes : " . $this->listeAudio->nbPistes . "</p>\n";
        $html .= "<p>Durée totale : " . $this->listeAudio->dureeTotale . " secondes</p>\n";
        $html .= "</div>\n";
        return $html;
    }
}
?>