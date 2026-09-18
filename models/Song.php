<?php

class Song extends Media{

    public int $note;
    public float $duration;

    public function __construct($title, $author, $isAvailable,$note,$duration){
            parent::__construct($title, $author, $isAvailable);

            $this->note = $note;
            $this->duration = $duration;

        }
    
    
}