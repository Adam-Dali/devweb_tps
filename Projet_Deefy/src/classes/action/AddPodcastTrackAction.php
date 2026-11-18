<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\tracks\PodcastTrack;
use iutnc\deefy\render\AudioListRenderer;

class AddPodcastTrackAction extends Action {

    public function execute() : string {

        if (!isset($_SESSION['playlist'])) {
            return '<p>Aucune playlist en session. Créez en une ici : </p>
            <a href="?action=add-playlist">Créer une playlist</a>';
        }

        // requête get
        if ($this->http_method === 'GET') {

            return <<<HTML
                <h2>Ajouter une piste à la playlist</h2>

                <form method="post" action="?action=add-track" enctype="multipart/form-data">

                    <label for="titre">Titre :</label>
                    <input type="text" name="titre" id="titre" required>

                    <br><br>

                    <label for="auteur">Auteur :</label>
                    <input type="text" name="auteur" id="auteur" required>

                    <br><br>

                    <label for="date">Date :</label>
                    <input type="text" name="date" id="date">

                    <br><br>

                    <label for="genre">Genre :</label>
                    <input type="text" name="genre" id="genre">

                    <br><br>

                    <label for="duree">Durée (en secondes) :</label>
                    <input type="number" name="duree" id="duree" min="0" required>

                    <br><br>

                    <label for="userfile">Fichier audio MP3 :</label>
                    <input type="file" name="userfile" id="userfile" accept=".mp3,audio/mpeg" required>

                    <br><br>

                    <button type="submit">Ajouter la piste</button>

                </form>
                HTML;
        }

        // requête post
        if ($this->http_method === 'POST') {

            $titre = filter_var($_POST['titre'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $auteur = filter_var($_POST['auteur'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $date = filter_var($_POST['date'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $genre = filter_var($_POST['genre'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $duree = filter_var($_POST['duree'] ?? '', FILTER_VALIDATE_INT);

            if (trim($titre) === '' || trim($auteur) === '' ||
                $duree === false || $duree < 0) {
                return '<p>Informations invalides.</p>';
            }

            if (!isset($_FILES['userfile']) ||
                $_FILES['userfile']['error'] !== UPLOAD_ERR_OK) {
                return '<p>Erreur lors de l\'envoi du fichier.</p>';
            }

            $fichier = $_FILES['userfile'];

            if (strtolower(substr($fichier['name'], -4)) !== '.mp3') {
                return '<p>Seuls les fichiers MP3 sont autorisés.</p>';
            }

            if ($fichier['type'] !== 'audio/mpeg') {
                return '<p>Type de fichier incorrect.</p>';
            }

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $fichier['tmp_name']);
            finfo_close($finfo);

            if ($mime !== 'audio/mpeg') {
                return '<p>Le fichier envoyé n\'est pas un véritable MP3.</p>';
            }

            $nomFichier = bin2hex(random_bytes(16)) . '.mp3';
            $dossierAudio = dirname(__DIR__, 3) . '/audio';

            if (!is_dir($dossierAudio)) {
                mkdir($dossierAudio, 0775, true);
            }

            $destination = $dossierAudio . '/' . $nomFichier;

            if (!move_uploaded_file($fichier['tmp_name'], $destination)) {
                return '<p>Impossible de sauvegarder le fichier audio.</p>';
            }

            $track = new PodcastTrack($titre, 'audio/' . $nomFichier);

            $track->setAuteur($auteur);
            $track->setDate($date);
            $track->setGenre($genre);
            $track->setDuree($duree);

            $playlist = $_SESSION['playlist'];
            $playlist->ajouterPiste($track);

            $_SESSION['playlist'] = $playlist;

            $renderer = new AudioListRenderer($playlist);

            return '<h2>Piste ajoutée avec succès !</h2>'
                . $renderer->render(2)
                . '<p><a href="?action=add-track">Ajouter encore une piste</a></p>';
        }
        return '<p>Méthode HTTP non autorisée.</p>';
    }
}
