<?php

$title = $title ?? 'Appointments';
$appointments = $appointments ?? [];

function appointmentStatus(int $slots): string
{
    if ($slots <= 0) {
        return 'Full';
    }

    if ($slots <= 3) {
        return 'Limited';
    }

    return 'Available';
}

function appointmentClass(int $slots): string
{
    if ($slots <= 0) {
        return 'danger';
    }

    if ($slots <= 3) {
        return 'warning';
    }

    return 'success';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title><?= h($title) ?></title>

    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<header class="topbar">

    <strong>🏥 EXO Clinic Routing App</strong>

    <nav>
        <a href="/">🏠 Home</a>
        <a href="/appointments">📅 Appointments</a>
        <a href="/appointments/create">
            ➕ Create Appointment
        </a>
        <a href="/health">💚 Health</a>
        <a href="/dashboard">📊 Dashboard</a>
    </nav>

</header>

<main class="container">

    <?php if ($success = flash_get('success')): ?>
        <div class="alert success">
            <?= h($success) ?>
        </div>
    <?php endif; ?>

    <div class="page-header">

        <div>

            <h1>Appointment Schedule</h1>

            <p>
                This page is handled by AppointmentController@index
            </p>

        </div>

        <a
            class="button"
            href="/appointments/create"
        >
            Create Appointment
        </a>

    </div>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Slots</th>
                <th>Status</th>
            </tr>

        </thead>

        <tbody>

        <?php foreach ($appointments as $appointment): ?>

            <tr>

                <td>
                    <?= h((string) $appointment['id']) ?>
                </td>

                <td>
                    <?= h($appointment['doctor']) ?>
                </td>

                <td>
                    <?= h($appointment['date']) ?>
                </td>

                <td>
                    <?= h((string) $appointment['slots']) ?>
                </td>

                <td>

                    <span
                        class="badge <?= appointmentClass(
                            (int) $appointment['slots']
                        ) ?>"
                    >
                        <?= appointmentStatus(
                            (int) $appointment['slots']
                        ) ?>
                    </span>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</main>

</body>
</html>