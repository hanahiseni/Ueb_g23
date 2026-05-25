<?php
session_start();

require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/helpers.php";

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["role"] !== "admin") {
    echo "No access - Admins only";
    exit();
}

$error = "";
$success = "";

try {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $action = $_POST["action"] ?? "";

        // CREATE USER
        if ($action === "create") {

            $username = trim($_POST["username"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $password = trim($_POST["password"] ?? "");
            $role = $_POST["role"] ?? "user";

            // VALIDATION
            if (
                empty($username) ||
                empty($email) ||
                empty($password) ||
                !in_array($role, ["admin", "user"], true)
            ) {

                $error = "Please fill all fields correctly.";

            } elseif (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {

                $error = "Invalid username.";

            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $error = "Invalid email.";

            } elseif (strlen($password) < 8) {

                $error = "Password must be at least 8 characters.";

            } else {

                // PASSWORD HASH
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                // PREPARED STATEMENT
                $sql = "INSERT INTO users (username, email, password_hash, role)
                        VALUES (?, ?, ?, ?)";

                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param(
                    $stmt,
                    "ssss",
                    $username,
                    $email,
                    $passwordHash,
                    $role
                );

                if (mysqli_stmt_execute($stmt)) {

                    $success = "User created successfully.";

                } else {

                    $error = "Username or email already exists.";
                }

                mysqli_stmt_close($stmt);
            }
        }

        // UPDATE ROLE
        if ($action === "update_role") {

            $userId = (int)($_POST["user_id"] ?? 0);
            $role = $_POST["role"] ?? "user";

            if ($userId <= 0 || !in_array($role, ["admin", "user"], true)) {

                $error = "Invalid update request.";

            } else {

                // PREPARED STATEMENT
                $sql = "UPDATE users SET role = ? WHERE id = ?";

                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param($stmt, "si", $role, $userId);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);

                $success = "User role updated.";
            }
        }

        // DELETE USER
        if ($action === "delete") {

            $userId = (int)($_POST["user_id"] ?? 0);

            if ($userId <= 0 || $userId === (int)$_SESSION["user_id"]) {

                $error = "You cannot delete this user.";

            } else {

                // PREPARED STATEMENT
                $sql = "DELETE FROM users WHERE id = ?";

                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param($stmt, "i", $userId);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);

                $success = "User deleted.";
            }
        }
    }

} catch (mysqli_sql_exception $e) {

    // ERROR HANDLING
    error_log("Admin users error: " . $e->getMessage());

    $error = "Something went wrong. Please try again.";
}

// USERS LIST
$result = mysqli_query(
    $conn,
    "SELECT id, username, email, role, created_at
     FROM users
     ORDER BY id DESC"
);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background: #111;
            color: #fff;
        }

        .admin-nav {
            display: flex;
            gap: 12px;
            margin: 20px 0 28px;
            flex-wrap: wrap;
        }

        .admin-nav a {
            background: #ffffff;
            color: #111111;
            padding: 12px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #ffffff;
        }

        .admin-nav a:hover {
            background: #dddddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            background: #1b1b1b;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #333;
            text-align: left;
        }

        input,
        select,
        button {
            padding: 10px;
            margin: 6px 4px;
        }

        button {
            cursor: pointer;
        }

        .admin-form,
        .card {
            background: #1b1b1b;
            padding: 18px;
            margin: 18px 0;
            border-radius: 8px;
        }

        .success {
            color: #71e6a2;
        }

        .error {
            color: #ff7070;
        }

        .btn-danger {
            background: #d63c3c;
            color: white;
            border: 0;
            cursor: pointer;
        }
    </style>
</head>

<body>

<h1>Admin Panel</h1>

<p>
    Welcome, <?= e($_SESSION["user"]) ?>
</p>

<div class="admin-nav">
    <a href="admin_cars.php">Manage Cars</a>
    <a href="admin_purchases.php">Manage Purchases</a>
    <a href="home.php">Back to Home</a>
</div>

<?php if ($success): ?>

    <p class="success">
        <?= e($success) ?>
    </p>

<?php endif; ?>

<?php if ($error): ?>

    <p class="error">
        <?= e($error) ?>
    </p>

<?php endif; ?>

<div class="admin-form">

    <h2>Add User</h2>

    <form method="POST">

        <input type="hidden" name="action" value="create">

        <input
            type="text"
            name="username"
            placeholder="Username"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Create User</button>

    </form>

</div>

<div class="card">

    <h2>Users</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($users as $user): ?>

            <tr>

                <td><?= (int)$user["id"] ?></td>

                <td><?= e($user["username"]) ?></td>

                <td><?= e($user["email"]) ?></td>

                <td>

                    <form method="POST">

                        <input type="hidden" name="action" value="update_role">

                        <input
                            type="hidden"
                            name="user_id"
                            value="<?= (int)$user["id"] ?>"
                        >

                        <select name="role">

                            <option
                                value="user"
                                <?php if ($user["role"] === "user") echo "selected"; ?>
                            >
                                User
                            </option>

                            <option
                                value="admin"
                                <?php if ($user["role"] === "admin") echo "selected"; ?>
                            >
                                Admin
                            </option>

                        </select>

                        <button type="submit">Update</button>

                    </form>

                </td>

                <td><?= e($user["created_at"]) ?></td>

                <td>

                    <form
                        method="POST"
                        onsubmit="return confirm('Delete this user?');"
                    >

                        <input type="hidden" name="action" value="delete">

                        <input
                            type="hidden"
                            name="user_id"
                            value="<?= (int)$user["id"] ?>"
                        >

                        <button class="btn-danger" type="submit">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</div>

</body>
</html>
