<?php

$username = 'root';
$password = '';
$dbName = 'mybookshelf';

try{
    $conn = new PDO("mysql:host=localhost;dbname=$dbName;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Não foi possível se conectar com o banco de dados.");
}

?>