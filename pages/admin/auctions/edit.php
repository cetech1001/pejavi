<?php require_once "../../../config/index.php"?>
<?php
    if (!isset($_GET["id"])) {
        $_SESSION["error"] = "Please provide an auction ID";
        redirect("./index.php");
    }

    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize($_POST["name"]);
        $start_time = sanitize($_POST["start_time"]);
        $end_time = sanitize($_POST["end_time"]);

        $types = "sss";
        $args = [$name, $start_time, $end_time];
        $query = "UPDATE auctions SET name = ?, start_time = ?, end_time = ?";

        if (!empty($_FILES["image"]["tmp_name"])) {
            $image = file_get_contents($_FILES["image"]["tmp_name"]);
            $types .= "s";
            $args[] = $image;
            $query .= ", image = ?";
        }

        $query .= " WHERE id = '$id'";

        $stmt = $conn->prepare($query);
        $stmt->bind_param($types, ...$args);
        $stmt->execute();

        $_SESSION["success"] = "Auction updated successfully";
        redirect("./index.php");
    }

    $query = "SELECT * FROM auctions WHERE id = '$id' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows === 0) {
        $_SESSION["error"] = "Please provide a valid auction ID";
        redirect("./index.php");
    }

    $auction = $result->fetch_assoc();
?>
<?php include_once "../layout/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Auction</h1>
    </div>
    <form class="row" action="<?= $_SERVER["PHP_SELF"] ?>?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">
                Name <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $auction["name"] ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*">
        </div>
        <div class="col-md-6 mb-3">
            <label for="start_time" class="form-label">
                Start Time <span class="text-danger">*</span>
            </label>
            <input type="datetime-local" class="form-control" name="start_time" id="start_time"
                   value="<?= date_time($auction["start_time"]) ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="end_time" class="form-label">
                End Time <span class="text-danger">*</span>
            </label>
            <input type="datetime-local" class="form-control" name="end_time" id="end_time"
                   value="<?= date_time($auction["end_time"]) ?>" required>
        </div>
        <div class="col-md-12">
            <button class="btn btn-secondary" name="new-auction" type="submit">Submit</button>
        </div>
    </form>
</main>
<?php include_once "../layout/footer.php"; ?>
