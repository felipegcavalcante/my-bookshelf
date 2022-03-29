create table livro (
id_livro int auto_increment not null,
titulo varchar(80) not null,
autor varchar(80) not null,
paginas int not null,
genero varchar(100) not null,
nacional tinyint(1) not null,
capa varchar(80) not null,
editora varchar(80) not null,
descricao varchar(1000) not null,
id_usuario int not null,
primary key(id_livro),
foreign key(id_usuario) references usuario(id)
);