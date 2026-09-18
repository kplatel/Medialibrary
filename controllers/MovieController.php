<?php

require_once ROOT . 'models/Movie.php';

function add(){

    $inputAvailability = false;
    if (isset($_POST['movieTitle'], $_POST['movieDirector'], $_POST['duration'], $_POST['genre'], $_POST['availability'], $_POST['image'])) {
        $title = $_POST['movieTitle'];
        $director = $_POST['movieDirector']; // ou author selon ta nomenclature
        $duration = $_POST['duration'];
        $genre = $_POST['genre'];
        $availability = $_POST['availability'];
        $image = $_POST['image'];
    
        if (!empty($title) && !empty($director) && !empty($duration) && !empty($genre) && !empty($availability) && !empty($image)){
            if($availability === 'yes'){
                $inputAvailability = true;
            }
            
            $movie = new Movie($title, $director, $inputAvailability, $duration, $genre, $image);
            $mediaId = $movie->createMedia($title, $director, $inputAvailability, $image);
            $movie->createMovie($duration, $genre, $mediaId);
            $message = "Film ajouté avec succès";

        } else {
            $error = "Tous les champs doivent être remplis";
        }
    }

    require_once ('views/movie/form.php'); 
}

function library(){

    $movies = Movie::getMovies();

    require_once ('views/movie/library.php'); 
}

function update($id)
{
    $movie = Movie::getMovieById($id);
    if (!$movie) {
        $message = "Film introuvable";
    } else {
        require_once('views/movie/updateForm.php');
    }
}

function delete($id) {
    $movie = Movie::getMovieById($id);
    if(!$movie){
        $message = "Film introuvable";
    } else {
        Movie::delete($id);
    }

    $movies = Movie::getMovies();
    header('Location: /Bachelor/TP_2/Movie/library'); // Redirection vers la bibliothèque de films
}