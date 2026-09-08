<?php

//Exo 1
$playlist = [
    "nom" => "Falcom Playlist 4",
    "genre" => "Rock",
    "createur" => "moi",
    "date" => "04/09/2026",
    "nbPistes" => 20,
    "duree" => 120,
    "pistes" => [],
];

//Exo 2
/*function display(array $playlist) : string {
    return "playlist : " . $playlist["nom"] . " (" . $playlist["genre"] . ")
    par " . $playlist["createur"] . " le " . $playlist["date"] . "\n" . 
    $playlist["nbPistes"] . " pistes pour une durée totale de " . $playlist["duree"] . "s. \n" ;
}*/

//print display($playlist);

//Exo 3
$pisteAudio1 = [
    "titre" => "To Confirm my Existence",
    "artiste" => "Falcom Sound Team jdk",
    "album" => "Kai no Kiseki OST",
    "annee" => 2024,
    "genre" => "épique",
    "numero" => 1,
    "duree" => 180,
];

$pisteAudio2 = [
    "titre" => "Nox Lux",
    "artiste" => "Myth & Roid",
    "album" => "Re:Zero OST",
    "annee" => 2024,
    "genre" => "épique",
    "numero" => 2,
    "duree" => 240,
];

$pisteAudio3 = [
    "titre" => "To the Beggining",
    "artiste" => "Kalafina",
    "album" => "Fate/Zero OST",
    "annee" => 2012,
    "genre" => "épique",
    "numero" => 3,
    "duree" => 300,
];

//Exo 4
function display_track(array $pisteAudio, string $affichage = "court") : string {
    $aff = "";
    switch($affichage) {
        case("court") : 
            $aff = $pisteAudio["titre"] . " - by " . $pisteAudio["artiste"] . " (from " . $pisteAudio["album"] . ").";
            break;

        case("complet") : 
            $aff = $pisteAudio["numero"] . " - " . $pisteAudio["titre"] . " - by " . $pisteAudio["artiste"] . " (from " . $pisteAudio["album"] . ") - " . $pisteAudio["duree"] . "s.";
            break;
        
        case("étendu") :
            $aff = $pisteAudio["numero"] . " - " . $pisteAudio["titre"] . " - by " . $pisteAudio["artiste"] . " (from " . $pisteAudio["album"] . ") - " . $pisteAudio["duree"] . "s : " . $pisteAudio["genre"];
            break;

        default : 
            $aff = $pisteAudio["titre"] . " - by " . $pisteAudio["artiste"] . " (from " . $pisteAudio["album"] . ").";
            break;
    }
    return $aff;
}

//print display_track($pisteAudio2, "étendu");

//Exo 5
function play_track(array $pisteAudio) : string {
    $aff = $pisteAudio["titre"] . " ";
    $compt = 0;

    for ($compt = 0; $compt <= $pisteAudio["duree"]; $compt++) {
        $aff .= $compt . ".";
    }
    return $aff . "\n";
}
//print play_track($pisteAudio2);

//Exo 6
function add_tracks(array $playlist, array $pisteAudio) : array {
    array_push($playlist["pistes"], $pisteAudio);
    return $playlist;
}

//Exo 7

function display(array $playlist) : string {
    $st1 = "playlist : " . $playlist["nom"] . " (" . $playlist["genre"] . ")
    par " . $playlist["createur"] . " le " . $playlist["date"] . "\n" . 
    $playlist["nbPistes"] . " pistes pour une durée totale de " . $playlist["duree"] . "s. \n";

    $st2 = "";
    $compt = 1;

    foreach($playlist["pistes"] as $p) {
        $st2 .= $compt . " - " . display_track($p, "court") . " \n";
        $compt++;
    }
    return $st1 . $st2;
}

$playU1 = add_tracks($playlist, $pisteAudio1);
$playU2 = add_tracks($playU1, $pisteAudio2);
$playU3 = add_tracks($playU2, $pisteAudio3);
//print display($playU3);

//Exo 8
function play(array $playlist) : void {
    foreach( $playlist["pistes"] as $piste) {
        print play_track( $piste);
    }
}


//Exo 9
function remove_track(array $playlist, int $num) : array {
    unset($playlist["pistes"][$num]);
    return $playlist;
    //$playlist["pistes"] = array_values($playlist["pistes"]);
}

$playU4 = remove_track($playU3, 0);
//print display($playU4);

//Exo 10

function pl_shuffle($playlist) : array {
    shuffle($playlist["pistes"]);
    return $playlist;
}

$playU5 = pl_shuffle($playU3);
print display($playU5);

?>