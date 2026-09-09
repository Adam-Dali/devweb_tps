<?php

//Exo 1
class AlbumTrack extends AudioTrack {

    //public string $titre;
    public string $artiste;
    public string $album;
    //public string $annee;
    public int $numeroPiste;
    //public string $genre;
    //public int $duree;
    //public string $nomFichier;

    public function __construct(string $titrePiste, string $cheminFichier, string $nomAlbum, int $numPiste) {
        parent::__construct($titrePiste, $cheminFichier);
        $this->artiste = "";
        $this->album = $nomAlbum;
        //$this->date = "";
        $this->numeroPiste = $numPiste;
        //$this->genre = "";
        //$this->duree = 0;
    }

    /*public function __toString() : string {
        return json_encode(get_object_vars($this));
    }*/
}


?>