<?php
require_once 'Media.php';

class Movie extends Media {

    public float $duration;
    public string $genre;

    public function __construct($title, $author, $isAvailable, $duration, $genre, $image) {
        parent::__construct($title, $author, $isAvailable, $image);
        $this->duration = $duration;
        $this->genre = $genre;
    }
    
    public function createMedia($title, $author, $isAvailable, $image) {
        $db = connection();
        $stmt = $db->prepare('INSERT INTO media (title, author, is_available, created_at, updated_at, imageMedia) VALUES (:title, :author, :is_available, NOW(), NOW(), :imageMedia)');
        $stmt->execute([
            ':title' => $title,
            ':author' => $author,
            ':is_available' => $isAvailable,
            ':imageMedia' => $image
        ]);
        
        return $db->lastInsertId();
    }

    public function createMovie($duration, $genre, $mediaId) {
        $db = connection();
        // Suppression de created_at et updated_at (absents de la table movie)
        $stmt = $db->prepare('INSERT INTO movie(duration, genre, id_media) VALUES (:duration, :genre, :id_media)');

        $stmt->bindValue(':duration', $duration, PDO::PARAM_STR); 
        $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindValue(':id_media', $mediaId, PDO::PARAM_INT);

        $stmt->execute();
        return $db->lastInsertId();
    }

    public static function getMovies(){
        try {
            $db = connection();
            $stmt = $db->prepare("SELECT movie.id AS movie_id, media.id AS media_id, movie.*, media.* FROM movie JOIN media ON movie.id_media = media.id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public static function getMovieById($movieId){
        try {
            $db = connection();
            // Jointure pour récupérer à la fois les infos du film et du média associé
            $stmt = $db->prepare("SELECT movie.id AS movie_id, media.id AS media_id, movie.*, media.* FROM movie JOIN media ON movie.id_media = media.id WHERE movie.id = :id");
            $stmt->bindValue(':id', $movieId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public function update($id, $title, $author, $isAvailable, $duration, $genre) {
        try {
            $db = connection();
            // Retrait de movie.updated_at qui n'existe pas dans la table
            $stmt = $db->prepare('UPDATE media 
                JOIN movie ON media.id = movie.id_media
                SET title = :title, 
                    author = :author, 
                    is_available = :is_available, 
                    duration = :duration, 
                    genre = :genre,
                    media.updated_at = NOW()  
                WHERE movie.id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); // $id correspond ici au movie_id
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':author', $author, PDO::PARAM_STR);
            $stmt->bindValue(':is_available', $isAvailable, PDO::PARAM_INT);
            $stmt->bindValue(':duration', $duration, PDO::PARAM_STR);
            $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public static function delete($id) {
        try {
            $db = connection();
            
            $stmtCheck = $db->prepare('SELECT id_media FROM movie WHERE id = :id');
            $stmtCheck->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtCheck->execute();
            $movie = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            if ($movie) {
                $idMedia = $movie['id_media'];

                $stmtMovie = $db->prepare('DELETE FROM movie WHERE id = :id');
                $stmtMovie->bindValue(':id', $id, PDO::PARAM_INT);
                $stmtMovie->execute();

                $stmtMedia = $db->prepare('UPDATE media SET deleted_at = NOW() WHERE id = :idMedia');
                $stmtMedia->bindValue(':idMedia', $idMedia, PDO::PARAM_INT);
                $stmtMedia->execute();
            }

            return true; 
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
            return false; 
        }
    }
}