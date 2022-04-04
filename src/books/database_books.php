<?php

include './../config/database.php';

class DatabaseBooks
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getTotalOfBooks(int $userId): int
    {
        $sql = "SELECT COUNT(*) AS total FROM livro WHERE id_usuario = :userId";
        $result = $this->connection->prepare($sql);
        $result->bindParam('userId', $userId, PDO::PARAM_INT);
        $result->execute();

        $data = $result->fetchAll();
        $total = (int) $data[0]['total'];

        return $total;
    }

    public function getBooks(int $userId, int $page, int $size): array
    {
        $offset = ($page - 1) * $size;

        $sql = "SELECT * FROM livro WHERE id_usuario = :userId LIMIT :offset, :limit;";
        $result = $this->connection->prepare($sql);

        $result->bindParam('userId', $userId, PDO::PARAM_INT);
        $result->bindParam('offset', $offset, PDO::PARAM_INT);
        $result->bindParam('limit', $size, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll();
    }

    public function getBook(int $bookId)
    {
        $sql = "SELECT * FROM livro WHERE id_livro = :bookId";
        $result = $this->connection->prepare($sql);

        $result->bindParam('bookId', $bookId, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function createBook(array $data): void
    {
        $sql = "INSERT INTO livro (titulo, autor, paginas, genero, nacional, capa, editora, descricao, id_usuario)
            VALUES (:titulo, :autor, :paginas, :genero, :nacional, :capa, :editora, :descricao, :id_usuario);";
        $result = $this->connection->prepare($sql);

        $result->bindParam('titulo', $data['titulo'], PDO::PARAM_STR);
        $result->bindParam('autor', $data['autor'], PDO::PARAM_STR);
        $result->bindParam('paginas', $data['paginas'], PDO::PARAM_INT);
        $result->bindParam('genero', $data['genero'], PDO::PARAM_STR);
        $result->bindParam('nacional', $data['nacional'], PDO::PARAM_INT);
        $result->bindParam('capa', $data['capa'], PDO::PARAM_STR);
        $result->bindParam('editora', $data['editora'], PDO::PARAM_STR);
        $result->bindParam('descricao', $data['descricao'], PDO::PARAM_STR);
        $result->bindParam('id_usuario', $data['id_usuario'], PDO::PARAM_INT);

        $result->execute();
    }

    public function editBook(array $data): void
    {
        $sql = "UPDATE livro
            SET titulo = :titulo, autor = :autor, paginas = :paginas, genero = :genero,
            nacional = :nacional, capa = :capa, editora = :editora, descricao = :descricao
            WHERE id_livro = :id_livro;";
        $result = $this->connection->prepare($sql);

        $result->bindParam('titulo', $data['titulo'], PDO::PARAM_STR);
        $result->bindParam('autor', $data['autor'], PDO::PARAM_STR);
        $result->bindParam('paginas', $data['paginas'], PDO::PARAM_INT);
        $result->bindParam('genero', $data['genero'], PDO::PARAM_STR);
        $result->bindParam('nacional', $data['nacional'], PDO::PARAM_INT);
        $result->bindParam('capa', $data['capa'], PDO::PARAM_STR);
        $result->bindParam('editora', $data['editora'], PDO::PARAM_STR);
        $result->bindParam('descricao', $data['descricao'], PDO::PARAM_STR);
        $result->bindParam('id_livro', $data['id_livro'], PDO::PARAM_INT);

        $result->execute();
    }

    public function removeBook($bookId): void
    {
        $sql = "DELETE FROM livro WHERE id_livro = :bookId;";
        $result = $this->connection->prepare($sql);
        $result->bindParam('bookId', $bookId, PDO::PARAM_INT);
        $result->execute();
    }

    public function removeBooksBatch($booksIds): void
    {
        $sql = "DELETE FROM livro WHERE id_livro = :bookId;";

        foreach ($booksIds as $bookId) {
            $result = $this->connection->prepare($sql);
            $result->bindParam('bookId', $bookId, PDO::PARAM_INT);
            $result->execute();
        }
    }

    public function getGenres(): array
    {
        $sql = "SELECT id_genero, nome FROM genero";
        $result = $this->connection->prepare($sql);
        $result->execute();
        $genres = $result->fetchAll();

        return $genres;
    }
}
