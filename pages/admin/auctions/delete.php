<?php
require_once "../../../config/index.php";

if (!isset($_GET["id"])) {
    $_SESSION["error"] = "Please provide an auction ID";
    redirect("./index.php");
}

$id = $_GET["id"];
$query = "DELETE FROM auctions WHERE id = '$id'";
$conn->query($query);

$_SESSION["success"] = "Auction deleted successfully";
redirect("./index.php");