<?php
abstract class AudioTrackRenderer implements Renderer {

    public AudioTrack $audioTrack;

    public function __construct(AudioTrack $at) {
        $this->audioTrack = $at;
    }

    public function renderCompact(): string {
        return '<div class="audio-compact" style="margin-bottom:10px;">
        <audio src="' . htmlspecialchars($this->audioTrack->nomFichier) . '" controls style="width:150px;"></audio>
        </div>';
    }

    public abstract function renderLong(): string;

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