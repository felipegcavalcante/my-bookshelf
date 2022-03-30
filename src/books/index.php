<?php

session_start();
require_once "../login/verificaLogin.php";
require_once "../../connection.php";
isLogged();

$name = $_SESSION["nome"];
$userId = (int)$_SESSION["id"];

require_once "../../paginate.php";

$sql1 = "SELECT COUNT(*) AS total FROM livro WHERE id_usuario = :userId";
$result1 = $conn->prepare($sql1);

$result1->bindParam('userId', $userId, PDO::PARAM_INT);
$result1->execute();
$count = $result1->fetchAll();
$count = (int) $count[0]['total'];
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$size = (isset($_GET['size'])) ? (int)$_GET['size'] : 10;


$pagination = paginate($count, $size, $page);

    $sql2 = "SELECT * FROM livro WHERE id_usuario = :userId LIMIT :offset, :limit;";
    $result2 = $conn->prepare($sql2);

    $result2->bindParam('userId', $userId, PDO::PARAM_INT);
    $result2->bindParam('offset', $pagination['current_page'], PDO::PARAM_INT);
    $result2->bindParam('limit', $pagination['size'], PDO::PARAM_INT);
    $result2->execute();

    $books = $result2->fetchAll();

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
    <link rel="stylesheet" href="../../css/app.css">
    <title>My Bookshelf</title>
</head>
<body>
    <header class="header">
        <div class="header__container">
            <h1 class="header__logo">My Bookshelf</h1>
            <div class="header__user-area">
                <i class="fa-solid fa-user header__icon"></i>
                <div class="header__username">Olá, <?= $name ?>!</div>
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
                    <?php if (count($books) > 0): ?>
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
                    <?php  else: ?>
                        <tr>
                            <td colspan="8" class="table__data">Não existe nenhum livro cadastrado.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </form>

            <?php if (count($books) > 0): ?>
                <div class="pagination">
                    <?php if ($pagination['previous_page'] !== null): ?>
                        <a href="index.php?page=<?= $pagination['previous_page'] ?>" class="pagination__item">Anterior</a>
                    <?php endif; ?>

                    <?php foreach ($pagination['pages'] as $page): ?>
                        <?php $style = $pagination['current_page'] === $page ? 'pagination__item--active' : '' ?>
                        <a href="index.php?page=<?= $page ?>" class="pagination__item <?= $style; ?>">
                            <?= $page ?>
                        </a>
                    <?php endforeach; ?>

                    <?php if ($pagination['next_page'] !== null): ?>
                        <a href="index.php?page=<?= $pagination['next_page'] ?>" class="pagination__item">Próximo</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <footer class="footer">
        <p class="footer__text">My Bookshelf &copy; Copyright 2022</p>
    </footer>
</body>
</html>