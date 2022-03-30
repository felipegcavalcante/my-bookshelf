<?php

if(!isset($_SESSION)){
	session_start();
}
require_once "../login/verificaLogin.php";
require_once '../../connection.php';
isLogged();

$input = $_POST;

$nomeArquivo = $_FILES['capa']['name'];
$caminhoAtualArquivo = $_FILES['capa']['tmp_name'];
$caminhoSalvar = '../files/capas/'.$nomeArquivo;
$caminhoBD = 'files/capas/'.$nomeArquivo;

$titulo = $input["titulo"];
$autor = $input["autor"];
$paginas = $input["paginas"];
$genero = $input["genero"];
$editora = $input["editora"];
$descricao = $input["descricao"];
$id_usuario = $input["id_usuario"];

$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
if($_FILES['capa']['error'] != 0){
    $_SESSION['flash_message'] = [
        'type' => 'error',
        'message' => 'Selecione uma imagem!'
    ];
    header('Location: create.php');
	exit();
}

if(empty($titulo) || empty($autor) || empty($paginas) || empty($genero) || empty($editora) || empty($descricao) || empty($id_usuario)) {
    $_SESSION['flash_message'] = [
        'type' => 'error',
        'message' => 'Preencha todos os campos!'
    ];
    header('Location: create.php');
	exit();
}

$genero = implode("", $genero);

if (isset($input['nacional'])) {
        $nacional = 1;
    } else {
        $nacional = 0;
    }

move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

$result = $conn->prepare("insert into livro (titulo, autor, paginas, genero, nacional, capa, editora, descricao, id_usuario) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$result->execute(array($titulo, $autor, $paginas, $genero, $nacional, $caminhoBD, $editora, $descricao, $id_usuario));
$_SESSION['flash_message'] = [
    'type' => 'success',
    'message' => 'Livro cadastrado com sucesso!'
];
header('Location: index.php');

// echo $titulo . "<br>";

// echo $autor . "<br>";

// echo $paginas . "<br>";

// if (isset($input['nacional'])) {
//     var_dump("nacional");
// } else {
//     var_dump("estrangeiro");
// }

// echo "Generos:<br>";

// foreach ($genero as $name) {
//     echo $name . "<br>";
// }

// echo '<img src="'. $caminhoSalvar .'"><br>';

// echo $editora . "<br>";

// echo $descricao . "<br>";
// echo $id_usuario . "<br>";


?>