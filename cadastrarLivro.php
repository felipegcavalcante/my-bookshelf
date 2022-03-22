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
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastrar Livro</title>
</head>
<body>
    <header class="header">
        <a href="index.php" class="header__logo__link"><h1 class="header__logo">My Bookshelf</h1></a>
        <div class="header__user-area">
            <i class="fa-solid fa-user header__icon"></i>
            <div class="header__username">Olá, Felipe</div>
            <a class="header__logout" href="login/logout.php">Logout</a>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <h1 class="main__title">Cadastrar Livro</h1>
            <form action="" method="post" class="form">
                <div class="form__group">
                    <label for="titulo" class="form__label">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form__input" autofocus>
                </div>
                <div class="form__group">
                    <label for="autor" class="form__label">Autor</label>
                    <input type="text" name="autor" id="autor" class="form__input" placeholder="Separar por vírgula">
                </div>
                <div class="form__group">
                    <label for="paginas" class="form__label">Número de Páginas</label>
                    <input type="number" name="paginas" id="paginas" class="form__input">
                </div>
                <div class="form__group">
                    <label for="genero" class="form__label">Gênero</label>
                    <select name="genero" id="genero" class="form__select" multiple>
                        <option class="form__option" value="romance">Romance</option>
                        <option class="form__option" value="comedia">Comédia</option>
                        <option class="form__option" value="conto">Conto</option>
                        <option class="form__option" value="ficcao">Ficção</option>
                        <option class="form__option" value="novela">Novela</option>
                        <option class="form__option" value="policial">Policial</option>
                        <option class="form__option" value="suspense">Suspense</option>
                        <option class="form__option" value="infantil">Infantil</option>
                        <option class="form__option" value="biografia">Biografia</option>
                        <option class="form__option" value="poesia">Poesia</option>
                    </select>
                    <p class="form__helper">Aperte CTRL para selecionar mais de um gênero</p>
                </div>
                <div class="form__group">
                    <label for="publicacao" class="form__label">Publicação Nacional</label>
                    <input type="checkbox" name="publicacao" id="publicacao" class="form__checkbox">
                </div>
                <div class="form__group">
                    <label for="capa" class="form__label">Capa</label>
                    <input type="file" name="capa" id="capa" class="form__file">
                </div>
                <div class="form__group">
                    <label for="editora" class="form__label">Editora</label>
                    <input type="text" name="editora" id="editora" class="form__input">
                </div>
                <div class="form__group">
                    <label for="descricao" class="form__label">Descrição</label>
                    <textarea name="descricao" id="descricao" rows="3" class="form__text-area"></textarea>
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