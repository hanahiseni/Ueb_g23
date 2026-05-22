<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["role"] !== "admin") {
    echo "No access - Admins only";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
<style>
    body {
        min-height: 100vh;
    }

    .container {
        max-width: none;
        width: 100%;
        min-height: calc(100vh - 80px);
        margin: 0;
    }

    .admin-menu {
        display: grid;
        grid-template-columns: 1fr;
        gap: 18px;
        margin-top: 30px;
        width: 100%;
    }

    .admin-link {
        display: block;
        width: 100%;
        color: white;
        text-decoration: none;
    }

    .admin-link .card {
        margin-top: 0;
        width: 100%;
        min-height: 115px;
        border-radius: 12px;
    }

    .admin-link h2 {
        margin: 0 0 8px;
        font-size: 28px;
    }

    .admin-link p {
        margin: 0;
        color: #cfcfcf;
        font-size: 15px;
    }

    .admin-link:hover .card {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(255, 255, 255, 0.35);
    }

    .btn {
        margin-top: 24px;
    }
</style>
</head>

<body>

<div class="container">
    <h1>Admin Panel</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION["user"]); ?></p>

    <div class="admin-menu">
        <a class="admin-link" href="admin_users.php">
            <div class="card">
                <h2>Manage Users</h2>
                <p>Create, update roles, view and delete users.</p>
            </div>
        </a>

        <a class="admin-link" href="admin_cars.php">
            <div class="card">
                <h2>Manage Cars</h2>
                <p>Create, edit prices, update descriptions and delete cars.</p>
            </div>
        </a>

        <a class="admin-link" href="admin_purchases.php">
            <div class="card">
                <h2>Manage Purchases</h2>
                <p>Review orders, update status and remove test purchases.</p>
            </div>
        </a>
    </div>

    <a href="home.php" class="btn">Back to Home</a>
</div>

</body>
</html>