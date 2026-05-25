<?php

$url = "https://api.exchangerate-api.com/v4/latest/EUR";

$response = file_get_contents($url);

if ($response === false) {
    die("API request failed.");
}

$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Currency Exchange API</title>

    <style>

        body{
            background:#111;
            color:white;
            font-family:Arial;
            padding:40px;
        }

        .card{
            background:#1f1f1f;
            padding:20px;
            border-radius:10px;
            width:300px;
        }

        h1{
            margin-bottom:20px;
        }

        p{
            font-size:18px;
        }

    </style>

</head>

<body>

<h1>Exchange Rate API</h1>

<div class="card">

    <p>1 EUR = <?php echo $data['rates']['USD']; ?> USD</p>

    <p>1 EUR = <?php echo $data['rates']['GBP']; ?> GBP</p>

    <p>1 EUR = <?php echo $data['rates']['CHF']; ?> CHF</p>

    <p>1 EUR = <?php echo $data['rates']['JPY']; ?> JPY</p>

</div>

</body>
</html>