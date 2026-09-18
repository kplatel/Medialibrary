<?php
    function connection(){
        $serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $base_de_donnees = "mediatheque";

        try {
            $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connexion;
        } catch (PDOException $e) {
            die("Échec de la connexion : " . $e->getMessage());
        }
    }
