<?php

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    // ===== VALIDATION =====

    if (empty($username) || empty($email) || empty($password)) {
        $error = "All fields are required!";
    }

    elseif (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {
        $error = "Username must be 3–20 chars, start with letter, no spaces.";
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    }

    elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters!";
    }

    else {

        $file = "users.txt";

        // ===== CHECK DUPLICATES =====
        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                $parts = explode("|", $line);

                if (count($parts) >= 3) {
                    $existingUser = $parts[0];
                    $existingEmail = $parts[1];

                    if ($username === $existingUser) {
                        $error = "Username already exists!";
                        break;
                    }

                    if ($email === $existingEmail) {
                        $error = "Email already exists!";
                        break;
                    }
                }
            }
        }

        // ===== SAVE USER =====
        if (empty($error)) {

            // NOTE: për production përdor password_hash()
            file_put_contents($file, $username . "|" . $email . "|" . $password . "\n", FILE_APPEND);

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
                value="<?= htmlspecialchars($username ?? "") ?>" 
                required
            >

            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                value="<?= htmlspecialchars($email ?? "") ?>" 
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
                <?= $error ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success-box">
                <p><?= $success ?></p>
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