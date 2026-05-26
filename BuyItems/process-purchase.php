<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../helpers.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Marrja e të dhënave nga forma
  $name = trim($_POST["name"] ?? "");
  $email = trim($_POST["email"] ?? "");
  $address = trim($_POST["address"] ?? "");
  $payment = trim($_POST["payment"] ?? "");
  $car = trim($_POST["car"] ?? "Unknown");





    // Validim minimal
   $allowedPayments = ["credit", "paypal", "bank"];

if ($name === "" || strlen($name) < 2 || strlen($name) > 80) {
    die("Invalid name.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email.");
}

if ($address === "" || strlen($address) < 5 || strlen($address) > 150) {
    die("Invalid address.");
}

if (!in_array($payment, $allowedPayments, true)) {
    die("Invalid payment method.");
}

if ($car === "" || strlen($car) > 80) {
    die("Invalid car.");
}

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

      
        $mail->Username   = 'revgt.confirmations@gmail.com';
        $mail->Password   = 'lnks pfms kdiy rujo';

        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('revgt.confirmations@gmail.com', 'RevGT');
        $mail->addAddress($email, $name);

   
        $mail->isHTML(true);
        $mail->Subject = 'Purchase Confirmation - RevGT';


        $safeName = e($name);
        $safeCar = e($car);
        $safePayment = e($payment);
        $safeAddress = e($address);


      $mail->Body = "
        <h2>Thank you for your purchase!</h2>
        <p><strong>Name:</strong> {$safeName}</p>
        <p><strong>Car:</strong> {$safeCar}</p>
        <p><strong>Payment:</strong> {$safePayment}</p>
        <p><strong>Address:</strong> {$safeAddress}</p>
        <br>
        <p>Your order has been received successfully.</p>
    ";

        $mail->send();

        // Redirect pas suksesit
        header("Location: success.php");
        exit;

    } catch (Exception $e) {
       error_log("Email error: " . $mail->ErrorInfo);
       echo "Email could not be sent. Please try again later.";
    }
}
