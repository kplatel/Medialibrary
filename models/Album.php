<?php

class Album extends Media{

    public int $trackNumber;
    public string $editor;

    public function __construct($title, $author, $isAvailable){
            parent::__construct($title, $author, $isAvailable);

        }
    
    
}