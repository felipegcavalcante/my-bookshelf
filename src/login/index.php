<?php
    session_start();
    require_once "../../connection.php";

    $message = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : null;
    unset($_SESSION['flash_message']);
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
    <link rel="stylesheet" href="../../css/login.css">
    <title>Login - My Bookshelf</title>
</head>
<body>
  <div class="login__container">
    <h1 class="login__logo">My Bookshelf</h1>

    <?php if (! empty($message)): ?>
        <div class="alert alert--<?= $message['type'] ?>">
            <?= $message['message'] ?>
        </div>
    <?php endif; ?>

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
  </div>
</body>
</html>