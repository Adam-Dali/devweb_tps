<?php

//Exo 1
class AlbumTrack {

    public string $titre;
    public string $artiste;
    public string $album;
    public int $annee;
    public int $numeroPiste;
    public string $genre;
    public int $duree;
    public string $nomFichier;

    public function __construct(string $titrePiste, string $cheminFichier, string $nomAlbum, int $numPiste) {
        $this->titre = $titrePiste;
        $this->artiste = "";
        $this->album = $nomAlbum;
        $this->annee = 0;
        $this->numeroPiste = $numPiste;
        $this->genre = "";
        $this->duree = 0;
        $this->nomFichier =  $cheminFichier;
    }

    public function __toString() : string {
        return json_encode(get_object_vars($this));
    }



}


?>