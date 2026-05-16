<?php

$title = $title ?? 'Create Appointment';
$error = $error ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<header class="topbar">
    <strong>EXO Clinic Routing App</strong>

    <nav>
        <a href="/">Home</a>
        <a href="/appointments">Appointments</a>
        <a href="/appointments/create">Create Appointment</a>
        <a href="/health">Health</a>
        <a href="/login">Login</a>
    </nav>
</header>

<main class="container">

    <h1>Create Appointment</h1>

    <p>This form submits to <code>POST /appointments</code></p>

    <?php if ($error): ?>
        <div class="alert danger">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form class="form-card" method="POST" action="/appointments">

        <div class="form-group">
            <label>Doctor</label>
            <input type="text" name="doctor" placeholder="Oh Sehun">
        </div>

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date">
        </div>

        <div class="form-group">
            <label>Slots</label>
            <input type="number" name="slots" placeholder="5">
        </div>

        <button class="button" type="submit">
            Save Appointment
        </button>

        <a class="button secondary" href="/appointments">
            Back
        </a>

    </form>

</main>

</body>
</html>