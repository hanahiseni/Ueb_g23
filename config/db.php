<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = "127.0.0.1";
$user = "revgt_app";
$password = "revgt123";
$database = "revgt_db";
$port = 3307;

try {
    $conn = mysqli_connect($host, $user, $password, $database, $port);
    mysqli_set_charset($conn, "utf8mb4");
} catch (mysqli_sql_exception $e) {
    error_log("Database connection error: " . $e->getMessage());
    die("Database connection failed. Please try again later.");
}