<?php
class PodcastTrack extends AudioTrack {

    public string $auteur;

    public function __construct(string $titre, string $cheminFichier) {
        parent::__construct($titre, $cheminFichier);
        $this->auteur = "";
    }
}


?>