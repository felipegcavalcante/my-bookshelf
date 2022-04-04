(function () {
    const randomBetween = (min, max) => Math.floor(Math.random() * (max - min + 1) + min);

    const book1 = {
        titulo: 'Vidas Secas',
        autor: 'Graciliano Ramos',
        paginas: 176,
        genero: 1,
        nacional: true,
        editora: 'Record',
        descricao: 'Vidas Secas é um profundo retrato da sociedade brasileira, sobretudo de seus problemas sociais. Dessa forma, Graciliano traça uma crítica social retratando as dificuldades encontradas por uma família pobre de retirantes. Eles tem de conviver constantemente com a miséria e a seca que assola o sertão nordestino.',
    };

    const book2 = {
        titulo: "Steve Jobs",
        autor: "Walte Issacson",
        paginas: 624,
        genero: 9,
        nacional: false,
        editora: "Companhia das Letras",
        descricao: "O livro, baseado em mais de quarenta entrevistas com Jobs ao longo de dois anos - e entrevistas com mais de cem familiares, amigos, colegas, adversários e concorrentes -, narra a vida atribulada do empresário extremamente inventivo e de personalidade forte e polêmica..."
    };

    const book3 = {
        titulo: "A Divina Comédia",
        autor: "Dante Alighieri",
        paginas: 240,
        genero: 2,
        nacional: false,
        editora: "Principis",
        descricao: "A Divina Comédia é um poema clássico da literatura italiana e mundial escrito por Dante Alighieri no século XIV e dividido em três partes: o Inferno, o Purgatório e o Paraíso. São cem cantos protagonizados pelo autor acompanhado do poeta romano Virgílio."
    };

    let currentBook = randomBetween(0, 2);
    const books = [book1, book2, book3];
    let book = books[currentBook];

    document.getElementById('titulo').value = book.titulo;
    document.getElementById('autor').value = book.autor;
    document.getElementById('paginas').value = book.paginas;
    document.getElementById('genero').value = book.genero;
    document.getElementById('nacional').checked = book.nacional;
    document.getElementById('editora').value = book.editora;
    document.getElementById('descricao').value = book.descricao;
})();