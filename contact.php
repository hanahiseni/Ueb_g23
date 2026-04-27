<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $location = trim($_POST["location"]);
    $message = trim($_POST["message"]);

    $errors = [];

    if (!preg_match("/^[A-Za-z\s]{2,50}$/", $name)) {
        $errors[] = "Name must contain only letters and spaces (2-50 characters).";
    }

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/", $email)) {
        $errors[] = "Invalid email format.";
    }

    if (!preg_match("/^((044|045|049)\d{6}|\+383\s?\d{8})$/", $phone)) {
        $errors[] = "Invalid phone number format.";
    }

    if (!preg_match("/^.{10,500}$/s", $message)) {
        $errors[] = "Message must be between 10 and 500 characters.";
    }

    $allowed_locations = ["airport", "hotel"];
    if (!in_array($location, $allowed_locations)) {
        $errors[] = "Please select a valid pickup location.";
    }

    // CSS LINK VETË NJË HERË
    echo '<link rel="stylesheet" href="contact.css">';

    echo '<div class="result-container">';

    if (empty($errors)) {

        echo '<div class="result-box success">';
        echo "<h2>Request submitted successfully!</h2>";
        echo "<p>Thank you, " . htmlspecialchars($name) . ". We will contact you soon.</p>";
        echo '<a class="btn btn-primary" href="contact.html">Back to form</a>';
        echo '</div>';

    } else {

        echo '<div class="result-box error">';
        echo "<h2>Validation Errors</h2>";

        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";

        echo '<a class="btn btn-outline" href="contact.html">Go back</a>';
        echo '</div>';
    }

    echo '</div>';

} else {
    header("Location: contact.html");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>RevGT | Contact</title>

    <link rel="stylesheet" href="contact.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link rel="stylesheet" href="footer.css" />
  </head>

  <body>
    <header class="nav">
      <div class="logo">
        <img src="fotografi/revgt.png" alt="RevGT logo" />
        <span>RevGT</span>
      </div>

      <nav class="nav-links">
        <a href="home.html">Home</a>
        <a href="about.html">About</a>

        <div class="dropdown">
          <a href="#" class="dropbtn">Services</a>
          <div class="dropmenu">
            <a href="BuyItems/product.php">Products</a>
            <a href="BuyItems/buy.php">Buy Car</a>
            <a href="design.php">Customize Car</a>
          </div>
        </div>
        <li><a href="logout.php">Logout</a></li>
      </nav>
    </header>

    <section class="hero">
      <h1>Precision starts with conversation.</h1>
      <div>
        If you're ready to move beyond limits, we're ready to build with you.
        <a href="#contact"> Contact us</a>
      </div>
    </section>

    <section class="request">
      <h2>Send a Request</h2>
      <p>Tell us what you need — we'll handle the rest.</p>

      <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result-container">
          <?php if ($success): ?>
            <div class="result-box success">
              <h2>Request submitted successfully!</h2>
              <p>Thank you, <?php echo htmlspecialchars($name); ?>. We will contact you soon.</p>
            </div>
          <?php else: ?>
            <div class="result-box error">
              <h2>Validation Errors</h2>
              <ul>
                <?php foreach ($errors as $error): ?>
                  <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <form
        id="contactForm"
        class="request-form"
        action="contact.php"
        method="POST"
      >
        <div class="row">
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Full name"
            required
          />

          <input
            type="email"
            id="email"
            name="email"
            placeholder="Email address"
            required
          />
        </div>

        <div class="row">
          <input
            type="tel"
            id="phone"
            name="phone"
            placeholder="Phone number"
            required
          />

          <select id="location" name="location" required>
            <option value="">Pickup location</option>
            <option value="airport">Prishtina Airport, Lipjan</option>
            <option value="hotel">Grand Hotel Prishtina</option>
          </select>
        </div>

        <textarea
          id="message"
          name="message"
          placeholder="Your request"
          required
        ></textarea>

        <button type="submit">Submit Request</button>

        <p id="formStatus" style="margin-top: 16px; font-size: 14px"></p>
      </form>
    </section>

    <div class="map-wrapper">
      <iframe
        src="https://www.google.com/maps?q=Prishtina+International+Airport+Adem+Jashari&output=embed"
        width="100%"
        height="400"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      >
      </iframe>
    </div>

    <div class="location-text">
      <p style="padding-left: 40px">Visits by appointment only</p>
    </div>

    <footer id="contact">
      <h3>Contact details</h3>

      <p><strong>Office: </strong> Prishtinë, Kosovo</p>
      <p><strong>Email: </strong> support@revgt.com · bookings@revgt.com</p>
      <p><strong>Phone:</strong> +383 44 123 502</p>
      <p><strong>Hours:</strong> Mon-Sat · 09:00-18:00</p>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />

      <div class="footer-links">
        <a href="./products-services.html">Products & Services</a>
        <a href="terms.html">Terms & Conditions</a>
        <a href="privacy.html">Privacy Policy</a>
      </div>

      <div class="footer-copy">
        <br /><br />
        © <span id="currentYear"></span> RevGT Corporation · All rights reserved
      </div>
    </footer>

    <script src="contact.js"></script>
    <script src="https://cdn.botpress.cloud/webchat/v3.5/inject.js"></script>
    <script
      src="https://files.bpcontent.cloud/2025/12/16/21/20251216214453-C5CTV8O9.js"
      defer
    ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="transition.js"></script>
    <script src="footer.js" defer></script>
  </body>
</html>