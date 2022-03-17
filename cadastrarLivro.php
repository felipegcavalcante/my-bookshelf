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
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastrar Livro</title>
</head>
<body>
    <header class="header">
        <a href="index.php" class="header__logo__link"><h1 class="header__logo">MyBookshelf</h1></a>
        <div class="header__user-area">
            <i class="fa-solid fa-user header__icon"></i>
            <p class="header__text">Olá, Felipe<br><a class="header__link" href="login.php">Logout</a></p>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <h1 class="main__title">Cadastrar Livro</h1>
            <form action="" method="post" class="form">
                <div class="form__group">
                    <label for="titulo" class="form__label">Título</label><br>
                    <input type="text" name="titulo" id="titulo" class="form__input" autofocus>
                </div>
                <div class="form__group">
                    <label for="autor" class="form__label">Autor</label><br>
                    <input type="text" name="autor" id="autor" class="form__input" placeholder="Separar por vírgula">
                </div>
                <div class="form__group">
                    <label for="paginas" class="form__label">Número de Páginas</label><br>
                    <input type="number" name="paginas" id="paginas" class="form__input">
                </div>
                <div class="form__group">
                    <label for="genero" class="form__label">Gênero</label><br>
                    <select name="genero" id="genero" class="form__select">
                        <option class="form__option" value="default"></option>
                        <option class="form__option" value="romance">Romance</option>
                        <option class="form__option" value="romance">Comédia</option>
                        <option class="form__option" value="romance">Fábula</option>
                    </select>
                </div>
                <div class="form__group">
                    <label for="publicacao" class="form__label">Publicação Nacional</label><br>
                    <input type="checkbox" name="publicacao" id="publicacao" class="form__checkbox">
                </div>
                <div class="form__group">
                    <label for="capa" class="form__label">Capa</label><br>
                    <input type="file" name="capa" id="capa" class="form__file">
                </div>
                <div class="form__group">
                    <label for="editora" class="form__label">Editora</label><br>
                    <input type="text" name="editora" id="editora" class="form__input">
                </div>
                <div class="form__group">
                    <label for="descricao" class="form__label">Descrição</label><br>
                    <textarea name="descricao" id="descricao" rows="3" class="form__textArea"></textarea>
                </div>
                <a href="index.php" class="button button--secondary">Voltar</a>
                <input type="submit" class="button" value="Cadastrar">
            </form>
        </div>
    </main>
    <footer class="footer">
        <p class="footer__text">MyBookshelf &copy; Copyright 2022</p>
    </footer>
</body>
</html>