create table genero (
id_genero int auto_increment not null,
nome varchar(30),
primary key(id_genero)
);

insert into genero (nome) values ("Romance");
insert into genero (nome) values ("Comédia");
insert into genero (nome) values ("Conto");
insert into genero (nome) values ("Ficção");
insert into genero (nome) values ("Novela");
insert into genero (nome) values ("Policial");
insert into genero (nome) values ("Suspense");
insert into genero (nome) values ("Infantil");
insert into genero (nome) values ("Biografia");
insert into genero (nome) values ("Poesia");

select * from genero;