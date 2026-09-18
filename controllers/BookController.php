<?php

require_once ROOT . 'models/Book.php';

function add(){

    $inputAvaibility = false;
    if (isset($_POST['bookTitle'], $_POST['bookAuthor'], $_POST['pageNumber'],$_POST['availability'],$_POST['image'])) {
        $title = $_POST['bookTitle'];
        $author = $_POST['bookAuthor'];
        $pageNumber = $_POST['pageNumber'];
        $availability = $_POST['availability'];
        $image = $_POST['image'];
    
    if (!empty($title) && !empty($author)&& !empty($pageNumber) && !empty($availability) && !empty($image)){
        if($availability === 'yes'){
            $inputAvaibility = true;
        }
        
        $book = new Book($title,$author,$inputAvaibility,$pageNumber,$image);
        $mediaId = $book->createMedia($title,$author,$inputAvaibility,$image);
        $book->createBook($pageNumber,$mediaId);
        $message="Livre ajouté avec succès";

    } else{
        $error=  "Tous les champs doivent être remplis";
    }
    }

       

    require_once ('views/book/form.php');
}

function library(){

    $books = Book::getBooks();

    require_once ('views/book/library.php');
}

function update($id)
{
    $book = Book::getBookById($id);
    if (!$book) {
        $message = "Livre introuvable";
    } else {
        require_once('views/book/updateForm.php');
    }
}

function delete($id) {
    $book = Book::getBookById($id);
    if(!$book){
        $message = "Livre introuvable";
    } else {
        Book::delete($id);
    }

    $books = Book::getBooks();
    header('Location: /Bachelor/TP_2/Book/library');
}



