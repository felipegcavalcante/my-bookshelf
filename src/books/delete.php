<?php
session_start();
require_once "../../conection.php";
if(!isset($_SESSION["nome"])) {
    header('Location: ../login/index.php');
    exit();
}

$nome = $_SESSION["nome"];
$id_usuario = $_SESSION["id"];

// $input = $_POST;

// $id_livro = $input['id_livro'];

$id_livro = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = $conn->prepare("delete from livro where id_livro = ?;");
$result->execute(array($id_livro));
$_SESSION['flash_message'] = [
    'type' => 'success',
    'message' => 'Livro removido com sucesso!'
];
header('Location: index.php');
?>