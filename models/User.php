<?php
include 'db_connect.php';

class User{

    public string $username;
    public string $email;
    public string $password;
    

    public function __construct($username, $email,$password){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
        
    public static function create($username, $email, $userPassword) {
        try {
            $db = connection();

            $stmt = $db->prepare('INSERT INTO user (username, email, user_password, created_at, updated_at) 
                VALUES (:username, :email, :user_password, NOW(), NOW())');

            $hashedPassword = password_hash($userPassword, PASSWORD_ARGON2ID);

            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':user_password', $hashedPassword, PDO::PARAM_STR);
            $stmt->execute();

            $user_id = $db->lastInsertId();

            return new User($user_id, $username, $email, $hashedPassword, new DateTime(), new DateTime());
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

   public static function getByEmail($email){
    try {
        $db = connection();
        $stmt = $db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Si l'email n'existe pas en BDD, on retourne null
        if (!$userData) {
            return null;
        }
        
        // Si l'email existe, on retourne un VRAI objet User
        return new User(
            $userData['username'],
            $userData['email'],
            $userData['user_password']
        );
        
    } catch (PDOException $e) {
        die('Erreur de requête : ' . $e->getMessage());
    }
}

    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getPassword(){return $this->password;}
}