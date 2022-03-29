<?php

if(!isset($_SESSION)){
	session_start();
}
require_once "../login/verificaLogin.php";
require_once '../../conection.php';
isLogged();

$input = $_POST;

$nomeArquivo = $_FILES['capa']['name'];
$caminhoAtualArquivo = $_FILES['capa']['tmp_name'];
$caminhoSalvar = '../../files/capas/'.$nomeArquivo;
$caminhoBD = 'files/capas/'.$nomeArquivo;

$titulo = $input["titulo"];
$autor = $input["autor"];
$paginas = $input["paginas"];
$genero = $input["genero"];
$editora = $input["editora"];
$descricao = $input["descricao"];
$id_usuario = $input["id_usuario"];
$id_livro = $input["id_livro"];

$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
if($_FILES['capa']['error'] != 0){
    $_SESSION['flash_message'] = [
        'type' => 'error',
        'message' => 'Selecione uma imagem!'
    ];
    header('Location: edit.php');
	exit();
}

if(empty($titulo) || empty($autor) || empty($paginas) || empty($genero) || empty($editora) || empty($descricao) || empty($id_usuario)) {
    $_SESSION['flash_message'] = [
        'type' => 'error',
        'message' => 'Preencha todos os campos!'
    ];
    header('Location: edit.php');
	exit();
}

$genero = implode("", $genero);

if (isset($input['nacional'])) {
        $nacional = 1;
} else {
        $nacional = 0;
}

move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

$result = $conn->prepare("update livro set titulo = ?, autor = ?, paginas = ?, genero = ?, nacional = ?, capa = ?, editora = ?, descricao = ? where id_livro = ?;");
$result->execute(array($titulo, $autor, $paginas, $genero, $nacional, $caminhoBD, $editora, $descricao, $id_livro));
$_SESSION['flash_message'] = [
    'type' => 'success',
    'message' => 'Livro editado com sucesso!'
];
header('Location: index.php');
?>