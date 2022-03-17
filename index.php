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
    <title>MyBookshelf</title>
</head>
<body>
    <header class="header">
        <h1 class="header__logo">MyBookshelf</h1>
        <div class="header__user-area">
            <i class="fa-solid fa-user header__icon"></i>
            <p class="header__text">Olá, Felipe<br><a class="header__link" href="login.php">Logout</a></p>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <h1 class="main__title">Meus Livros</h1>
            <a href="cadastrarLivro.php" class="button">Cadastrar Livro</a>
            <a href="#" class="button button--remove">Remover Selecionados</a>
            <table class="table">
                <thead class="table__head">
                    <tr class="table__row">
                        <th class="table__title"></th>
                        <th class="table__title">Capa</th>
                        <th class="table__title">Título</th>
                        <th class="table__title">Autor</th>
                        <th class="table__title">Gênero</th>
                        <th class="table__title">Editora</th>
                        <th class="table__title">Número de Páginas</th>
                        <th class="table__title">Ações</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                    <tr class="table__row">
                        <td class="table__data"><input class="table__checkbox" type="checkbox" name="" id=""></td>
                        <td class="table__data"><img src="https://d19qz1cqidnnhq.cloudfront.net/imagens/capas/e46ef4365583e6c89069b2d90eb2683a627fc2d1.jpg" alt="Capa do Livro Quincas Borba" height="100px"></td>
                        <td class="table__data">Quincas Borba</td>
                        <td class="table__data">Machado de Assis</td>
                        <td class="table__data">Romance</td>
                        <td class="table__data">Livraria Garnier</td>
                        <td class="table__data">360</td>
                        <td class="table__data">
                            <a href="editarLivro.php" class="table__button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#abrirModal" class="table__button"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__data"><input class="table__checkbox" type="checkbox" name="" id=""></td>
                        <td class="table__data"><img src="https://d19qz1cqidnnhq.cloudfront.net/imagens/capas/e46ef4365583e6c89069b2d90eb2683a627fc2d1.jpg" alt="Capa do Livro Quincas Borba" height="100px"></td>
                        <td class="table__data">Quincas Borba</td>
                        <td class="table__data">Machado de Assis</td>
                        <td class="table__data">Romance</td>
                        <td class="table__data">Livraria Garnier</td>
                        <td class="table__data">360</td>
                        <td class="table__data">
                            <a href="editarLivro.php" class="table__button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#abrirModal" class="table__button"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__data"><input class="table__checkbox" type="checkbox" name="" id=""></td>
                        <td class="table__data"><img src="https://d19qz1cqidnnhq.cloudfront.net/imagens/capas/e46ef4365583e6c89069b2d90eb2683a627fc2d1.jpg" alt="Capa do Livro Quincas Borba" height="100px"></td>
                        <td class="table__data">Quincas Borba</td>
                        <td class="table__data">Machado de Assis</td>
                        <td class="table__data">Romance</td>
                        <td class="table__data">Livraria Garnier</td>
                        <td class="table__data">360</td>
                        <td class="table__data">
                            <a href="editarLivro.php" class="table__button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#abrirModal" class="table__button"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__data"><input class="table__checkbox" type="checkbox" name="" id=""></td>
                        <td class="table__data"><img src="https://d19qz1cqidnnhq.cloudfront.net/imagens/capas/e46ef4365583e6c89069b2d90eb2683a627fc2d1.jpg" alt="Capa do Livro Quincas Borba" height="100px"></td>
                        <td class="table__data">Quincas Borba</td>
                        <td class="table__data">Machado de Assis</td>
                        <td class="table__data">Romance</td>
                        <td class="table__data">Livraria Garnier</td>
                        <td class="table__data">360</td>
                        <td class="table__data">
                            <a href="editarLivro.php" class="table__button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#abrirModal" class="table__button"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__data"><input class="table__checkbox" type="checkbox" name="" id=""></td>
                        <td class="table__data"><img src="https://d19qz1cqidnnhq.cloudfront.net/imagens/capas/e46ef4365583e6c89069b2d90eb2683a627fc2d1.jpg" alt="Capa do Livro Quincas Borba" height="100px"></td>
                        <td class="table__data">Quincas Borba</td>
                        <td class="table__data">Machado de Assis</td>
                        <td class="table__data">Romance</td>
                        <td class="table__data">Livraria Garnier</td>
                        <td class="table__data">360</td>
                        <td class="table__data">
                            <a href="editarLivro.php" class="table__button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#abrirModal" class="table__button"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="modal"  id="abrirModal" >
                <div class="remove">
                    <i class="fa-solid fa-trash-can remove__icon"></i>
                    <h2 class="remove__title">Remover Livro?</h2>
                    <h3 class="remove__text">Você deseja realmente remover o livro:</h3>
                    <ul class="remove__list">
                        <li class="remove__book">Quincas Borba</p>
                        <li class="remove__book">Quincas Borba</p>
                        <li class="remove__book">Quincas Borba</p>
                        <li class="remove__book">Quincas Borba</p>
                    </ul>
                    <div class="modal__buton-container">
                        <a href="#fechar" class="button modal__button button--secondary">Cancelar</a>
                        <a href="#fechar" class="button modal__button button--remove">Remover</a>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <a href="#" class="pagination__item">Anterior</a>
                <a href="#" class="pagination__item">1</a>
                <a href="#" class="pagination__item">2</a>
                <a href="#" class="pagination__item pagination__active">3</a>
                <a href="#" class="pagination__item">Próximo</a>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p class="footer__text">MyBookshelf &copy; Copyright 2022</p>
    </footer>
</body>
</html>