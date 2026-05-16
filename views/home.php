<?php
$title = $title ?? 'Home';
$message = $message ?? '';
$loginSuccess = ($_GET['login'] ?? '') === 'success';
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

    <strong>🏥 EXO Clinic Routing App</strong>

    <nav>

        <a href="/">🏠 Home</a>

        <a href="/appointments">📅 Appointments</a>

        <a href="/appointments/create">
            ➕ Create Appointment
        </a>

        <a href="/health">💚 Health</a>

        <a href="/login">🔐 Login</a>

        <a href="/logout">🚪 Logout</a>

    </nav>

</header>

<main class="container">

    <?php if ($loginSuccess): ?>
        <div class="alert success">
            Login processed successfully.
        </div>
    <?php endif; ?>

    <section class="hero">

        <h1>
            🏥 <?= htmlspecialchars($title) ?>
        </h1>

        <p>
            <?= htmlspecialchars($message) ?>
        </p>

    </section>

    <section class="grid">

        <div class="card">

            <h3>🌐 HTML Response</h3>

            <p>
                Visit <code>/appointments</code>
            </p>

        </div>

        <div class="card">

            <h3>📦 JSON Response</h3>

            <p>
                Visit <code>/health</code>
            </p>

        </div>

        <div class="card">

            <h3>🔄 Redirect</h3>

            <p>
                Visit <code>/go-home</code>
            </p>

        </div>

        <div class="card">

            <h3>⚠️ 404 / 405</h3>

            <p>
                Try <code>/unknown</code>

                <br><br>

                or POST <code>/health</code>
            </p>

        </div>

    </section>

</main>

</body>
</html>