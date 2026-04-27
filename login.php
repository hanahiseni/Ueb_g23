<?php
session_start();

$file = "users.txt";
$users = [];

$users[] = [
    "username" => "admin",
    "email" => "admin@revgt.com",
    "password" => "12345678",
    "role" => "admin"
];

if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $parts = explode("|", trim($line));

        if (count($parts) == 3) {
            $users[] = [
                "username" => trim($parts[0]),
                "email" => trim($parts[1]),
                "password" => trim($parts[2]),
                "role" => "user"
            ];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($username) || empty($password)) {
        $error = "All fields are required!";
    }
    elseif (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {
        $error = "Invalid username format!";
    }
    elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long!";
    }
    else {
        foreach ($users as $u) {
            if ($username === $u["username"] && $password === $u["password"]) {
                $_SESSION["user"] = $u["username"];
                $_SESSION["role"] = $u["role"];

                header("Location: home.php");
                exit();
            }
        }

        $error = "Wrong credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
                value="<?= htmlspecialchars($username ?? "") ?>"
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

        <?php if(isset($error)): ?>
            <div class="error" style="margin-top:15px;color:#ff4d4d;font-weight:500;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

    </div>
</div>

</body>
</html>