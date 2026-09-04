<?php

//Exo 1
$playlist = [
    "nom" => "Falcom Playlist 4",
    "genre" => "Rock",
    "createur" => "moi",
    "date" => "04/09/2026",
    "nbPistes" => 20,
    "duree" => 120,
];

//Exo 2
function display(array $playlist) : string {
    return "playlist : " . $playlist["nom"] . " (" . $playlist["genre"] . ")
    par " . $playlist["createur"] . " le " . $playlist["date"] . "\n" . 
    $playlist["nbPistes"] . " pistes pour une durée totale de " . $playlist["duree"] . "s. \n" ;
}

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

print display_track($pisteAudio2, "étendu");

?>