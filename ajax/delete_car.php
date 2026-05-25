<?php
require_once "../config/db.php";

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM cars WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Car deleted successfully!";
    } else {
        echo "Error deleting car.";
    }
} else {
    echo "No car ID received.";
}
?>