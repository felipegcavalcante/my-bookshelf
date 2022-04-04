<?php
    require_once "database_books.php";
    require_once "../session.php";

    // 1. verifica se o usuário está logado para realizar a inclusão
    verify_login();

    // 2. obtém os dados da query string
    $bookId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // 3. remove o livro do banco de dados
    $databaseBooks = new DatabaseBooks();
    $databaseBooks->removeBook($bookId);

    // 4. redirecionar para a página correta com uma mensagem de feedback
    redirect_with_message('success', 'Livro removido com sucesso!', 'index.php');
?>