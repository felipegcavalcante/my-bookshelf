create database myBookshelf;

use myBookshelf;

create table usuario (
id int not null auto_increment,
nome varchar(40) not null,
email varchar(100) not null,
senha varchar(32) not null,
PRIMARY KEY(id)
);

insert into usuario (nome, email, senha) values ("Felipe", "felipesantistacavalcante@gmail.com", "12345678");