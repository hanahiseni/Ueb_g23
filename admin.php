<?php
session_start();

// nëse s’je log in → kthehu te login
if(!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// nëse nuk je admin → ndalo hyrjen
if($_SESSION["role"] != "admin") {
    echo "No access - Admins only";
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
 
    <link rel="stylesheet" href="admin.css">
</head>

<body>

<h1>Admin Panel</h1>
<p>Welcome, <?php echo $_SESSION["user"]; ?></p>

<div class="card">
    <h3>Manage Users</h3>
    <p>Only admin can see this section</p>
</div>

<div class="card">
    <h3>View Reports</h3>
    <p>Statistics / data (dummy)</p>
</div>

<div class="card">
    <h3>Site Settings</h3>
    <p>Change settings (demo)</p>
</div>

<a href="home.php" class="btn">Back to Home</a>

</body>
</html>