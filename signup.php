<?php
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // regex 
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {
        $error = "Invalid username!";
    }
    elseif (!preg_match("/^.{4,}$/", $password)) {
        $error = "Password must be at least 4 characters!";
    }
    else {

        $file = "users.txt";

        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES);

            foreach ($lines as $line) {
                list($u, $p) = explode("|", $line);

                if ($username == $u) {
                    $error = "User already exists!";
                    break;
                }
            }
        }

        // ruaje userin
        if (empty($error)) {
            file_put_contents($file, $username . "|" . $password . "\n", FILE_APPEND);

            $success = "Account created successfully!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h2>Sign Up</h2>

        <!-- FORM (fshihet kur sukses) -->
        <?php if (empty($success)): ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <?php endif; ?>

        <!-- ERROR -->
        <?php if (!empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <!-- SUCCESS -->
        <?php if (!empty($success)): ?>
            <div class="success-box">
                <p>✅ <?= $success ?></p>
                <a href="login.php" class="login-link">Go to Login</a>
            </div>
        <?php endif; ?>

    </div>
</div>

</body>
</html>