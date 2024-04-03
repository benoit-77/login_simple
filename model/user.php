<?php

require_once(__DIR__ . "/../assets/inc/databaseConnection.php");

Class User {
    public int $id_user;
    public string $email;
    public string $password;

    public static function readOneUser(string $email): User|false {
        global $connection;

        $sql = "SELECT * from users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        $user = $statement->fetch();

        return $user;
    }
}