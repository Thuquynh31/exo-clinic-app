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
            'appointments' => $appointments
        ]);
    }

    public function create(): void
    {
        Response::view('appointments/create', [
            'title' => 'Create Appointment'
        ]);
    }

    public function store(): void
    {
        $honeypot = trim(
            $_POST['website'] ?? ''
        );

        if ($honeypot !== '') {
            flash_set(
                'error',
                'Spam request detected.'
            );

            Response::redirect(
                '/appointments/create'
            );
        }

        $lastSubmit =
            $_SESSION['last_submit'] ?? 0;

        if (
            time() - $lastSubmit < 5
        ) {

            flash_set(
                'error',
                'Please wait 5 seconds before submitting again.'
            );

            Response::redirect(
                '/appointments/create'
            );
        }

        $_SESSION['last_submit'] = time();

        $doctor = trim($_POST['doctor'] ?? '');
        $date = trim($_POST['date'] ?? '');
        $slots = trim($_POST['slots'] ?? '');

        $errors = [];

        if ($doctor === '') {

            $errors['doctor'] =
                'Doctor is required.';

        }
        elseif (
            !preg_match(
                '/^[\p{L}\s]+$/u',
                $doctor
            )
        ) {

            $errors['doctor'] =
                'Doctor name must contain only letters.';
        }
        if ($date === '') {

            $errors['date'] =
                'Date is required.';

        } elseif (
            strtotime($date)
            < strtotime(date('Y-m-d'))
        ) {

            $errors['date'] =
                'Appointment date cannot be in the past.';
        }

        if (
            $slots === ''
            || (int) $slots <= 0
        ) {

            $errors['slots'] =
                'Slots must be greater than 0.';
        }

        if (!empty($errors)) {

            $_SESSION['_errors'] = $errors;

            $_SESSION['_old'] = [
                'doctor' => $doctor,
                'date' => $date,
                'slots' => $slots
            ];

            Response::redirect(
                '/appointments/create'
            );
        }

        unset($_SESSION['_errors']);
        unset($_SESSION['_old']);

        $appointments =
            $this->getAppointments();

        $appointments[] = [
            'id' => count($appointments) + 1,
            'doctor' => $doctor,
            'date' => $date,
            'slots' => (int) $slots
        ];

        file_put_contents(
            dirname(__DIR__, 2)
            . '/storage/appointments.json',
            json_encode(
                $appointments,
                JSON_PRETTY_PRINT
            )
        );

        flash_set(
            'success',
            'Appointment created successfully.'
        );

        Response::redirect(
            '/appointments'
        );
    }

    private function getAppointments(): array
    {
        $file =
            dirname(__DIR__, 2)
            . '/storage/appointments.json';

        if (!file_exists($file)) {
            return [];
        }

        $data = file_get_contents($file);

        return json_decode(
            $data,
            true
        ) ?? [];
    }
}