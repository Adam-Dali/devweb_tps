<?php

require_once 'AudioList.php';
class Album extends AudioList {

    protected string $artiste;
    protected string $dateSortie;

    public function __construct(string $name, array $tracks = []){
        parent::__construct($name, $tracks);
    }

    public function setArtiste(string $artist) : void {
        $this->artiste = $artist;
    }

    public function setDateSortie(string $releaseDate) : void {
        $this->dateSortie = $releaseDate;
    }

}
?>