<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class HealthController
{
    public function index(): void
    {
        Response::json(200, [
            'status' => 'ok',
            'message' => 'Clinic appointment system is healthy',
            'time' => date('Y-m-d H:i:s')
        ]);
    }
}