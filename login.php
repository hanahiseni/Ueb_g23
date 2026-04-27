<?php
session_start();

$users = [];

$file = "users.txt";

if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
        list($username, $password) = explode("|", $line);
        $users[] = [
            "username" => $username,
            "password" => $password,
            "role" => "user"
        ];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $_POST["username"])) {
        $error = "Invalid username format!";
    } 
    elseif (!preg_match("/^.{4,}$/", $_POST["password"])) {
        $error = "Password must be at least 4 characters long!";
    } 
    else {

        foreach ($users as $u) {
            if ($_POST["username"] == $u["username"] && $_POST["password"] == $u["password"]) {

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
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>
</form>

<p style="margin-top:15px; color:#aaa; font-size:14px;">
    Don’t have an account?
    <a href="signup.html" style="color:#fff; text-decoration: underline;">
        Sign up
    </a>
</p>

        </form>

        <?php if(isset($error)) echo "<div class='error' style='margin-top:15px;color:#ff4d4d;font-weight:500;'>$error</div>"; ?>

    </div>
</div>

</body>
</html>