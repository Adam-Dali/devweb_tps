<?php
namespace iutnc\deefy\audio\tracks;

class PodcastTrack extends AudioTrack {

    protected string $auteur;

    public function __construct(string $titre, string $cheminFichier) {
        parent::__construct($titre, $cheminFichier);
        $this->auteur = "";
    }

    public function setAuteur(string $auteur) : void {
        $this->auteur = $auteur;
    }
}


?>