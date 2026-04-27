<!doctype html>
<html lang="sq">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Favorites</title>
  <link rel="icon" href="/fotografi/logo.jpg">
  <link rel="stylesheet" href="product.css">
</head>

  <body class="favorites-page">
  <main class="page">
    <a href="product.php" class="back-btn">← Back</a>

    <h1>Favorites</h1>

    <div id="favEmpty" style="display:none;">Favorites list is empty.</div>
    <div id="favList"></div>

    <div class="cart-summary">
      <button class="btn secondary" id="clearFavBtn" type="button">Clear favorites</button>
    </div>
  </main>

  
  <script src="favorites-lib.js"></script>
  <script src="favorites-list.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="transition.js"></script>
</body>
</html>
