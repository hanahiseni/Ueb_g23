<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $error = "";

    // regex 
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {
        $error = "Invalid username!";
    }
    elseif (!preg_match("/^.{4,}$/", $password)) {
        $error = "Password must be at least 4 characters!";
    }
    else {

        $file = "users.txt";

        // kontrollo a ekziston
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

            echo "<h2>Account created successfully!</h2>";
            echo "<a href='login.php'>Go to login</a>";
            exit();
        }
    }

    if (!empty($error)) {
        echo $error;
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
</form>