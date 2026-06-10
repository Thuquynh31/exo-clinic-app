<?php

declare(strict_types=1);

function h(?string $value): string
{
    return htmlspecialchars(
        $value ?? '',
        ENT_QUOTES,
        'UTF-8'
    );
}

function flash_set(
    string $key,
    mixed $value
): void {
    $_SESSION['_flash'][$key] = $value;
}

function flash_get(
    string $key,
    mixed $default = null
): mixed {

    $value = $_SESSION['_flash'][$key]
        ?? $default;

    unset($_SESSION['_flash'][$key]);

    return $value;
}

function old(
    string $key,
    string $default = ''
): string {

    return $_SESSION['_old'][$key]
        ?? $default;
}

function errors(
    string $key
): string {

    return $_SESSION['_errors'][$key]
        ?? '';
}

function is_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}

function require_login(): void
{
    check_session_timeout();

    if (!is_logged_in()) {

        flash_set(
            'error',
            'Please login first.'
        );

        header('Location: /login');

        exit;
    }
}

function check_session_timeout(): void
{
    $timeout = 300; 

    if (
        isset($_SESSION['last_activity'])
        && (
            time() - $_SESSION['last_activity']
        ) > $timeout
    ) {

        $_SESSION = [];

        session_destroy();

        session_start();

        flash_set(
            'error',
            'Session expired. Please login again.'
        );

        header('Location: /login');

        exit;
    }

    $_SESSION['last_activity'] = time();
}