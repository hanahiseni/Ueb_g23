<?php
session_start();

$users = [
    ["username" => "admin", "password" => "1234", "role" => "admin"],
    ["username" => "user", "password" => "2344", "role" => "user"],
    ["username" => "vesa", "password" => "vesa", "role" => "user"],
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>RevGT Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
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

        <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
    </div>
</div>

</body>
</html>