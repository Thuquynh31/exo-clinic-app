<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class AppointmentController
{
    public function index(): void
    {
        $appointments = $this->getAppointments();

        Response::view('appointments/index', [
            'title' => 'Appointment Schedule',
            'appointments' => $appointments,
            'created' => ($_GET['created'] ?? '') === '1'
        ]);
    }

    public function create(): void
    {
        Response::view('appointments/create', [
            'title' => 'Create Appointment',
            'error' => null
        ]);
    }

    public function store(): void
    {
        $doctor = trim($_POST['doctor'] ?? '');
        $date = trim($_POST['date'] ?? '');
        $slots = (int) ($_POST['slots'] ?? 0);

        if ($doctor === '' || $date === '' || $slots < 0) {

            Response::view('appointments/create', [
                'title' => 'Create Appointment',
                'error' => 'Please enter valid appointment information.'
            ], 422);
        }

        $appointments = $this->getAppointments();

        $appointments[] = [
            'id' => count($appointments) + 1,
            'doctor' => $doctor,
            'date' => $date,
            'slots' => $slots
        ];

        file_put_contents(
            dirname(__DIR__, 2) . '/storage/appointments.json',
            json_encode($appointments, JSON_PRETTY_PRINT)
        );

        Response::redirect('/appointments?created=1');
    }

    private function getAppointments(): array
    {
        $file = dirname(__DIR__, 2) . '/storage/appointments.json';

        if (!file_exists($file)) {
            return [];
        }

        $data = file_get_contents($file);

        return json_decode($data, true) ?? [];
    }
}