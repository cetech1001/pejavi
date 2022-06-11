<?php
require_once "../../../config/index.php";

if (!isset($_GET["id"])) {
    $_SESSION["error"] = "Please provide an order ID";
    redirect("./index.php");
}

$id = $_GET["id"];
$query = "DELETE FROM orders WHERE id = '$id'";
$conn->query($query);

$_SESSION["success"] = "Order deleted successfully";
redirect("./index.php");