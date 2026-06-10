<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class DashboardController
{
    public function index(): void
    {
        require_login();

        Response::view('dashboard', [
            'title' => 'Clinic Dashboard',
            'user' => $_SESSION
        ]);
    }

    public function sessionDemo(): void
    {
        Response::json(200, $_SESSION);
    }
}