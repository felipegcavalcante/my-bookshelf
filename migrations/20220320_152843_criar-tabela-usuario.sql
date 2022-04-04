-- Up
CREATE DATABASE my_bookshelf;

USE my_bookshelf;

CREATE TABLE usuario (
    id INT NOT NULL auto_increment,
    nome VARCHAR(40) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO usuario (nome, email, senha)
VALUES ("Felipe", "felipesantistacavalcante@gmail.com", "12345678");

-- Down
DROP TABLE usuario;
DROP DATABASE my_bookshelf;