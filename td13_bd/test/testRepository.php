
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use iutnc\deefy\repository\DeefyRepository;
use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\audio\tracks\PodcastTrack;

DeefyRepository::setConfig(
    __DIR__ . '/../src/config/deefy.db.ini'
);

$repo = DeefyRepository::getInstance();

$playlists = $repo->findAllPlaylists();

foreach ($playlists as $pl) {
    print "Playlist : " . $pl->nom
        . " - ID : " . $pl->id . "\n";
}



$pl = new Playlist('Ma playlist');

$pl = $repo->saveEmptyPlaylist($pl);

print "Playlist créée : " . $pl->nom
    . " - ID : " . $pl->id . "\n";


$track = new PodcastTrack(
    'Mon podcast',
    'mon_podcast.mp3'
);

$track->setAuteur('Mon auteur');
$track->setGenre('Documentaire');
$track->setDuree(120);
$track->setDate('2024-01-15');

$track = $repo->savePodcastTrack($track);

print "Podcast enregistré : " . $track->titre
    . " - ID : " . $track->id . "\n";

$repo->addTrackToPlaylist($pl->id, $track->id);

print "Piste ajoutée à la playlist !\n";
