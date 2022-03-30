<?php

function paginate ($total, $size, $page) {
    $numberOfPages = (int) ceil($total / $size);
    $arrPages = range(1, $numberOfPages);

    if ($page > $numberOfPages || $page < 1) {
        $page = 1;
    }

    $previousPage = $page - 1;
    $nextPage = $page + 1;

    if ($previousPage < 1) {
        $previousPage = null;
    }

    if ($nextPage > $numberOfPages) {
        $nextPage = null;
    }

    $pagination = [
        'size' => $size,
        'current_page' => $page,
        'previous_page' => $previousPage,
        'next_page' => $nextPage,
        'pages' => $arrPages
    ];

    return $pagination;
}
?>