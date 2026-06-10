<?php

$title = $title ?? 'Create Appointment';

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

    <strong>🏥 EXO Clinic Portal</strong>

    <nav>
        <a href="/">🏠 Home</a>
        <a href="/appointments">📅 Appointments</a>
        <a href="/appointments/create">➕ Create Appointment</a>
        <a href="/health">💚 Health</a>
        <a href="/dashboard">📊 Dashboard</a>
    </nav>

</header>

<main class="container">
    <?php if ($error = flash_get('error')): ?>

        <div class="alert danger">
            <?= h($error) ?>
        </div>

    <?php endif; ?>

    <h1>Create Appointment</h1>

    <p>
        Submit appointment information securely.
    </p>
    <?php if ($error = flash_get('error')): ?>
        <div class="alert danger">
            <?= h($error) ?>
        </div>
    <?php endif; ?>
    
    <form
        class="form-card"
        method="POST"
        action="/appointments"
    >

        <div style="display:none;">

            <input
                type="text"
                name="website"
                autocomplete="off"
            >

        </div>

        <div class="form-group">

            <label>Doctor</label>

            <input
                type="text"
                name="doctor"
                placeholder="Oh Sehun"
                value="<?= h(old('doctor')) ?>"
                class="<?= errors('doctor') ? 'input-error' : '' ?>"
            >

            <?php if (errors('doctor')): ?>
                <small class="text-danger">
                    <?= h(errors('doctor')) ?>
                </small>
            <?php endif; ?>

        </div>

        <div class="form-group">

            <label>Date</label>

            <input
                type="date"
                name="date"
                value="<?= h(old('date')) ?>"
                class="<?= errors('date') ? 'input-error' : '' ?>"
            >

            <?php if (errors('date')): ?>
                <small class="text-danger">
                    <?= h(errors('date')) ?>
                </small>
            <?php endif; ?>

        </div>

        <div class="form-group">

            <label>Slots</label>

            <input
                type="number"
                name="slots"
                placeholder="5"
                value="<?= h(old('slots')) ?>"
                class="<?= errors('slots') ? 'input-error' : '' ?>"
            >

            <?php if (errors('slots')): ?>
                <small class="text-danger">
                    <?= h(errors('slots')) ?>
                </small>
            <?php endif; ?>

        </div>

        <button
            class="button"
            type="submit"
        >
            Save Appointment
        </button>

        <a
            class="button secondary"
            href="/appointments"
        >
            Back
        </a>

    </form>

</main>

</body>
</html>