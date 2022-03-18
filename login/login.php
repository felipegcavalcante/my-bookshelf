<?php

session_start();

require_once '../conection.php';

$input = $_POST;

$email = $input["email"];
$password = $input["senha"];

if(empty($email) || empty($password)) {
    $_SESSION['preencha_campos'] = true;
	header('Location: index.php');
	exit();
}

$a = $conn->query("select * from usuario");

$result = $conn->query("SELECT * FROM usuario where email = '{$email}' and senha = '{$password}'");
$result->execute();
$row = $result->fetch(PDO::FETCH_OBJ);
// var_dump($result->rowCount());

if ($result->rowCount() == 1) {
    $_SESSION["id"] = $row->id;
    $_SESSION["nome"] = $row->nome;
    header('Location: ../index.php');
} else {
    $_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

// foreach ($result as $row) {
//     echo $row['nome'] . "- Email:" . $row['email'];
// }

?>