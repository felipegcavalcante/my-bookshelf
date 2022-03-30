--up
CREATE TABLE livro (
    id_livro INT  NOT NULL auto_increment,
    titulo VARCHAR(80) NOT NULL,
    autor VARCHAR(80) NOT NULL,
    paginas INT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    nacional tinyint(1) NOT NULL,
    capa VARCHAR(80) NOT NULL,
    editora VARCHAR(80) NOT NULL,
    descricao VARCHAR(1000) NOT NULL,
    id_usuario INT NOT NULL,
    PRIMARY KEY(id_livro),
    FOREIGN KEY(id_usuario) REFERENCES usuario(id)
);

--down
DROP TABLE livro;