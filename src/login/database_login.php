<?php

include './../config/database.php';

class DatabaseLogin
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function login (string $email, string $password): array
    {
        $sql = "SELECT id, nome AS name FROM usuario WHERE email = :email AND senha = :password;";
        $result = $this->connection->prepare($sql);

        $result->bindParam('email', $email, PDO::PARAM_STR);
        $result->bindParam('password', $password, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();

        return ($data !== false) ? $data : [];
    }
}