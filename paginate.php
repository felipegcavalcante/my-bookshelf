<?php

// Paginação
$itensPorPagina = 5;
// Página Atual
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 0;

// Total
$resultTotal = $conn->prepare("SELECT * FROM livro");
$resultTotal->execute();
$numeroTotal = $resultTotal->rowCount();

$item = $pagina * $itensPorPagina;

$previousPage = $pagina - 1;
$nextPage = $pagina + 1;

// Definir número de páginas

$numberOfPages = ceil($numeroTotal / $itensPorPagina);

?>