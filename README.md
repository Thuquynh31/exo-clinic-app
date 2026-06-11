# EXO Clinic Appointment Portal

Lab04 PHP Project – Routing, Validation, Session Management and Security.

---

## Overview

EXO Clinic Appointment Portal is a PHP web application developed for Lab04.

The project demonstrates:

* Front Controller Pattern
* Custom Router
* Form Validation
* PRG (Post-Redirect-Get)
* Session Management
* Flash Messages
* Security Controls
* Anti-Spam Techniques

The system allows users to manage clinic appointment schedules by creating appointments for doctors, viewing schedules and accessing protected pages after login.

---

## Features

### Routing

* Front Controller pattern
* Custom Router
* HTML Response
* JSON Response
* Redirect Response
* 404 Not Found
* 405 Method Not Allowed

### Appointment Management

* View appointment list
* Create appointment
* Store appointment data in JSON

### Validation

* Required field validation
* Doctor name validation
* Appointment date validation
* Slot validation
* Old input and error messages

### Session Management

* Login
* Logout
* Dashboard protection
* Session timeout
* Session regeneration

### Security

* Output escaping (`htmlspecialchars`)
* HttpOnly cookies
* SameSite cookies
* Secure cookies (HTTPS)

### Anti-Spam

* Honeypot field
* Rate limiting

### Flash Messages

* Success messages
* Error messages

---

## Quick Start

### Install dependencies

```bash
composer dump-autoload
```

### Start local server

```bash
php -S localhost:8000 -t public public/index.php
```

### Open browser

```text
http://localhost:8000
```

### Demo Login

Use any email address.

Example:

```text
Email: admin@clinic.com
Password: 123
```

---

## Routes

### General

```text
GET /
GET /go-home
GET /health
```

### Appointments

```text
GET /appointments
GET /appointments/create
POST /appointments
```

### Authentication

```text
GET /login
POST /login
POST /logout
```

### Protected Routes

```text
GET /dashboard
GET /session-demo
```

---

## Sample Appointment Data

Appointment data is stored in:

```text
storage/appointments.json
```

Example:

```json
[
  {
    "id": 1,
    "doctor": "Dr. Smith",
    "date": "2026-06-20",
    "slots": 5
  }
]
```

---

## Security Features

### Server-side Validation

The application validates all appointment data before saving.

Examples:

* Doctor name is required.
* Appointment date cannot be in the past.
* Slots must be greater than 0.

### XSS Protection

Input:

```html
<script>alert(1)</script>
```

Result:

```text
Doctor name must contain only letters.
```

Additionally, all output is escaped using:

```php
htmlspecialchars(...)
```

to prevent script execution.

### Session Protection

After successful login:

```php
session_regenerate_id(true);
```

is used to prevent Session Fixation attacks.

### Session Timeout

Inactive sessions are automatically expired and redirected to the login page.

### Anti-Spam Protection

The application includes:

* Honeypot field
* Rate limiting (5 seconds)

to reduce automated spam submissions.

---

## Example Testing

### Test 405 Method Not Allowed

PowerShell:

```powershell
Invoke-WebRequest `
    -Uri "http://localhost:8000/health" `
    -Method POST
```

Expected result:

```text
405 Method Not Allowed
```

### Test Session Protection

1. Login successfully.
2. Access `/dashboard`.
3. Logout.
4. Access `/dashboard` again.

Expected result:

```text
Please login first.
```

---

## Demonstration Video
https://drive.google.com/file/d/1xERtvlamzit7ahaDznkPL0ZWa8S17muN/view?usp=sharing


## Author

Thu Quynh
