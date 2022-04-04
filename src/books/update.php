<?php
    require_once "database_books.php";
    require_once "validations.php";
    require_once "../session.php";

    // 1. verifica se o usuário está logado para realizar a inclusão
    verify_login();

    // 2. obtém os campos do formulário
    $input = $_POST;

    // 3. validar os campos do formulário segundo os critérios definidos
    $validation = [];
    $validation[] = not_empty($input['titulo'], "Título");
    $validation[] = size_less_than($input['titulo'], 80, "Título");
    $validation[] = size_greater_than($input['titulo'], 5, "Título");

    $validation[] = not_empty($input['autor'], "Autor");
    $validation[] = size_less_than($input['autor'], 80, "Autor");
    $validation[] = size_greater_than($input['autor'], 5, "Autor");

    $validation[] = is_number($input['paginas'], "Número de Páginas");
    $validation[] = value_less_than($input['paginas'], 2000, "Número de Páginas");
    $validation[] = value_greater_than($input['paginas'], 10, "Número de Páginas");

    $validation[] = not_empty_list($input['genero'], 'Gênero');

    $validation[] = not_empty($input['editora'], "Editora");
    $validation[] = size_less_than($input['editora'], 80, "Editora");
    $validation[] = size_greater_than($input['editora'], 5, "Editora");

    $validation[] = not_empty($input['descricao'], "Descrição");
    $validation[] = size_less_than($input['descricao'], 1000, "Descrição");
    $validation[] = size_greater_than($input['descricao'], 50, "Descrição");

    $validation[] = not_empty_file($_FILES['capa'], 'Capa');
    $validation[] = max_size_file($_FILES['capa'], 1000000, 'Capa');
    $validation[] = valid_extension($_FILES['capa'], ['png', 'jpg', 'jpeg'], 'Capa');

    if (validation_fails($validation)) {
        validation_redirect($validation, $input, 'create.php');
    }

    // 4. fazer o upload da imagem
    $filename = $_FILES['capa']['name'];
    $temporaryFilename = $_FILES['capa']['tmp_name'];
    $filepath = "files/capas/$filename";

    move_uploaded_file($temporaryFilename, "../../$filepath");

    // 5. transformar os dados para persistir na base de dados
    $input['capa'] = $filepath;
    $input['genero'] = implode(',', $input['genero']);
    $input['nacional'] = isset($input['nacional']) ? 1 : 0;

    // 6. persistir os dados na base de dados
    $databaseBooks = new DatabaseBooks();
    $databaseBooks->editBook($input);

    // 7. redirecionar para a página correta com uma mensagem de feedback
    redirect_with_message('success', 'Livro editado com sucesso!', 'index.php');
?>