<?php

require_once "../db.php";

if (isset($_POST['id'])) {

    $id = intval($_POST['id']);

    $sql = "DELETE FROM cars WHERE id = $id";

    if (mysqli_query($conn, $sql)) {

        echo "Car deleted successfully!";

    } else {

        echo "Error deleting car.";

    }
}
?>