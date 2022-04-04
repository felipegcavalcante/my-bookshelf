<?php

    require_once "database_books.php";
    require_once "../session.php";

    // 1. verifica se o usuário está logado para realizar a inclusão
    verify_login();

    // 2. obtém os dados do formulário
    $ids = $_POST['ids'];

    // 3. remove os livros do banco de dados
    $databaseBooks = new DatabaseBooks();
    $databaseBooks->removeBooksBatch($ids);

    // 4. redirecionar para a página correta com uma mensagem de feedback
    redirect_with_message('success', 'Livros removidos com sucesso!', 'index.php');
?>