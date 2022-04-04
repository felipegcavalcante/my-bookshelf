<?php

session_start();

function verify_login()
{

	if (! isset($_SESSION["user"])) {
		header('Location: ../login/index.php');
		exit();
	}

    $data = $_SESSION["user"];

    return [
        'id' => (int) $data['id'],
        'name' => $data['name']
    ];
}

function redirect_with_message(string $type, string $message, string $location)
{
    $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    header("Location: $location");
    exit();
}

function get_flash_message(): ?array
{
    $message = $_SESSION['flash_message'] ?? null;
    unset($_SESSION['flash_message']);
    return $message;
}

function get_validation(): ?array
{
    if (isset($_SESSION['validation'])) {
        $validation = $_SESSION['validation'];
        unset($_SESSION['validation']);

        return $validation;
    }

    return [];
}
?>