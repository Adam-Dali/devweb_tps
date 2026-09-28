<?php
class AudioList {

    protected string $nom;
    protected int $nbPistes;
    protected int $dureeTotale;
    protected array $pistes;

    public function __construct(string $name, array $tracks = [ ]){
        $this->nom = $name;
        $this->pistes = $tracks;
        $this->nbPistes = count($tracks);
        $this->dureeTotale = 0;

        foreach($tracks as $piste) {
            $this->dureeTotale += $piste->duree;
        }
    }

    public function __get($attrname){
        if (!property_exists($this, $attrname)) {
            throw new InvalidPropertyNameException(
                "La propriété '$attrname' n'existe pas."
            );
        }
        return $this->$attrname;
    }
}
?>