<?php

require_once(__DIR__ . "/../assets/inc/databaseConnection.php");

Class User {
    public int $id_user;
    public string $email;
    public string $password;

    public static function create(string $email, string $password) {
        
        global $pdo;

        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->bindParam(":password", $password, PDO::PARAM_STR);
        $statement->execute();
    }

    public static function readOneUser(string $email): User|false {
        global $pdo;

        $sql = "SELECT * from users WHERE email = :email";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        $user = $statement->fetch();

        return $user;
    }
}