<?php
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../helpers.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="buy.css">
  <title>Check out - RevGT</title>
  <link rel="icon" href="../fotografi/logo.jpg">
</head>

<body>
  <div class="checkout-container">
    <h2>Checkout</h2>

    <form id="checkoutForm" action="process-purchase.php" method="POST">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Please enter your name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="address">Address</label>
      <input type="text" id="address" name="address" placeholder="Street, City, Country" required>

      <label for="payment">Payment Method</label>
      <select id="payment" name="payment" required>
        <option value="credit">Credit / Debit Card</option>
        <option value="paypal">PayPal</option>
        <option value="bank">Bank Transfer</option>
      </select>

      <input type="hidden" id="car" name="car">

      <button type="submit">Confirm Purchase</button>
    </form>
  </div>

  <script src="cart-lib.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const params = new URLSearchParams(window.location.search);
      const car = params.get("car");

      if (car) {
        document.getElementById("car").value = car;
      }

      if (typeof loadCart === "function") {
        const cart = loadCart();

        if (!cart.length) {
          console.log("Cart empty");
        } else {
          console.log("Checkout cart:", cart);

          if (typeof cartTotal === "function") {
            console.log("Total:", cartTotal(cart));
          }
        }
      }
    });
  </script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="transition.js"></script>
</body>
</html>