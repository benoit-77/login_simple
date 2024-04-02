<?php

require_once(__DIR__ . "/../assets/inc/databaseConnection.php");

Class User {
    public int $id_user;
    public string $name;
    public string $password;

    public static function readOneUser(string $name): User|false {
        global $pdo;

        $sql = "SELECT * from users WHERE name = :name";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":name", $name, PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        $user = $statement->fetch();

        return $user;
    }
}