<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $location = trim($_POST["location"]);
    $message = trim($_POST["message"]);

    $errors = [];

    // 1. Validimi i emrit
    if (!preg_match("/^[A-Za-z\s]{2,50}$/", $name)) {
        $errors[] = "Name must contain only letters and spaces (2-50 characters).";
    }

    // 2. Validimi i email-it
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/", $email)) {
        $errors[] = "Invalid email format.";
    }

    // 3. Validimi i telefonit
    if (!preg_match("/^((044|045|049)\d{6}|\+383\s?\d{8})$/", $phone)) {
        $errors[] = "Invalid phone number format.";
    }

    // 4. Validimi i mesazhit
    if (!preg_match("/^.{10,500}$/s", $message)) {
        $errors[] = "Message must be between 10 and 500 characters.";
    }

    // 5. Validimi i lokacionit
    $allowed_locations = ["airport", "hotel"];
    if (!in_array($location, $allowed_locations)) {
        $errors[] = "Please select a valid pickup location.";
    }

    if (empty($errors)) {
        echo "<h2>Request submitted successfully!</h2>";
        echo "<p>Thank you, " . htmlspecialchars($name) . ". We will contact you soon.</p>";
        echo '<p><a href="contact.html">Back to Contact Page</a></p>';
    } else {
        echo "<h2>Validation Errors:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo '<p><a href="contact.html">Go back to the form</a></p>';
    }
} else {
    header("Location: contact.html");
    exit();
}
?>