# EXO Clinic Appointment Portal

Lab04 PHP Project – Routing, Validation, Session Management and Security.

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

## Install

```bash
composer dump-autoload
```

---

## Run

```bash
php -S localhost:8000 -t public public/index.php
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

## Security Features

* Server-side validation
* PRG Pattern (Post-Redirect-Get)
* Session timeout
* Session regeneration
* Honeypot protection
* Rate limiting
* Output escaping
* Dashboard authentication protection

---

## Testing

All Lab04 test cases (T01–T16) completed successfully.

---

## Author

Thu Quynh