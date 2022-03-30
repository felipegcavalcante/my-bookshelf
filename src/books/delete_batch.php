<?php

session_start();
require_once "../../connection.php";
if(!isset($_SESSION["nome"])) {
    header('Location: ../login/index.php');
    exit();
}

$nome = $_SESSION["nome"];
$id_usuario = $_SESSION["id"];

$livros_id = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($livros_id);

if (!empty($livros_id['remover_selecionados'])) {
    if (isset($livros_id['ids'])) {
        foreach ($livros_id['ids'] as $id_livro => $livro) {
            $result = $conn->prepare("delete from livro where id_livro = ?;");
            $result->execute(array($id_livro));
        }
        $_SESSION['flash_message'] = [
            'type' => 'success',
            'message' => 'Livros removidos com sucesso!'
        ];
        header('Location: index.php');
    } else {
        $_SESSION['flash_message'] = [
            'type' => 'error',
            'message' => 'Selecione Livros!'
        ];
        header('Location: index.php');
    }
} else {
    $_SESSION['flash_message'] = [
        'type' => 'error',
        'message' => 'Selecione Livros!'
    ];
    header('Location: index.php');
}

?>