<?php

$title = $title ?? 'Dashboard';
$user = $user ?? [];

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

    <strong>🏥 EXO Clinic Portal</strong>

    <nav>

        <a href="/">🏠 Home</a>

        <a href="/appointments">📅 Appointments</a>

        <a href="/appointments/create">
            ➕ Create Appointment
        </a>

        <a href="/dashboard">
            📊 Dashboard
        </a>

        <a href="/health">💚 Health</a>

    </nav>

</header>

<main class="container">

    <section class="hero">

        <h1>
            📊 Clinic Dashboard
        </h1>

        <p>
            Welcome,
            <?= htmlspecialchars($user['user_name'] ?? '') ?>
        </p>

    </section>

    <section class="grid">

        <div class="card">

            <h3>👤 User Information</h3>

            <p>
                User ID:
                <?= htmlspecialchars((string) ($user['user_id'] ?? '')) ?>
            </p>

            <p>
                User Name:
                <?= htmlspecialchars($user['user_name'] ?? '') ?>
            </p>

        </div>

        <div class="card">

            <h3>⏰ Session Information</h3>

            <p>
                Login Time:
                <?= isset($user['login_at'])
                    ? date('Y-m-d H:i:s', $user['login_at'])
                    : '' ?>
            </p>

            <p>
                Session ID:
                <?= session_id() ?>
            </p>

        </div>

        <div class="card">

            <h3>🔍 Session Demo</h3>

            <p>
                Visit:
                <code>/session-demo</code>
            </p>

        </div>

        <div class="card">

            <h3>🚪 Logout</h3>

            <form method="POST" action="/logout">

                <button class="button">
                    Logout
                </button>

            </form>

        </div>

    </section>

</main>

</body>
</html>