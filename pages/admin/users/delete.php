<?php
require_once "../../../config/index.php";

if (!isset($_GET["id"])) {
    $_SESSION["error"] = "Please provide an user ID";
    redirect("./index.php");
}

$id = $_GET["id"];
$query = "DELETE FROM users WHERE id = '$id'";
$conn->query($query);

$_SESSION["success"] = "User deleted successfully";
redirect("./index.php");