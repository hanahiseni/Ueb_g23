<?php
$currency = "€";

$brands = ["Porsche", "Audi", "Mercedes", "BMW"];

$cars = [
    ["brand" => "Porsche", "model" => "911", "price" => 120000, "power" => "394 PS"],
    ["brand" => "Audi", "model" => "RS7", "price" => 95000, "power" => "600 PS"],
    ["brand" => "Mercedes", "model" => "AMG-GT", "price" => 110000, "power" => "585 PS"],
    ["brand" => "BMW", "model" => "M3", "price" => 105000, "power" => "510 PS"]
];

function formatPrice($price, $currency) {
    return $currency . number_format($price, 0, '.', ',');
}

function getCarCategory($price) {
    if ($price >= 100000) {
        return "Premium model";
    } else {
        return "Standard model";
    }
}

if (isset($_GET["sort"])) {
    if ($_GET["sort"] == "price") {
        usort($cars, function($a, $b) {
            return $a["price"] <=> $b["price"];
        });
    }

    if ($_GET["sort"] == "brand") {
        usort($cars, function($a, $b) {
            return strcmp($a["brand"], $b["brand"]);
        });
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Concepts</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #050814;
            color: white;
        }

        .container {
            padding: 50px;
        }

        .brand {
            display: inline-block;
            background: #1f2937;
            padding: 10px 15px;
            margin: 5px;
            border-radius: 20px;
        }

        .links a {
            display: inline-block;
            background: white;
            color: #050814;
            padding: 10px 15px;
            margin: 10px 10px 20px 0;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .cars {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .card {
            background: #111827;
            padding: 20px;
            border-radius: 18px;
            border: 1px solid #273244;
        }

        .premium {
            color: #facc15;
            font-weight: bold;
        }

        .standard {
            color: #86efac;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Personi 3 - Konceptet bazë të PHP</h1>

    <p>Kjo faqe demonstron variabla, funksione, kushte, cikle, vargje dhe sortime.</p>

    <h2>Numeric Array - Brands</h2>

    <?php foreach ($brands as $brand) { ?>
        <span class="brand"><?php echo $brand; ?></span>
    <?php } ?>

    <h2>Sortimi</h2>

    <div class="links">
        <a href="index.php">Pa sortim</a>
        <a href="index.php?sort=price">Sort by Price</a>
        <a href="index.php?sort=brand">Sort by Brand</a>
    </div>

    <div class="cars">
        <?php foreach ($cars as $car) { ?>
            <div class="card">
                <h2><?php echo $car["brand"] . " " . $car["model"]; ?></h2>

                <p>Brand: <b><?php echo $car["brand"]; ?></b></p>
                <p>Model: <b><?php echo $car["model"]; ?></b></p>
                <p>Power: <b><?php echo $car["power"]; ?></b></p>
                <p>Price: <b><?php echo formatPrice($car["price"], $currency); ?></b></p>

                <?php if ($car["price"] >= 100000) { ?>
                    <p class="premium"><?php echo getCarCategory($car["price"]); ?></p>
                <?php } else { ?>
                    <p class="standard"><?php echo getCarCategory($car["price"]); ?></p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
