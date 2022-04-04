<?php

function not_empty(string $value, string $fieldName): array
{
    if (strlen($value) > 0) {
        return [
            'type' => 'success',
            'message' => ''
        ];
    }
    return [
        'type' => 'error',
        'message' => "O campo <b>$fieldName</b> não pode ser vazio!"
    ];
}

function size_less_than(string $value, int $maxSize, string $fieldName): array
{
    if (strlen($value) < $maxSize) {
        return [
            'type' => 'success',
            'message' => ''
        ];
    }

    return [
        'type' => 'error',
        'message' => "O campo <b>$fieldName</b> precisa ter no máximo $maxSize caracteres!"
    ];
}

function size_greater_than(string $value, int $minSize, string $fieldName): array
{
    if (strlen($value) > $minSize) {
        return [
            'type' => 'success',
            'message' => ''
        ];
    }
    return [
        'type' => 'error',
        'message' => "O campo <b>$fieldName</b> precisa ter no mínimo $minSize caracteres!"
    ];
}

function is_number(string $value, string $fieldName): array
{
    if (is_numeric($value)) {
        return [
            'type' => 'success',
            'message' => ''
        ];
    }
    return [
        'type' => 'error',
        'message' => "O campo <b>$fieldName</b> precisa ser numérico!"
    ];
}
function value_less_than(string $value, int $maxValue, string $fieldName): array
{
    if ($value < $maxValue) {
        return [
            'type' => 'success',
            'message' => ''
        ];
    }
    return [
        'type' => 'error',
        'message' => "O campo <b>$fieldName</b> deve ser menor que $maxValue!"
    ];
}

function value_greater_than(string $value, int $minValue, string $fieldName): array
{
    if ($value > $minValue) {
        return [
            'type' => 'success',
            'message' => ''
        ];
    }

    return [
        'type' => 'error',
        'message' => "O campo <b>$fieldName</b> deve ser maior que $minValue!"
    ];
}

function not_empty_list($genero, string $fieldName): array
{
    if (empty($genero)) {
        return [
            'type' => 'error',
            'message' => "O campo <b>$fieldName</b> não pode ser vazio!"
        ];
    }

    return [
        'type' => 'success',
        'message' => ''
    ];
}

function not_empty_file($value, string $fieldName): array
{
    if ($value['error'] === 4) {
        return [
            'type' => 'error',
            'message' => "O campo <b>$fieldName</b> não pode ser vazio!"
        ];
    }

    return [
        'type' => 'success',
        'message' => ''
    ];
}

function max_size_file($value, int $maxSize, string $fieldName): array
{
    if (not_empty_file($value, $fieldName)['type'] === 'error'){
        return [
            'type' => 'success',
            'message' => ''
        ];
    }

    $txtMaxSize = $maxSize / 1000000 . "MB";

    if ($value['size'] > $maxSize) {
        return [
            'type' => 'error',
            'message' => "O arquivo enviado no campo <b>$fieldName</b> deve ser menor que $txtMaxSize!"
        ];
    }

    return [
        'type' => 'success',
        'message' => ''
    ];
}

function valid_extension(array $value, array $allowedExtensions,string $fieldName): array
{
    if (not_empty_file($value, $fieldName)['type'] === 'error'){
        return [
            'type' => 'success',
            'message' => ''
        ];
    }

    [$name, $extension] = explode('.', $value['name']);
    $extensionList = implode(', ', $allowedExtensions);

    if (! in_array($extension, $allowedExtensions)) {
        return [
            'type' => 'error',
            'message' => "O arquivo enviado no campo <b>$fieldName</b> só permite as extensões $extensionList!"
        ];
    }

    return [
        'type' => 'success',
        'message' => ''
    ];
}

function validation_fails(array $validation): bool
{
    foreach ($validation as $item) {
        if ($item['type'] === 'error') {
            return true;
        }
    }

    return false;
}

function validation_errors(array $validation): array
{
    $validation = array_filter($validation, fn ($item) => $item['type'] == 'error');
    $validation = array_map(fn ($item) => $item['message'], $validation);

    return $validation;
}

function validation_redirect(array $validation, array $data, string $location): void
{
    $_SESSION['validation'] = [
        'errors' => validation_errors($validation),
        'data' => $data
    ];
    header("Location: $location");
    exit;
}