<?php
class AudioTrack {

    protected string $titre;
    protected string $genre;
    protected int $duree;
    protected string $nomFichier;

    protected string $date;

    public function __construct(string $titre, string $cheminFichier) {
        $this->titre = $titre;
        $this->genre = "";
        $this->duree = 0;
        $this->date = "";
        $this->nomFichier = $cheminFichier;
    }

    public function __get(string $attrname) : mixed {
        if (property_exists($this, $attrname)) {
            return $this->$attrname;
        }
        throw new Exception($attrname . " : invalid property");
    }

    public function setGenre(string $genre) : void {
        $this->genre = $genre;
    }

    public function setDuree(int $duree) : void {
        $this->duree = $duree;
    }

    public function setDate(string $date) : void {
        $this->date = $date;
    }

    public function __toString() : string {
        return json_encode(get_object_vars($this));
    }
}

?>