<?php
class AudioTrack {

    public string $titre;
    public string $genre;
    public int $duree;
    public string $nomFichier;

    public string $date;

    public function __construct(string $titre, string $cheminFichier) {
        $this->titre = $titre;
        $this->genre = "";
        $this->duree = 0;
        $this->date = "";
        $this->nomFichier = $cheminFichier;
    }

    public function __toString() : string {
        return json_encode(get_object_vars($this));
    }
}

?>