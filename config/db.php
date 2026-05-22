<?php

$host = "127.0.0.1";
$username = "revgt_app";
$password = "revgt123";
$dbname = "revgt_db";
$port = 3307;

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");