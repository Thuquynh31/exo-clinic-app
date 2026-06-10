<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class AuthController
{
    public function login(): void
    {
        Response::view('auth/login', [
            'title' => 'Clinic Login'
        ]);
    }

    public function handleLogin(): void
    {
        $email = trim($_POST['email'] ?? '');

        $password = trim($_POST['password'] ?? '');

        if (
            $email === ''
            || $password === ''
        ) {

            flash_set(
                'error',
                'Email and password are required.'
            );

            Response::redirect('/login');

            return;
        }

        session_regenerate_id(true);

        $_SESSION['user_id'] = 1;

        $_SESSION['user_name'] = $email;

        $_SESSION['role'] = 'staff';

        $_SESSION['login_at'] = time();

        $_SESSION['last_activity'] = time();

        Response::redirect('/dashboard');
    }

    public function logout(): void
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {

            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'] ?? '',
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        Response::redirect('/login');
    }
}