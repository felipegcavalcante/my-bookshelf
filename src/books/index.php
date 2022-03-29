<?php

session_start();
require_once "../login/verificaLogin.php";
require_once "../../conection.php";
isLogged();

$nome = $_SESSION["nome"];
$id_usuario = $_SESSION["id"];

require_once "../../paginate.php";

$resultLivros = $conn->prepare("SELECT * FROM livro where id_usuario = ? LIMIT $item, $itensPorPagina");
$resultLivros->execute([$id_usuario]);
$numero = $resultLivros->rowCount();

$books = $resultLivros->fetchAll();

// 05. get flash message and clean the session
$message = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : null;
unset($_SESSION['flash_message']);
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
    <title>My Bookshelf</title>
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
            <?php if (! empty($message)): ?>
                <div class="alert alert--<?= $message['type'] ?>">
                    <?= $message['message'] ?>
                </div>
            <?php endif; ?>

            <a href="create.php" class="button">Cadastrar Livro</a>
            <button form="delete_batch" class="button button--secondary" name="remover_selecionados" value="remover_selecionados">Remover Selecionados</button>

            <form action="delete_batch.php" method="post" id="delete_batch">
                <table class="table table--striped">
                    <thead class="table__head">
                        <tr class="table__row">
                            <th class="table__header"></th>
                            <th class="table__header">Capa</th>
                            <th class="table__header">Título</th>
                            <th class="table__header">Autor</th>
                            <th class="table__header">Gênero</th>
                            <th class="table__header">Editora</th>
                            <th class="table__header">N° de Páginas</th>
                            <th class="table__header">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        <?php foreach ($books as $book): ?>
                            <tr class="table__row">
                                <td class="table__data">
                                    <input class="table__checkbox" type="checkbox" name="ids[<?= $book['id_livro']; ?>]" id="">
                                </td>
                                <td class="table__data" data-header="Capa">
                                    <img class="table__img" src="../../<?= $book['capa']; ?>" alt="Capa do Livro <?= $book['titulo']; ?>">
                                </td>
                                <td class="table__data" data-header="Título"><?= $book['titulo']; ?></td>
                                <td class="table__data" data-header="Autor"><?= $book['autor']; ?></td>
                                <td class="table__data" data-header="Gênero"></td>
                                <td class="table__data" data-header="Editora"><?= $book['editora']; ?></td>
                                <td class="table__data" data-header="N° de Páginas"><?= $book['paginas']; ?></td>
                                <td class="table__data" data-header="Ações">
                                    <a href="edit.php?id=<?= $book['id_livro']; ?>" class="table__button">Editar</a>
                                    <a href="delete.php?id=<?= $book['id_livro']; ?>" class="table__button">Remover</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>


            <div class="pagination">
                <a href="index.php?pagina=<?= $previousPage ?>" class="pagination__item">Anterior</a>
                <?php for($i=0; $i < $numberOfPages; $i++) :?>
                    <?php  $estilo = ""; if ($pagina == $i) { $estilo = "pagination__item--active"; }; ?>
                    <a href="index.php?pagina=<?= $i ?>" class="pagination__item <?= $estilo; ?>"><?= $i + 1; ?></a>
                <?php endfor; ?>
                <a href="index.php?pagina=<?= $nextPage ?>" class="pagination__item">Próximo</a>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p class="footer__text">My Bookshelf &copy; Copyright 2022</p>
    </footer>
</body>
</html>