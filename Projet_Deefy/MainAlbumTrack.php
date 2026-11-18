<?php

/*Exo 2
require_once 'src/classes/iutnc/deefy/audio/tracks/AudioTrack.php';
require_once 'src/classes/iutnc/deefy/audio/tracks/AlbumTrack.php';
require_once 'src/classes/iutnc/deefy/audio/tracks/PodcastTrack.php';
require_once 'src/classes/iutnc/deefy/audio/lists/AudioList.php';
require_once 'src/classes/iutnc/deefy/audio/lists/Album.php';
require_once 'src/classes/iutnc/deefy/audio/lists/Playlist.php';
require_once 'src/classes/iutnc/deefy/render/Renderer.php';
require_once 'src/classes/iutnc/deefy/render/AudioTrackRenderer.php';
require_once 'src/classes/iutnc/deefy/render/AlbumTrackRenderer.php';
require_once 'src/classes/iutnc/deefy/render/PodcastRenderer.php';
require_once 'src/classes/iutnc/deefy/render/AudioListRenderer.php';
require_once 'src/classes/iutnc/deefy/exception/InvalidPropertyNameException.php';
require_once 'src/classes/iutnc/deefy/exception/InvalidPropertyValueException.php';*/

/*require_once 'src/loader/Psr4ClassLoader.php';
$loader = new Psr4ClassLoader("iutnc\\deefy\\", "src/classes");
$loader->register();*/

require_once 'vendor/autoload.php';

session_start();

use iutnc\deefy\audio\tracks\AudioTrack;
use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\audio\tracks\PodcastTrack;

use iutnc\deefy\audio\lists\AudioList;
use iutnc\deefy\audio\lists\Album;
use iutnc\deefy\audio\lists\Playlist;

use iutnc\deefy\render\Renderer;
use iutnc\deefy\render\AudioTrackRenderer;
use iutnc\deefy\render\AlbumTrackRenderer;
use iutnc\deefy\render\PodcastRenderer;
use iutnc\deefy\render\AudioListRenderer;

use iutnc\deefy\exception\InvalidPropertyNameException;
use iutnc\deefy\exception\InvalidPropertyValueException;

use iutnc\deefy\action\Action;
use iutnc\deefy\action\AddPlaylistAction;
use iutnc\deefy\action\AddPodcastTrackAction;
use iutnc\deefy\action\DefaultAction;
use iutnc\deefy\action\DisplayPlaylistAction;
use iutnc\deefy\action\AddUserAction;
use \iutnc\deefy\action\DisplayPlaylistsAction;

use iutnc\deefy\dispatch\Dispatcher;

\iutnc\deefy\repository\DeefyRepository::setConfig( __DIR__ . '/src/config/deefy.db.ini');

try {
    $ab = new AlbumTrack("The Cradle by Starlight", "4-21. The Cradle by Starlight.mp3", "Kai no Kiseki OST", 1);
    $ab->setArtiste("Falcom Sound Team jdk | Yukihiro Jindo");
    $ab->setDate("09/2024");
    $ab->setDuree(240);
    $ab->setGenre("Beautiful");

    $ac = new AlbumTrack("Large Map", "1-12. Large Map.mp3", "Shin Megami Tensei IV Final OST", 2);
    $ac->setArtiste("Atlus | Ryota Kozuka");
    $ac->setDate("2016");
    $ac->setDuree(140);
    $ac->setGenre("Grand");

    $ad = new PodcastTrack("PasUnPodcastMaisCaPasseQuandMeme", "1-07. Feelings -re.mp3");
    $ad->setDate("08/2021");
    $ad->setDuree(240);
    $ad->setAuteur("Type-Moon");
    $ad->setGenre("piano");

    /*echo $ab . "\n";
    print $ab . "\n";
    printf($ab);*/
    /*echo $ab->__toString() . "\n";
    print_r($ab->__toString()) . "\n";
    var_dump($ab->__toString()) . "\n";*/

    $render = new AlbumTrackRenderer($ab);
    $render2 = new AlbumTrackRenderer($ac);
    $render3 = new PodcastRenderer($ad);

    $album = new Album(
        "Video Games OST",
        [$ab, $ac],
    );

    /*
    $album->setArtiste("Des bon gars");
    $album->setDateSortie("2016 et 2024");

    echo "Nom de l'album : " . $album->nom . "\n";
    echo "Artiste : " . $album->artiste . "\n";
    echo "Date de sortie : " . $album->dateSortie . "\n";
    echo "Nombre de pistes : " . $album->nbPistes . "\n";
    echo "Durée totale : " . $album->dureeTotale . " secondes\n";

    $albumRenderer = new AudioListRenderer($album);


    $playlist = new Playlist("Ma playlist");

    $playlist->ajouterPiste($ab);
    $playlist->ajouterPiste($ac);
    $playlist->ajouterPiste($ad);

    echo "Nom de la playlist : " . $playlist->nom . "\n";
    echo "Nombre de pistes : " . $playlist->nbPistes . "\n";
    echo "Durée totale : " . $playlist->dureeTotale . " secondes\n";


    $playlist->retirerPiste(1);

    echo "Après suppression :\n";
    echo "Nombre de pistes : " . $playlist->nbPistes . "\n";
    echo "Durée totale : " . $playlist->dureeTotale . " secondes\n";


    $playlist->ajouterListeDePistes([$ab, $ac, $ad]);

    echo "Après ajout de plusieurs pistes :\n";
    echo "Nombre de pistes : " . $playlist->nbPistes . "\n";
    echo "Durée totale : " . $playlist->dureeTotale . " secondes\n";

    $playlistRenderer = new AudioListRenderer($playlist);


    print $ac;
    print $ad;
    print $render->render(2);
    print $render2->render(2);
    print $render3->render(2);
    print $albumRenderer->render(2);
    print $playlistRenderer->render(2);*/

    //EXO 11 
    /*$_POST['titre'] = "musique1";
    $_POST['chemin'] = "1-03 Omen.mp3";

    $action = new iutnc\deefy\action\DisplayPlaylistAction();
    echo $action->execute();*/
    
    $dispatcher = new iutnc\deefy\dispatch\Dispatcher();
    $dispatcher->addRoute('default', DefaultAction::class);
    $dispatcher->addRoute('playlist', DisplayPlaylistAction::class);
    $dispatcher->addRoute('add-playlist', AddPlaylistAction::class);
    $dispatcher->addRoute('add-track', AddPodcastTrackAction::class);
    $dispatcher->addRoute('add-user', AddUserAction::class);
    $dispatcher->addRoute('playlists',DisplayPlaylistsAction::class);

    $dispatcher->run();

    //URLs à tester : ?action=playlist
    //?action=ajoutPlaylist
    //?action=ajoutPodcast
    //?action=default


} catch(InvalidPropertyNameException $e){
    echo $e->getMessage();
} catch(InvalidPropertyValueException $e){
    echo $e->getMessage();
}

?>