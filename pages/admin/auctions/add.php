<?php require_once "../../../config/index.php"?>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize($_POST["name"]);
        $start_time = sanitize($_POST["start_time"]);
        $end_time = sanitize($_POST["end_time"]);
        $image = file_get_contents($_FILES["image"]["tmp_name"]);

        $query = "INSERT INTO auctions (name, image, start_time, end_time) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $name, $image, $start_time, $end_time);
        $stmt->execute();

        $_SESSION["success"] = "Auction created successfully";
        header("location: ./index.php");
        exit();
    }
?>

<?php include_once "../layout/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Auction</h1>
    </div>
    <form class="row" action="#" method="post" enctype="multipart/form-data">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">
                Name <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="image" class="form-label">
                Image <span class="text-danger">*</span>
            </label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="start_time" class="form-label">
                Start Time <span class="text-danger">*</span>
            </label>
            <input type="datetime-local" class="form-control" name="start_time" id="start_time" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="end_time" class="form-label">
                End Time <span class="text-danger">*</span>
            </label>
            <input type="datetime-local" class="form-control" name="end_time" id="end_time" required>
        </div>
        <div class="col-md-12">
            <button class="btn btn-secondary" name="new-auction" type="submit">Submit</button>
        </div>
    </form>
</main>
<?php include_once "../layout/footer.php"; ?>
