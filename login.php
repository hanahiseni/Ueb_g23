<?php
session_start();

$users = [
    ["username" => "admin", "password" => "1234", "role" => "admin"],
    ["username" => "user", "password" => "2344", "role" => "user"],
    ["username" => "vesa", "password" => "vesa", "role" => "user"],
];
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

<p style="margin-top:15px; color:#aaa;">
    Don't have an account?
    <a href="signup.php" style="color:#fff;">Sign up</a>
</p>

        </form>

        <?php if(isset($error)) echo "<div class='error' style='margin-top:15px;color:#ff4d4d;font-weight:500;'>$error</div>"; ?>

    </div>
</div>

</body>
</html>