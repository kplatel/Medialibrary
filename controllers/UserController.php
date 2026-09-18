<?php

require_once ROOT . 'models/User.php';

function signin(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $userPassword = $_POST['password'];
        $error = "";

        if (isset($username,$email,$userPassword)){

        if(empty($username) && empty($email)&& empty($userPassword)){
            $error = "Erreur, tous les champs doivent être remplis";
        }

        $existingUser = User::getByEmail($email);

        if($userPassword === $username){
            $error = "L'identifiant et le mot de passe ne doivent pas être identique";
        }

        if (strlen($userPassword) < 8) {
            $error = "Le mot de passe doit faire au moins 8 caractères.";
        }
        elseif (!preg_match('/[A-Z]/', $userPassword)) {
            $error = "Le mot de passe doit contenir au moins une majuscule.";
        }
        elseif (!preg_match('/[a-z]/', $userPassword)) {
            $error = "Le mot de passe doit contenir au moins une minuscule.";
        }
        elseif (!preg_match('/[0-9]/', $userPassword)) {
            $error = "Le mot de passe doit contenir au moins un chiffre.";
        }
        elseif (!preg_match('/[\W_]/', $userPassword)) {
            $error = "Le mot de passe doit contenir au moins un caractère spécial.";
        }

        elseif($error === ""){


        if ($existingUser) {
            $mailTaken = "L'adresse e-mail existe déjà.";

        } else {
            $user = User::create($username, $email, $userPassword);

            if ($user) {
                $message = "Inscription réussie !";
                
            } else {
                $message = "Erreur lors de l'inscription.";
            }
        }
        }
    }
    }
    require_once 'views/User/signin.php';
}

function login(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $userPassword = $_POST['password'];

        $user = User::getByEmail($email);

        if ($user && password_verify($userPassword, $user->getPassword())) {
            
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['email'] = $user->getEmail();
            header("Location:/Bachelor/TP_2/Book/library");
            exit();
        } else {
            $message = "Identifiants incorrects. Veuillez réessayer.";
        }
    }

    require_once 'views/User/login.php';
}