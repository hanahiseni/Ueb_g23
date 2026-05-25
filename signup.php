<?php
require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/helpers.php";

$success = "";
$error = "";
$username = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    
    if (empty($username) || empty($email) || empty($password)) {

        $error = "All fields are required!";

    } elseif (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {

        $error = "Username must be 3-20 chars, start with letter, no spaces.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Invalid email format!";

    } elseif (strlen($password) < 8) {

        $error = "Password must be at least 8 characters!";

    } else {

        try {

            // PREPARED STATEMENT (SQL Injection Protection)
            $checkSql = "SELECT id FROM users WHERE username = ? OR email = ?";
            $checkStmt = mysqli_prepare($conn, $checkSql);

            mysqli_stmt_bind_param($checkStmt, "ss", $username, $email);
            mysqli_stmt_execute($checkStmt);

            $checkResult = mysqli_stmt_get_result($checkStmt);

            if (mysqli_num_rows($checkResult) > 0) {

                $error = "Username or email already exists!";

            } else {

                // PASSWORD HASHING
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                // PREPARED STATEMENT
                $insertSql = "INSERT INTO users (username, email, password_hash, role)
                              VALUES (?, ?, ?, 'user')";

                $insertStmt = mysqli_prepare($conn, $insertSql);

                mysqli_stmt_bind_param(
                    $insertStmt,
                    "sss",
                    $username,
                    $email,
                    $passwordHash
                );

                if (mysqli_stmt_execute($insertStmt)) {

                    $success = "Account created successfully!";

                } else {

                    $error = "Something went wrong. Please try again.";

                }

                mysqli_stmt_close($insertStmt);
            }

            mysqli_stmt_close($checkStmt);

        } catch (mysqli_sql_exception $e) {

            error_log("Signup error: " . $e->getMessage());
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
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>

<div class="login-container">
    <div class="login-box">

        <h2>Sign Up</h2>

        <?php if (empty($success)): ?>
        <form method="POST">

            <input 
                type="text" 
                name="username" 
                placeholder="Username" 
                value="<?= e($username) ?>"
                required
            >

            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                value="<?= e($email) ?>"
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Password (min 8 characters)" 
                required
            >

            <button type="submit">Create Account</button>

        </form>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <p class="error" style="margin-top:15px;color:#ff4d4d;font-weight:500;">
                <?= e($error) ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success-box">
                <p><?= e($success) ?></p>
                <a href="login.php" class="login-link">Go to Login</a>
            </div>
        <?php endif; ?>

        <p style="margin-top:15px;color:#aaa;">
            Already have an account?
            <a href="login.php" style="color:#fff;">Login</a>
        </p>

    </div>
</div>

</body>
</html> 