<?php
    require_once 'database_login.php';
    require_once '../session.php';

    $email = $_POST["email"];
    $password = $_POST["senha"];

    if (empty($email) || empty($password)) {
        redirect_with_message('error', 'Preencha todos os campos!', 'index.php');
    }

    $databaseLogin = new DatabaseLogin();
    $user = $databaseLogin->login($email, $password);

    if (empty($user)) {
        redirect_with_message('error', 'Login ou senha incorretos!', 'index.php');
    }

    $_SESSION["user"] = $user;
    header('Location: ../books/index.php');
?>