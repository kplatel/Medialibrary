<?php
include 'db_connect.php';

    abstract class Media {

    protected int $id;
    protected string $title;
    protected string $author;
    protected bool $isAvailable = true;
    protected string $image;

    public function __construct($title, $author,$isAvailable,$image){
        $this->title = $title;
        $this->author = $author;
        $this->isAvailable = $isAvailable;
        $this->image = $image;
    }

    public function borrow(){
        if($this->isAvailable){
            echo "<p>Vous avez emprunté".$this->title."de".$this->author."</p>";
            $this->isAvailable = false;
        }
        else{
            echo "<p>Ce média est indisponible pour le moment car il a été emprunté</p>";
        }
        
    }

    public function giveBack(){
        $this->isAvailable = true;
        echo "<p> Merci d'avoir rendu ".$this->title.". Nous espérons que cette ressource vous a plu.</p>";
        
    }
     
    public function gettitle() { return $this->title; }
    public function getauthor() { return $this->author; }

    public function setTitle($newtitle) { $this->title = $newtitle; }
    public function setAuthor($newauthor){$this->author = $newauthor;}

}

?>