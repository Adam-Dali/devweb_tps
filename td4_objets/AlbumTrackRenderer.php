<?php
//Exo 3
class AlbumTrackRenderer {

    public AlbumTrack $albumTrack;

    public function __construct(AlbumTrack $ab) {
        $this->albumTrack = $ab;
    }

    public function renderCompact(): string {
        return '<div class="audio-compact" style="margin-bottom:10px;">
        <audio src="' . htmlspecialchars($this->albumTrack->nomFichier) . '" controls style="width:150px;"></audio>
        </div>';
    }

    public function renderLong(): string {
        return '<div class="audio-long" style="padding:20px; border:1px solid #ccc; max-width:600px;">
        <h2>' . htmlspecialchars($this->albumTrack->titre) . '</h2>
        <audio src="' . htmlspecialchars($this->albumTrack->nomFichier) . '" controls style="width:100%;"></audio>
        </div>';
    }

    public function render(int $selector): string {
        switch($selector){
            case "1":
                return $this->renderCompact();
            case "2": 
                return $this->renderLong();
            default: 
                return $this->renderCompact();
        }
    }
}

?>