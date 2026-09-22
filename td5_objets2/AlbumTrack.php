<?php

//Exo 1
class AlbumTrack extends AudioTrack {

    protected string $artiste;
    protected string $album;
    protected int $numeroPiste;


    public function __construct(string $titrePiste, string $cheminFichier, string $nomAlbum, int $numPiste) {
        parent::__construct($titrePiste, $cheminFichier);
        $this->artiste = "";
        $this->album = $nomAlbum;
        $this->numeroPiste = $numPiste;
    }

    public function setArtiste(string $artiste) : void {
        $this->artiste = $artiste;
    }

    public function setAlbum(string $album) : void {
        $this->album = $album;
    }

    public function setNumero(int $num) : void {
        $this->numeroPiste = $num;
    }
}


?>