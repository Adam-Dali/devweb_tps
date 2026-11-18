<?php
namespace iutnc\deefy\audio\tracks;
use iutnc\deefy\exception\InvalidPropertyNameException;
use iutnc\deefy\exception\InvalidPropertyValueException;

require_once __DIR__ . '/../../exception/InvalidPropertyNameException.php';
require_once __DIR__ . '/../../exception/InvalidPropertyValueException.php';
class AudioTrack {

    protected ?int $id = null;
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
        else throw new InvalidPropertyNameException(
            $attrname . " : existe pas"
        );
    }

    public function setGenre(string $genre) : void {
        $this->genre = $genre;
    }

    public function setDuree(int $duree) : void {
        if($duree < 0){
            throw new InvalidPropertyValueException(
                $duree . ' est une valeur impossible pour ' . $this->titre
            );
        }
        $this->duree = $duree;
    }

    public function setDate(string $date) : void {
        $this->date = $date;
    }

    public function __toString() : string {
        return json_encode(get_object_vars($this));
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }
}

?>