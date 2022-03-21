<?php

    session_start();
    require_once "../conection.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ramaraja&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login - My Bookshelf</title>
</head>
<body>
        <h1 class="login__logo">My Bookshelf</h1>
        <?php
           if(isset($_SESSION['preencha_campos'])){
        ?>
          <div class="alert alert--error">Preencha todos os campos!</div>
        <?php
          }
          unset($_SESSION['preencha_campos']);
        ?>
        <?php
           if(isset($_SESSION['nao_autenticado'])){
        ?>
          <div class="alert alert-error">Email ou senha incorretos!</div>
        <?php
          }
          unset($_SESSION['nao_autenticado']);
        ?>
        <form action="login.php" method="post" class="form">
            <div class="form__group">
                <label for="email" class="form__label">Email</label>
                <input type="email" name="email" id="email" class="form__input" autofocus>
            </div>
            <div class="form__group">
                <label for="senha" class="form__label">Senha</label>
                <input type="password" name="senha" id="senha" class="form__input">
            </div>
            <a href="#" class="form__link">Esqueceu sua senha?</a>
            <input type="submit" value="Login" class="button login__button">
        </form>
        <p class="login__text">Ainda não tem um login? <a href="#" class="login__link">Cadastre-se</a></p>
</body>
</html>