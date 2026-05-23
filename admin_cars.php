<?php
session_start();
require_once __DIR__ . "/config/db.php";

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

    if ($action === "create") {
        $brand = trim($_POST["brand"] ?? "");
        $model = trim($_POST["model"] ?? "");
        $price = trim($_POST["price"] ?? "");
        
        $description = trim($_POST["description"] ?? "");
        $fileType = $_FILES["car_image"]["type"];

        $allowedTypes = ["image/jpeg", "image/png", "image/webp"];

        if (!in_array($fileType, $allowedTypes)) {
            $error = "Only JPG, PNG and WEBP images are allowed.";
        }

       if (empty($error)) {

            $uploadPath = "fotografi/" . basename($imageName);

            move_uploaded_file($tmpName, $uploadPath);

            $image = $uploadPath;
        }

        if ($brand === "" || $model === "" || $image === "" || !is_numeric($price) || $price <= 0) {
            $error = "Please fill brand, model, valid price and image.";
        } else {
            $sql = "INSERT INTO cars (brand, model, price, image, description)
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssdss", $brand, $model, $price, $image, $description);

            if (mysqli_stmt_execute($stmt)) {
                $success = "Car created successfully.";
            } else {
                $error = "Could not create car.";
            }
        }
    }

    if ($action === "update") {
        $carId = (int)($_POST["car_id"] ?? 0);
        $brand = trim($_POST["brand"] ?? "");
        $model = trim($_POST["model"] ?? "");
        $price = trim($_POST["price"] ?? "");
        $image = trim($_POST["image"] ?? "");
        $description = trim($_POST["description"] ?? "");

        if ($carId <= 0 || $brand === "" || $model === "" || $image === "" || !is_numeric($price) || $price <= 0) {
            $error = "Invalid car update.";
        } else {
            $sql = "UPDATE cars
                    SET brand = ?, model = ?, price = ?, image = ?, description = ?
                    WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssdssi", $brand, $model, $price, $image, $description, $carId);

            if (mysqli_stmt_execute($stmt)) {
                $success = "Car updated successfully.";
            } else {
                $error = "Could not update car.";
            }
        }
    }

    if ($action === "delete") {
        $carId = (int)($_POST["car_id"] ?? 0);

        if ($carId <= 0) {
            $error = "Invalid car delete request.";
        } else {
            $sql = "DELETE FROM cars WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $carId);

            try {

                if (mysqli_stmt_execute($stmt)) {
                    $success = "Car created successfully.";
                } else {
                    throw new Exception("Could not create car.");
                }

            } catch (Exception $e) {

                $error = $e->getMessage();
            }
        }
    }
}

$result = mysqli_query($conn, "SELECT id, brand, model, price, image, description, created_at FROM cars ORDER BY id DESC");
$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Cars</title>
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

        input, textarea, button {
            padding: 10px;
            margin: 6px 4px;
        }

        button {
            cursor: pointer;
        }

        textarea {
            min-width: 280px;
            min-height: 55px;
            vertical-align: middle;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            background: #1b1b1b;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #333;
            text-align: left;
            vertical-align: top;
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

        .car-thumb {
            width: 90px;
            height: 55px;
            object-fit: cover;
        }
    </style>
</head>

<body>

<h1>Manage Cars</h1>
<p>Welcome, <?php echo htmlspecialchars($_SESSION["user"]); ?></p>

<div class="admin-nav">
    <a href="admin_users.php">Manage Users</a>
    <a href="admin_purchases.php">Manage Purchases</a>
    <a href="home.php">Back to Home</a>
</div>

<?php if ($success): ?>
    <p class="success"><?php echo htmlspecialchars($success); ?></p>
<?php endif; ?>

<?php if ($error): ?>
    <p class="error"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<div class="panel">
    <h2>Add Car</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="create">

        <input type="text" name="brand" placeholder="Brand" required>
        <input type="text" name="model" placeholder="Model" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="file" name="car_image" required>
        <textarea name="description" placeholder="Description"></textarea>

        <button type="submit">Create Car</button>
    </form>
</div>

<div class="panel">
    <h2>Cars</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Preview</th>
            <th>Car Data</th>
            <th>Description</th>
            <th>Created</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($cars as $car): ?>
            <tr>
                <td><?php echo (int)$car["id"]; ?></td>

                <td>
                    <img
                        class="car-thumb"
                        src="<?php echo htmlspecialchars($car["image"]); ?>"
                        alt="<?php echo htmlspecialchars($car["brand"] . " " . $car["model"]); ?>"
                    >
                </td>

                <td>
                    <form method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="car_id" value="<?php echo (int)$car["id"]; ?>">

                        <input type="text" name="brand" value="<?php echo htmlspecialchars($car["brand"]); ?>" required>
                        <input type="text" name="model" value="<?php echo htmlspecialchars($car["model"]); ?>" required>
                        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($car["price"]); ?>" required>
                        <input type="text" name="image" value="<?php echo htmlspecialchars($car["image"]); ?>" required>

                        <button type="submit">Update</button>
                    </form>
                </td>

                <td>
                    <form method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="car_id" value="<?php echo (int)$car["id"]; ?>">
                        <input type="hidden" name="brand" value="<?php echo htmlspecialchars($car["brand"]); ?>">
                        <input type="hidden" name="model" value="<?php echo htmlspecialchars($car["model"]); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($car["price"]); ?>">
                        <input type="hidden" name="image" value="<?php echo htmlspecialchars($car["image"]); ?>">

                        <textarea name="description"><?php echo htmlspecialchars($car["description"] ?? ""); ?></textarea>
                        <button type="submit">Update</button>
                    </form>
                </td>

                <td><?php echo htmlspecialchars($car["created_at"]); ?></td>

                <td>
                    <form method="POST" onsubmit="return confirm('Delete this car?');">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="car_id" value="<?php echo (int)$car["id"]; ?>">
                        <button class="btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>