# RevGT - Web Application

## Përshkrimi i Projektit

**RevGT** është një aplikacion web i orientuar drejt industrisë automobilistike, i cili u mundëson përdoruesve të:

- Shfletojnë automjete
- Personalizojnë vetura sipas preferencave
- Ndërveprojnë me platformën në mënyrë dinamike
- Kyçen në sistem përmes login-it
- Përdorin role të ndryshme si Admin dhe User

Ky projekt është zhvilluar në kuadër të lëndës **Programimi në Ueb nga ana e Serverit**.

---

## Qëllimi i Projektit

Qëllimi i projektit është ndërtimi i një aplikacioni web funksional duke përdorur teknologji frontend dhe backend.

Në këtë projekt janë aplikuar:

- PHP për logjikën server-side
- HTML, CSS dhe JavaScript për pjesën frontend
- Koncepte të OOP në PHP
- Sessions dhe Cookies
- Validim i të dhënave me RegEx
- Git dhe GitHub për versionim të kodit

---

## Teknologjitë e Përdorura

- HTML5
- CSS3
- JavaScript
- PHP
- Git
- GitHub
- XAMPP

---

## Struktura e Projektit

```text
RevGT/
│
├── php-concepts/
│   ├── index.php
│   └── style.css
│
├── data/
│   └── cars.php
│
├── fotografi/
│   └── images...
│
├── BuyItems/
│   └── pages...
│
├── home.php
├── design.php
├── products-services.php
├── login.php
├── logout.php
├── signup.php
├── README.md
└── index.php
```

## Databaza dhe Menaxhimi i të Dhënave

Në projekt është integruar databaza MySQL për ruajtjen dhe menaxhimin e të dhënave.

Janë krijuar tabelat:

- `users`
- `cars`
- `purchases`

Tabela janë të lidhura përmes relacioneve (Foreign Keys).

Gjithashtu janë implementuar operacionet:

- Create
- Read
- Update
- Delete (CRUD)

për menaxhimin e veturave dhe përdoruesve.

Për lidhjen me databazën është përdorur PDO dhe prepared statements.

---

## Siguria

Në projekt janë implementuar mekanizma sigurie si:

- Mbrojtja nga SQL Injection
- Sanitizimi i output-it për mbrojtje nga XSS
- Validimi server-side i inputeve
- Hashimi i password-ave me `password_hash()`
- Verifikimi i password-ave me `password_verify()`

---

## AJAX dhe Komunikimi Dinamik

Në projekt është implementuar AJAX për operacione pa refresh të faqes.

Është implementuar:

- Update i veturave me AJAX
- Delete i veturave me AJAX

Kjo e bën aplikacionin më interaktiv dhe më të shpejtë për përdoruesin.

---

## Integrimi i API-ve

Është përdorur një Web API e jashtme për Currency Exchange Rates.

API përdoret për marrjen e të dhënave dinamike në kohë reale.

---

## Features

- User Authentication (Login/Register)
- Admin Dashboard
- Car Management System
- AJAX Operations without page refresh
- MySQL Database Integration
- External API Integration
- Email Notifications
- Responsive Design

---

## How to Run the Project

1. Start Apache and MySQL in XAMPP
2. Import `revgt_db.sql` into phpMyAdmin
3. Configure database credentials in `config/db.php`
4. Open the project in browser:

```text
http://localhost/Ueb_g23
```
