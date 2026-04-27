<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $error = "";

    // 🔐 regex (si login yt)
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {
        $error = "Invalid username format!";
    } 
    elseif (!preg_match("/^.{4,}$/", $password)) {
        $error = "Password must be at least 4 characters!";
    } 
    else {

        $file = "users.txt";

        // kontrollo a ekziston useri
        if (file_exists($file)) {
            $users = file($file, FILE_IGNORE_NEW_LINES);

            foreach ($users as $u) {
                list($u_name, $u_pass) = explode("|", $u);

                if ($username == $u_name) {
                    $error = "User already exists!";
                    break;
                }
            }
        }

        // nëse s’ka error → ruaje
        if (empty($error)) {
            $data = $username . "|" . $password . "\n";
            file_put_contents($file, $data, FILE_APPEND);

            echo "Account created! <a href='login.php'>Login</a>";
            exit();
        }
    }

    if (!empty($error)) {
        echo $error;
    }
}
?>