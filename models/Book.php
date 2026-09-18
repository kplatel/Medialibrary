<?php
require_once 'Media.php';

class Book extends Media {

    public int $pageNumber;

    public function __construct($title, $author, $isAvailable, $pageNumber, $image){
        parent::__construct($title, $author, $isAvailable, $image);
        $this->pageNumber = $pageNumber;
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

    public function createBook($pageNumber, $mediaId) {
        $db = connection();
        $stmt = $db->prepare('INSERT INTO book(page_number, id_media, created_at, updated_at) VALUES (:page_number, :id_media, NOW(), NOW())');

        $stmt->bindValue(':page_number', $pageNumber, PDO::PARAM_INT);
        $stmt->bindValue(':id_media', $mediaId, PDO::PARAM_INT);

        $stmt->execute();
        return $db->lastInsertId();
    }

    public static function getBooks(){
    try {
        $db = connection();
        $stmt = $db->prepare("SELECT book.id AS book_id, media.id AS media_id, book.*, media.* FROM book JOIN media ON book.id_media = media.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur de requête : ' . $e->getMessage());
    }
}

    public static function getBookById($bookId){
        try {
            $db = connection();
            $stmt = $db->prepare("SELECT * FROM book WHERE book.id = :id");
            $stmt->bindValue(':id', $bookId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public function update($id, $title, $author, $isAvailable, $pageNumber) {
        try {
            $db = connection();
            $stmt = $db->prepare('UPDATE media 
                JOIN book ON media.id = book.id_media
                SET title = :title, 
                    author = :author, 
                    is_available = :is_available, 
                    page_number = :page_number, 
                    media.updated_at = NOW(),
                    book.updated_at = NOW()  
                WHERE media.id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':author', $author, PDO::PARAM_STR);
            $stmt->bindValue(':is_available', $isAvailable, PDO::PARAM_INT);
            $stmt->bindValue(':page_number', $pageNumber, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public static function delete($id) {
    try {
        $db = connection();
        
        // 1. On récupère d'abord l'id_media lié au livre qu'on supprime
        $stmtCheck = $db->prepare('SELECT id_media FROM book WHERE id = :id');
        $stmtCheck->bindValue(':id', $id, PDO::PARAM_INT);
        $stmtCheck->execute();
        $book = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($book) {
            $idMedia = $book['id_media'];

            // 2. On met à jour la table book (ça fonctionnait déjà)
            $stmtBook = $db->prepare('UPDATE book SET deleted_at = NOW() WHERE id = :id');
            $stmtBook->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtBook->execute();

            // 3. On met à jour la table media en ciblant le BON id_media récupéré
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