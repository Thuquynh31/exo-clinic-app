<?php

$title = $title ?? 'Login';

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
    </nav>
</header>

<main class="container">

    <h1>Clinic Login</h1>

    <p>This page demonstrates redirect response.</p>

    <form class="form-card" method="POST" action="/login">

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="student@example.com">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="123456">
        </div>

        <button class="button" type="submit">
            Login
        </button>

    </form>

</main>

</body>
</html>