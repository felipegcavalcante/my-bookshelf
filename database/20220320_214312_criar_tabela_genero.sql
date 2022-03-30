--up
CREATE TABLE genero (
    id_genero INT NOT NULL auto_increment,
    nome VARCHAR(30),
    PRIMARY KEY(id_genero)
);

INSERT INTO genero (nome) VALUES ("Romance");
INSERT INTO genero (nome) VALUES ("Comédia");
INSERT INTO genero (nome) VALUES ("Conto");
INSERT INTO genero (nome) VALUES ("Ficção");
INSERT INTO genero (nome) VALUES ("Novela");
INSERT INTO genero (nome) VALUES ("Policial");
INSERT INTO genero (nome) VALUES ("Suspense");
INSERT INTO genero (nome) VALUES ("Infantil");
INSERT INTO genero (nome) VALUES ("Biografia");
INSERT INTO genero (nome) VALUES ("Poesia");

--down
DROP TABLE genero;