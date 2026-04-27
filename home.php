<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car landing page</title>
    <link rel="stylesheet" href="home.css" />
    <link rel="icon" href="fotografi/logo.jpg" />
    <link rel="stylesheet" href="footer.css" />
    <link rel="stylesheet" href="cookies.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <script>
      window.REVGT_USER = "<?php echo isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user'], ENT_QUOTES) : 'guest'; ?>";
    </script>
    <script src="cookies.js" defer></script>
  </head>

  <body>
    <video autoplay loop muted playsinline id="bg-video">
      <source src="./fotografi/kerri.mp4" type="video/mp4" />
    </video>

    <nav class="navbar">
      <div class="menu-toggle" id="menu-toggle">
        <i class="fas fa-bars"></i>
      </div>

      <ul class="nav-links" id="nav-links">
        <li><a href="about.php">About</a></li>
        <li><a href="BuyItems/product.php">Products</a></li>
        <li><a href="design.php">Configurator</a></li>
        <li><a href="contact.php">Contact</a></li>

        <?php if(isset($_SESSION["user"])): ?>

          <?php if($_SESSION["role"] == "admin"): ?>
            <li><a href="admin.php">Admin Panel</a></li>
          <?php endif; ?>

          <li><a href="logout.php">Logout</a></li>

        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>

    <section class="hero">
      <h1>RevGT</h1>

      <?php if(isset($_SESSION["user"])): ?>
        <p class="welcome-text">
          Welcome, <?php echo $_SESSION["user"]; ?>
        </p>
      <?php endif; ?>

      <h2>Electric Performance Redefined</h2>
      <p>Precision engineering. Minimal design. Maximum performance.</p>
      <a href="BuyItems/product.php" class="explore-btn">Explore models</a>
    </section>

    <section id="models"></section>

    <footer class="site-footer">
      © <span id="currentYear"></span> RevGT Corporation · All rights reserved
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="transition.js"></script>
    <script src="home.js"></script>
    <script src="footer.js" defer></script>
    <section>
    <h2>Shembull me vargje në PHP</h2>

    <?php
    $vlerat = [7, 4, 6, 1, 9, 2];

    array_unshift($vlerat, 12);
    array_push($vlerat, "start");

    array_pop($vlerat);
    array_shift($vlerat);

    if (count($vlerat) > 5) {
        rsort($vlerat);
    }

    if (isset($vlerat[0])) {
        if ($vlerat[0] < 5) {
            echo "<p>Indeksi 0 ka vlerë më të vogël se 5</p>";
        } else {
            echo "<p>Indeksi 0 ka vlerë më të madhe ose të barabartë me 5</p>";
        }
    } else {
        echo "<p>Indeksi 0 nuk ekziston</p>";
    }

    echo "<pre>";
    print_r($vlerat);
    echo "</pre>";
    ?>
</section>

<section>
    <h2>Shembull me vargje në PHP</h2>

    <?php
    $vlerat = [7, 4, 6, 1, 9, 2];

    array_unshift($vlerat, 12);
    array_push($vlerat, "start");

    array_pop($vlerat);
    array_shift($vlerat);

    if (count($vlerat) > 5) {
        rsort($vlerat);
    }

    if (isset($vlerat[0])) {
        if ($vlerat[0] < 5) {
            echo "<p>Indeksi 0 ka vlerë më të vogël se 5</p>";
        } else {
            echo "<p>Indeksi 0 ka vlerë më të madhe ose të barabartë me 5</p>";
        }
    } else {
        echo "<p>Indeksi 0 nuk ekziston</p>";
    }

    echo "<pre>";
    print_r($vlerat);
    echo "</pre>";
    ?>
</section>

  </body>
</html>