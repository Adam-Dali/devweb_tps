<?php
require_once 'AudioList.php';
class Playlist extends AudioList {

    public function __construct(string $name, array $tracks = []){
        parent::__construct($name, $tracks);
    }

    public function ajouterPiste($piste) : void {
        $this->pistes = $piste;
        $this->nbPistes = count($this->pistes);
        $this->nbPistes += $piste->duree;
    }

    public function retirerPiste(int $index) : void {
        if(isset($this->pistes[$index])){
            $this->dureeTotale -= $this->pistes[$index]->duree;
            unset($this->pistes[$index]);
            $this->pistes = array_values($this->pistes);
            $this->nbPistes = count($this->pistes);
        }
    }

    public function ajouterListeDePistes(array $listePistes) : void {
        foreach($listePistes as $p){
            if(!in_array($p, $this->pistes, true)){
                $this->ajouterPiste($p);
            }
        }
    }


}
?>