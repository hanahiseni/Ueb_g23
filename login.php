<?php
session_start();

$users = [
    ["username" => "admin", "password" => "1234", "role" => "admin"],
    ["username" => "user", "password" => "1234", "role" => "user"]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($users as $u) {
        if ($_POST["username"] == $u["username"] && $_POST["password"] == $u["password"]) {

            $_SESSION["user"] = $u["username"];
            $_SESSION["role"] = $u["role"];

            header("Location: home.html");
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

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top, #0a0f1f, #000);
            color: white;
        }

        .nav {
            display: flex;
            align-items: center;
            padding: 15px 30px;
            background: #000;
        }

        .nav img {
            height: 30px;
            margin-right: 10px;
        }

        .nav span {
            font-size: 20px;
            font-weight: 600;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .login-box {
            width: 420px;
            padding: 50px;
            border-radius: 20px;

            background: rgba(15, 15, 15, 0.85);
            backdrop-filter: blur(12px);

            box-shadow:
                0 0 40px rgba(0,0,0,0.7),
                0 0 10px rgba(255,0,0,0.15);

            border: 1px solid rgba(255,255,255,0.05);

            text-align: center;

            animation: fadeIn 0.6s ease;
        }

        .login-box h2 {
            font-size: 26px;
            margin-bottom: 20px;
        }

        .login-box input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;

            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.08);

            background: rgba(0,0,0,0.6);
            color: white;
        }

        .login-box input:focus {
            border: 1px solid #761a1a;
            box-shadow: 0 0 8px rgba(255,0,0,0.4);
            outline: none;
        }

        .login-box button {
            width: 100%;
            padding: 14px;
            margin-top: 15px;

            border: none;
            border-radius: 10px;

            background: linear-gradient(90deg, #ff0000, #ff4d4d);
            color: white;
            font-weight: 600;

            cursor: pointer;
            transition: 0.3s;
        }

        .login-box button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255,0,0,0.3);
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
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