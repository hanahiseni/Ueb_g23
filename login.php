<?php
session_start();

require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/helpers.php";

$error = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    // SERVER-SIDE VALIDATION
    if (empty($username) || empty($password)) {

        $error = "All fields are required!";

    } elseif (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {

        $error = "Invalid username format!";

    } else {

        try {

            // PREPARED STATEMENT (SQL Injection Protection)
            $sql = "SELECT id, username, password_hash, role 
                    FROM users 
                    WHERE username = ?";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);

            // PASSWORD VERIFY
            if ($user && password_verify($password, $user["password_hash"])) {

                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user"] = $user["username"];
                $_SESSION["role"] = $user["role"];

                mysqli_stmt_close($stmt);

                header("Location: home.php");
                exit();

            } else {

                $error = "Wrong credentials!";
            }

            mysqli_stmt_close($stmt);

        } catch (mysqli_sql_exception $e) {

            // ERROR HANDLING
            error_log("Login error: " . $e->getMessage());

            $error = "Something went wrong. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RevGT Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css?v=1">
</head>

<body>

<header class="nav">
    <img src="fotografi/revgt.png" alt="logo">
    <span>RevGT</span>
</header>

<div class="login-container">

    <div class="login-box">

        <h2>Login</h2>

        <form method="POST">

            <input 
                type="text" 
                name="username" 
                placeholder="Username" 
                value="<?= e($username) ?>"
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Password" 
                required
            >

            <button type="submit">Login</button>

        </form>

        <p style="margin-top:15px; color:#aaa;">
            Don't have an account?
            <a href="signup.php" style="color:#fff;">Sign up</a>
        </p>

        <?php if (!empty($error)): ?>

            <div class="error" style="margin-top:15px;color:#ff4d4d;font-weight:500;">
                <?= e($error) ?>
            </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>
