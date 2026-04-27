<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    
    <link rel="icon" href="fotografi/logo.jpg">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

  
    <link rel="icon" href="fotografi/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="footer.css">
    
</head>
<body>
<header class="nav">
  <div class="logo">
    <img src="fotografi/revgt.png" alt="RevGT">
    <span>RevGT</span>
  </div>

<nav class="menu">
  <a href="home.php">Home</a>

  <div class="dropdown">
    <span class="dropbtn">Services</span>

    <div class="dropmenu">
      <a href="BuyItems/product.php">Products</a>
      <a href="BuyItems/buy.php">Buy Car</a>
      <a href="design.php">Customize Car</a>
    </div>
  </div>

  <a href="contact.html">Contact</a>
  <li><a href="logout.php">Logout</a></li>
</nav>


</header>



    <section class="main">
        <div class="main-content">
            <h2>About RevGT</h2>
            <p>Precision. Passion. Performance.</p>
            <a href="#what_we_do" class="btn">Explore Services</a>
        </div>
    </section>

    <section class="section" id="driven">
        <h3>Driven by Design</h3>
        <p>Since day one, Revgt has been about more than just cars - it's about the thrill of transformation. From premium vehicle sales to advanced car styling and performance upgrades, we build experiences for those wholive and breathe the road.</p>
    </section>

    <section class="section" id="what_we_do">
        <h3>What We Do</h3>
        <div class="grid">
            <a href="BuyItems/buy.php" class="card">
            <img src="fotografi/mercedes.png" alt="Car sales">
            <div class="card-container">
                <h4>Exclusive Car Sales</h4>
                <p>We bring top-tier vehicles to the market - from luxury rides to performance beasts - ready to own the road.</p>
                <a href="BuyItems/buy.php" class="btn">View Cars</a>
            </div>
            </a>

            <a href="design.php" class="card">
                <img src="bmw2 (2).png" alt="Car styling">
                <div class="card-container">
                    <h4>Styling & Tuning</h4>
                    <p>Custom styling, detailing, and performance tuning that redifines your car's identity.</p>
                    <a href="design.php" class="btn">Configure Now</a>
                </div>
            </a>

            <a href="BuyItems/product.php" class="card">
                <img src="fotografi/audi2.png" alt="Tech">
                <div class="card-container">
                    <h4>Smart Car Tech</h4>
                    <p>Integrating modern tech - infotainment upgrades and performance data systems - keeping your car ahead of the curve.</p>
                    <a href="BuyItems/product.php" class="btn">View More</a>
                </div>
            </a>
        </div>
    </section>
    
    <section class="section" id="packages">
        <h3>Performance Packages</h3>
        <table class="package-table">
            <thead>
                <tr>
                    <th>Package</th>
                    <th>Includes</th>
                    <th>Starting Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Base</td>
                    <td>Detailing, Wheel Alignment</td>
                    <td>$499</td>
                </tr>
                <tr>
                    <td>Sport</td>
                    <td>Custom Exhaust, Suspension Tune, Performance Tires</td>
                    <td>$1,200</td>
                </tr>
                <tr>
                    <td>Elite</td>
                    <td>Full Engine Remap, Aero Kit, Interior Redesign</td>
                    <td>$2,800</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="section" id="values">
        <h3>Our Core Values</h3>
        <ul class="values-list">
            <li><i class="fas fa-cog"></i>Precision engineering in every detail</li>
            <li><i class="fas fa-fire"></i>Passion for cars that defines our identity</li>
            <li><i class="fas fa-lightbulb"></i>Constant innovation in performance design</li>
            <li><i class="fas fa-handshake"></i>Long-term trust and transparency with our clients</li>
        </ul>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <h2>RevGT</h2>
                <p>Crafted with passion for those who live fast and think faster.</p>
            </div>

            <div class="footer-links">
                <div>
                    <h4>Company</h4>
                    <a href="about.php">About</a>
                    <a href="#">Careers</a>
                    <a href="contact.html">Contact</a>
                </div>
                <div>
                    <h4>Quick Links</h4>
                    <a href="BuyItems/product.php">Our cars</a>
                    <a href="design.php">Services</a>
                    <a href="#">Gallery</a>
                </div>
                <div>
                    <h4>Follow us</h4>
                    <div class="socials">
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i>Instagram</a>
                        <a href="tiktok.com"><i class="fab fa-tiktok"></i>TikTok</a>
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i>Youtube</a>
                    </div>
                </div>
            </div>
        </div>

     
     <button id="backToTop"><i class="fas fa-arrow-up"></i></button>


     <script>
  const dropdown = document.getElementById("servicesDropdown");
  const button = dropdown.querySelector(".dropbtn");

 
  button.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdown.classList.toggle("active");
  });


  document.addEventListener("click", () => {
    dropdown.classList.remove("active");
  });


  


  dropdown.querySelector(".dropmenu").addEventListener("click", (e) => {
    e.stopPropagation();
  });
</script>

     
        <footer class="site-footer">
        © <span id="currentYear"></span> RevGT Corporation · All rights reserved
        </footer>

        <script src="footer.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="transition.js"></script>

        <script src="about.js"></script>
     
</body>
       
</html>
