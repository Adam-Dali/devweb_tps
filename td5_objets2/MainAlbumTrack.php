<?php
//Exo 2
require_once 'AudioTrack.php';
require_once 'Renderer.php';
require_once 'AudioTrackRenderer.php';
require_once 'AlbumTrack.php';
require_once 'AlbumTrackRenderer.php';
require_once 'PodcastTrack.php';
require_once 'PodcastRenderer.php';
require_once 'InvalidPropertyNameException.php';
require_once 'InvalidPropertyValueException.php';
require_once 'AudioList.php';
require_once 'Album.php';
require_once 'Playlist.php';
require_once 'AudioListRenderer.php';

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


    /*print $ac;
    print $ad;
    print $render->render(2);
    print $render2->render(2);
    print $render3->render(2);*/
    print $albumRenderer->render(2);
    print $playlistRenderer->render(2);


} catch(InvalidPropertyNameException $e){
    echo $e->getMessage();
} catch(InvalidPropertyValueException $e){
    echo $e->getMessage();
}

?>