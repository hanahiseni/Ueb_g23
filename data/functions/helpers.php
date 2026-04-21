<?php


function formatPrice($price) {
    global $currency;
    return $currency . number_format($price);
}

function getCarByBrand($cars, $brand) {
    foreach ($cars as $car) {
        if ($car["brand"] == $brand) {
            return $car;
        }
    }
    return $cars[0];
}

function sortCarsByPrice(&$cars) {
    usort($cars, function($a, $b) {
        return $a["price"] <=> $b["price"];
    });
}

function sortCarsByBrand(&$cars) {
    usort($cars, function($a, $b) {
        return strcmp($a["brand"], $b["brand"]);
    });
}