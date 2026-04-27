<?php
session_start();

if (isset($_SESSION["user"])) {
    $userKey = rawurlencode($_SESSION["user"]);

    setcookie("cookieConsent_" . $userKey, "", time() - 3600, "/");
    setcookie("analytics_" . $userKey, "", time() - 3600, "/");
    setcookie("marketing_" . $userKey, "", time() - 3600, "/");
}

session_destroy();

header("Location: home.php");
exit();
?>