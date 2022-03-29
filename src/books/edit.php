<?php

session_start();
require_once "../../conection.php";
if(!isset($_SESSION["nome"])) {
    header('Location: ../login/index.php');
    exit();
}

$nome = $_SESSION["nome"];
$id_usuario = $_SESSION["id"];

$message = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : null;
unset($_SESSION['flash_message']);

// $input = $_POST;
// $id_livro = $input['id_livro'];

$id_livro = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$resultLivros = $conn->prepare("SELECT * FROM livro where id_livro = ?");
$resultLivros->execute([$id_livro]);

$book = $resultLivros->fetch();

if ($book['nacional'] == 1) {
    $checked = "checked";
} else if ($book['nacional'] == 0) {
    $checked = "";
}

$result = $conn->prepare("SELECT * FROM genero");
$result->execute();
$generos = $result->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f89ce4d736.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ramaraja&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Editar Livro</title>
</head>
<body>
    <header class="header">
        <div class="header__container">
            <h1 class="header__logo">My Bookshelf</h1>
            <div class="header__user-area">
                <i class="fa-solid fa-user header__icon"></i>
                <div class="header__username">Olá, <?= $nome ?>!</div>
                <a class="header__logout" href="../login/logout.php">Logout</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main__container">
            <h1 class="main__title">Editar Livro</h1>

            <?php if (! empty($message)): ?>
                <div class="alert alert--<?= $message['type'] ?>">
                    <?= $message['message'] ?>
                </div>
            <?php endif; ?>

            <form action="update.php" method="post" class="form" enctype="multipart/form-data">
                <div class="form__group">
                    <label for="titulo" class="form__label">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form__input" value="<?= $book['titulo']; ?>" autofocus>
                </div>
                <div class="form__group">
                    <label for="autor" class="form__label">Autor</label>
                    <input type="text" name="autor" id="autor" class="form__input" placeholder="Separar por vírgula" value="<?= $book['autor']; ?>">
                </div>
                <div class="form__group">
                    <label for="paginas" class="form__label">Número de Páginas</label>
                    <input type="number" name="paginas" id="paginas" class="form__input" value="<?=$book['paginas']; ?>">
                </div>
                <div class="form__group">
                    <label for="genero" class="form__label">Gênero</label>
                    <select name="genero[]" id="genero" class="form__select" multiple>
                        <?php foreach ($generos as $genero) : ?>
                            <option class="form__option" value="<?= $genero['id_genero'] ?>"><?= $genero['nome'] ?></option>';
                        <?php endforeach; ?>
                    </select>
                    <p class="form__helper">Aperte CTRL para selecionar mais de um gênero</p>
                </div>
                <div class="form__group">
                    <label for="publicacao" class="form__label">Publicação Nacional</label>
                    <input type="checkbox" name="publicacao" id="publicacao" class="form__checkbox" <?= $checked ?> >
                </div>
                <div class="form__group">
                    <label for="capa" class="form__label">Capa</label>
                    <input type="file" name="capa" id="capa" class="form__file">
                </div>
                <div class="form__group">
                    <label for="editora" class="form__label">Editora</label>
                    <input type="text" name="editora" id="editora" class="form__input" value="<?= $book['editora']; ?>">
                </div>
                <div class="form__group">
                    <label for="descricao" class="form__label">Descrição</label>
                    <textarea name="descricao" id="descricao" rows="3" class="form__text-area"><?= $book['descricao']; ?></textarea>
                </div>
                <a href="index.php" class="button button--secondary">Voltar</a>
                <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
                <input type="hidden" name="id_livro" value="<?= $book['id_livro'] ?>">
                <input type="submit" class="button" value="Salvar">
            </form>
        </div>
    </main>
    <footer class="footer">
        <p class="footer__text">MyBookshelf &copy; Copyright 2022</p>
    </footer>
</body>
</html>