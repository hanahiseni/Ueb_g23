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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? "";

    if ($action === "update_status") {
        $purchaseId = (int)($_POST["purchase_id"] ?? 0);
        $status = $_POST["status"] ?? "pending";

       $allowedStatuses = ["pending", "confirmed", "cancelled"];

        if ($purchaseId <= 0 || !in_array($status, $allowedStatuses, true)) {
            $error = "Invalid status update.";
        } 
        else {
            $sql = "UPDATE purchases SET status = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $status, $purchaseId);

            if (mysqli_stmt_execute($stmt)) {
                $success = "Purchase status updated.";
            } else {
                $error = "Could not update purchase status.";
            }
        }
    }

    if ($action === "delete") {
        $purchaseId = (int)($_POST["purchase_id"] ?? 0);

        if ($purchaseId <= 0) {
            $error = "Invalid delete request.";
        } else {
            $sql = "DELETE FROM purchases WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $purchaseId);

            if (mysqli_stmt_execute($stmt)) {
                $success = "Purchase deleted.";
            } else {
                $error = "Could not delete purchase.";
            }
        }
    }
}

$sql = "
    SELECT
        purchases.id,
        purchases.full_name,
        purchases.email,
        purchases.address,
        purchases.payment_method,
        purchases.status,
        purchases.created_at,
        users.username,
        cars.brand,
        cars.model,
        cars.price
    FROM purchases
    INNER JOIN users ON purchases.user_id = users.id
    INNER JOIN cars ON purchases.car_id = cars.id
    ORDER BY purchases.id DESC
";

$result = mysqli_query($conn, $sql);
$purchases = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Purchases</title>
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

        .panel {
            background: #1b1b1b;
            padding: 18px;
            margin: 18px 0;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            background: #1b1b1b;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #333;
            text-align: left;
            vertical-align: top;
        }

        select, button {
            padding: 10px;
            margin: 6px 4px;
        }

        button {
            cursor: pointer;
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
        }
    </style>
</head>

<body>

<h1>Manage Purchases</h1>
<p>Welcome, <?php echo e($_SESSION["user"]); ?></p>

<div class="admin-nav">
    <a href="admin_users.php">Manage Users</a>
    <a href="admin_cars.php">Manage Cars</a>
    <a href="home.php">Back to Home</a>
</div>

<?php if ($success): ?>
    <p class="success"><?php echo e($success); ?></p>
<?php endif; ?>

<?php if ($error): ?>
    <p class="error"><?php echo e($error); ?></p>
<?php endif; ?>

<div class="panel">
    <h2>Purchases</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Car</th>
            <th>Customer</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Created</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($purchases as $purchase): ?>
            <tr>
                <td><?php echo (int)$purchase["id"]; ?></td>

                <td><?php echo e($purchase["username"]); ?></td>

                <td>
                    <?php echo e($purchase["brand"] . " " . $purchase["model"]); ?><br>
                    <?php echo e($purchase["price"]); ?> EUR
                </td>

                <td>
                    <?php echo e($purchase["full_name"]); ?><br>
                    <?php echo e($purchase["email"]); ?><br>
                    <?php echo e($purchase["address"]); ?>
                </td>

                <td><?php echo e($purchase["payment_method"]); ?></td>

                <td>
                    <form method="POST">
                        <input type="hidden" name="action" value="update_status">
                        <input type="hidden" name="purchase_id" value="<?php echo (int)$purchase["id"]; ?>">

                        <select name="status">
                            <option value="pending" <?php if ($purchase["status"] === "pending") echo "selected"; ?>>Pending</option>
                            <option value="confirmed" <?php if ($purchase["status"] === "confirmed") echo "selected"; ?>>Confirmed</option>
                            <option value="cancelled" <?php if ($purchase["status"] === "cancelled") echo "selected"; ?>>Cancelled</option>
                        </select>

                        <button type="submit">Update</button>
                    </form>
                </td>

                <td><?php echo e($purchase["created_at"]); ?></td>

                <td>
                    <form method="POST" onsubmit="return confirm('Delete this purchase?');">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="purchase_id" value="<?php echo (int)$purchase["id"]; ?>">
                        <button class="btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>