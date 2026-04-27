<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Marrja e të dhënave nga forma
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $address = $_POST["address"] ?? "";
    $payment = $_POST["payment"] ?? "";
    $car = $_POST["car"] ?? "Unknown";

    // Validim minimal
    if (!$name || !$email || !$address) {
        die("Missing required fields.");
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

        $mail->Body = "
            <h2>Thank you for your purchase!</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Car:</strong> $car</p>
            <p><strong>Payment:</strong> $payment</p>
            <p><strong>Address:</strong> $address</p>
            <br>
            <p>Your order has been received successfully.</p>
        ";

        $mail->send();

        // Redirect pas suksesit
        header("Location: success.php");
        exit;

    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
}
