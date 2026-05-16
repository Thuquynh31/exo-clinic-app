# EXO Clinic Routing App

Week 3 PHP Lab - Front Controller, Router and Standard Response.

---

## Features

- Front Controller pattern
- Custom Router
- HTML Response
- JSON Response
- Redirect Response
- 404 Not Found
- 405 Method Not Allowed
- Appointment management demo
- Login demo

---

## Install

composer dump-autoload

---

## Run

php -S localhost:8000 -t public public/index.php

---

## Routes

GET /
GET /health

GET /appointments
GET /appointments/create
POST /appointments

GET /login
POST /login

GET /logout
GET /go-home