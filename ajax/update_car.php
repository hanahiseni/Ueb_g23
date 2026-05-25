<?php

require_once "../config/db.php";

$carId = (int)($_POST["car_id"] ?? 0);

$brand = trim($_POST["brand"] ?? "");
$model = trim($_POST["model"] ?? "");
$price = trim($_POST["price"] ?? "");
$image = trim($_POST["image"] ?? "");
$description = trim($_POST["description"] ?? "");

if (
    $carId <= 0 ||
    $brand === "" ||
    $model === "" ||
    $image === "" ||
    !is_numeric($price) ||
    $price <= 0
) {

    echo "Invalid car update.";
    exit;
}

$sql = "UPDATE cars
        SET brand = ?, model = ?, price = ?, image = ?, description = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssdssi",
    $brand,
    $model,
    $price,
    $image,
    $description,
    $carId
);

if (mysqli_stmt_execute($stmt)) {

    echo "Car updated successfully!";

} else {

    echo "Could not update car.";

}
?>