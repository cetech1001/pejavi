<?php
    ob_start();
    session_start();

    ini_set("display_errors", true);
    ini_set("display_startup_errors", true);
    error_reporting(E_ALL);

    define("PROJECT_PATH", dirname(__DIR__));
    define("PUBLIC_PATH", "/livestock-auction-platform");

    $conn = mysqli_connect("localhost", "root", "", "livestock_auction");

    if ($conn->connect_errno) {
        die("Database error: {$conn->connect_error}");
    }

    require_once PROJECT_PATH . "/config/functions.php";
?>