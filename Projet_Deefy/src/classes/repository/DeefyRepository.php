<?php

namespace iutnc\deefy\repository;

use PDO;
use PDOException;
use RuntimeException;
use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\audio\tracks\PodcastTrack;

class DeefyRepository {
    private static ?array $config = null;
    private static ?DeefyRepository $instance = null;

    private PDO $db;

    private function __construct() {
        if (self::$config === null) {
            throw new RuntimeException(
                "La config n est pas définie"
            );
        }

        $dsn = self::$config['driver'] . ':host='
            . self::$config['host'] . ';dbname='
            . self::$config['database'] . ';charset='
            . (self::$config['charset'] ?? 'utf8');

        try {
            $this->db = new PDO(
                $dsn,
                self::$config['username'],
                self::$config['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            throw new RuntimeException("Erreur de connexion : " . $e->getMessage(), 0, $e);
        }
    }

    public static function setConfig(string $file) : void {
        $config = parse_ini_file($file);

        if ($config === false) {
            throw new RuntimeException(
                "Impossible de charger le fichier de configuration."
            );
        }

        self::$config = $config;
        self::$instance = null;
    }

    public static function getInstance() : DeefyRepository {
        if (self::$instance === null) {
            self::$instance = new DeefyRepository();
        }
        return self::$instance;
    }

    public function findAllPlaylists() : array {
        $sql = "SELECT id, nom FROM playlist";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll();

        $playlists = [];

        foreach ($rows as $row) {
            $pl = new PlayList($row['nom']);
            $pl->setId((int) $row['id']);
            $playlists[] = $pl;
        }
        return $playlists;
    }

    public function saveEmptyPlaylist(PlayList $pl) : PlayList {
        $sql = "INSERT INTO playlist (nom) VALUES (:nom)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nom' => $pl->nom
        ]);
        $pl->setId((int) $this->db->lastInsertId());
        return $pl;
    }

    public function savePodcastTrack(PodcastTrack $track) : PodcastTrack {
        $sql = "INSERT INTO track
        (titre, genre, duree, filename, type,
        auteur_podcast, date_posdcast)
        VALUES
        (:titre, :genre, :duree, :filename, 'P',
        :auteur, :date)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':titre' => $track->titre,
            ':genre' => $track->genre,
            ':duree' => $track->duree,
            ':filename' => $track->nomFichier,
            ':auteur' => $track->auteur,
            ':date' => $track->date
        ]);

        $track->setId((int) $this->db->lastInsertId());

        return $track;
    }

    public function addTrackToPlaylist(int $idPlaylist, int $idTrack) : void {
        $sql = "SELECT COALESCE(MAX(no_piste_dans_liste), 0) + 1
                FROM playlist2track
                WHERE id_pl = :id_pl";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id_pl' => $idPlaylist
        ]);

        $numero = (int) $stmt->fetchColumn();

        $sql = "INSERT INTO playlist2track
                (id_pl, id_track, no_piste_dans_liste)
                VALUES (:id_pl, :id_track, :numero)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id_pl' => $idPlaylist,
            ':id_track' => $idTrack,
            ':numero' => $numero
        ]);
    }




}
