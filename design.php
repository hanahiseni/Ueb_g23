<?php
session_start();
require_once __DIR__ . "/helpers.php";

error_reporting(E_ALL);
ini_set('display_errors', 0);

include "data/cars.php";
require_once "oop.php";

$selectedBrand = "Porsche";
$selectedColor = "";

$allowedBrands = array_column($cars, "brand");

if (isset($_GET["brand"]) && in_array($_GET["brand"], $allowedBrands, true)) {
    $selectedBrand = $_GET["brand"];
}

$currentCar = null;

foreach ($cars as $car) {
    if ($car["brand"] == $selectedBrand) {
        $currentCar = $car;
        break;
    }
}

if ($currentCar === null) {
    $currentCar = $cars[0];
}

if (isset($_GET["color"])) {
    $selectedColor = $_GET["color"];
} else {
    $selectedColor = $currentCar["default_color"];
}

if (!isset($currentCar["colors"][$selectedColor])) {
    $selectedColor = $currentCar["default_color"];
}

$currentImage = $currentCar["colors"][$selectedColor];

$configuredCar = new DiscountCar(
    $currentCar["brand"],
    $currentCar["full_model"],
    (float)$currentCar["price"],
    10
);

$discountAmount = $configuredCar->getDiscountAmount();
$finalPrice = $configuredCar->getFinalPrice();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Car Configurator – Porsche / Audi / Mercedes / BMW</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="design.css?v=30" />
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="cookies.css">
  <link rel="icon" href="fotografi/logo.jpg">

  <script>
    window.REVGT_USER = "<?php echo isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user'], ENT_QUOTES) : 'guest'; ?>";
  </script>

  <script src="cookies.js" defer></script>
  <script src="design.js" defer></script>
</head>

<body>

<div class="nav">
  <?php foreach ($brands as $brand) { ?>
    <a href="design.php?brand=<?php echo urlencode($brand); ?>"><?php echo e($brand); ?></a>
  <?php } ?>
</div>

<section class="brand" id="<?php echo e(strtolower($currentCar['brand'])); ?>">
  <div class="wrap">
    <div class="grid">

      <div>
        <div class="headline">
          <small>Configurator</small>
          <h1>Configure your <b><?php echo e($currentCar["brand"]); ?></b></h1>
        </div>

        <div class="controls">
          <div>
            <span class="label">Model</span>
            <select onchange="window.location.href=this.value">
              <?php foreach ($cars as $car) { ?>
                <option
                  value="design.php?brand=<?php echo urlencode($car['brand']); ?>"
                  <?php if ($car["brand"] == $currentCar["brand"]) echo "selected"; ?>
                >
                  <?php echo e($car["full_model"]); ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div>
            <span class="label">Exterior colour</span>
            <div class="swatches">
              <?php foreach ($currentCar["colors"] as $colorName => $imagePath) { ?>
                <a href="design.php?brand=<?php echo urlencode($currentCar['brand']); ?>&color=<?php echo urlencode($colorName); ?>">
                  <span class="swatch <?php echo strtolower(str_replace(' ', '-', $colorName)); ?> <?php if ($colorName == $selectedColor) echo 'active'; ?>"></span>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="summary">
          <div>Model: <b><?php echo e($currentCar["full_model"]); ?></b></div>
          <div>Color: <b><?php echo e($selectedColor); ?></b></div>
        </div>
      </div>

      <div class="preview">
        <div class="badge"><?php echo e($currentCar["badge"]); ?></div>

        <div class="toprow">
          <div class="title">
            <small>Current configuration</small>
            <h2><?php echo e($currentCar["full_model"]); ?></h2>
          </div>

          <div class="price">
            from
            <strong>€<?php echo number_format($currentCar["price"], 0, '.', ','); ?></strong>
            <br>
            <small>
              Discount <?php echo $configuredCar->getDiscount(); ?>%:
              -€<?php echo number_format($discountAmount, 0, '.', ','); ?>
            </small>
            <br>
            final
            <strong>€<?php echo number_format($finalPrice, 0, '.', ','); ?></strong>
          </div>
        </div>

        <div class="imgwrap">
          <img src="<?php echo e($currentImage); ?>" alt="<?php echo e($currentCar['full_model']); ?>" />
        </div>

        <div class="specs">
          <div class="spec">
            <div class="k">Power</div>
            <div class="v"><?php echo  e($currentCar["power"]); ?></div>
          </div>

          <div class="spec">
            <div class="k">0–100 km/h</div>
            <div class="v"><?php echo e($currentCar["acceleration"]); ?></div>
          </div>

          <div class="spec">
            <div class="k">Top speed</div>
            <div class="v"><?php echo e($currentCar["top_speed"]); ?></div>
          </div>
        </div>

        <div class="actions">
          <a class="btn secondary" href="design.php?brand=Porsche">Reset</a>
          <a href="../Ueb_g23/BuyItems/buy.php?car=<?php echo strtolower($currentCar['brand']); ?>" class="btn">
            Save configuration
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<footer class="site-footer">
  © <span id="currentYear"></span> RevGT Corporation · All rights reserved
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="transition.js"></script>
<script src="footer.js" defer></script>

</body>
</html>