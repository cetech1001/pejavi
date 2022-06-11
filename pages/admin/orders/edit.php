<?php
    require_once "../../../config/index.php";

    if (!isset($_GET["id"])) {
        $_SESSION["error"] = "Please provide an user ID";
        redirect("./index.php");
    }

    if (!isset($_GET["status"])) {
        $_SESSION["error"] = "Please provide a status";
        redirect("./index.php");
    }

    $id = sanitize($_GET["id"]);
    $status = sanitize($_GET["status"]);

    $query = "UPDATE orders SET status = ? WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();

    $_SESSION["success"] = "Order updated successfully";
    redirect("./index.php");
