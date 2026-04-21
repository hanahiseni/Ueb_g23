<?php
include "data/cars.php";

echo $cars[0]["full_model"] . "<br>";
echo $cars[0]["price"] . "<br>";
echo $cars[0]["colors"]["Red"] . "<br>";

echo "<hr>";

echo $cars[1]["full_model"] . "<br>";
echo $cars[1]["colors"]["Black"] . "<br>";
?>