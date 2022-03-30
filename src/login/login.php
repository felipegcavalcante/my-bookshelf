<?php

session_start();

require_once '../../connection.php';

$input = $_POST;

$email = $input["email"];
$password = $input["senha"];

if(empty($email) || empty($password)) {
    $_SESSION['flash_message'] = [
        'type' => 'error',
        'message' => 'Preencha todos os campos!'
    ];
    header('Location: index.php');
	exit();
}

$result = $conn->query("SELECT * FROM usuario where email = '{$email}' and senha = '{$password}'");
$result->execute();
$row = $result->fetch(PDO::FETCH_OBJ);

if ($result->rowCount() == 1) {
    $_SESSION["id"] = $row->id;
    $_SESSION["nome"] = $row->nome;
    header('Location: ../books/index.php');
} else {
    $_SESSION['flash_message'] = [
        'type' => 'error',
        'message' => 'Login ou senha incorretos!'
    ];
    header('Location: index.php');
	exit();
}
?>