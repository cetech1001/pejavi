<?php require_once "../../../config/index.php"?>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize($_POST["name"]);
        $price = sanitize($_POST["price"]);
        $quantity = sanitize($_POST["quantity"]);
        $auction_id = sanitize($_POST["auction_id"]);
        $image = file_get_contents($_FILES["image"]["tmp_name"]);

        $query = "INSERT INTO products (name, image, price, quantity, auction_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssdii", $name, $image, $price, $quantity, $auction_id);
        $stmt->execute();

        $_SESSION["success"] = "Product created successfully";
        header("location: ./index.php");
        exit();
    }

    $query = "SELECT * FROM auctions";
    $auctions = $conn->query($query);
?>

<?php include_once "../layout/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Product</h1>
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
            <label for="price" class="form-label">
                Price <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="price" id="price" step="0.01" min="1" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="quantity" class="form-label">
                Quantity <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="quantity" id="quantity" step="1" min="1" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="auction_id" class="form-label">
                Auction <span class="text-danger">*</span>
            </label>
            <select class="form-select" id="auction_id" name="auction_id">
                <?php while ($auction = $auctions->fetch_assoc()): ?>
                    <option value="<?= $auction["id"] ?>"><?= $auction["name"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-12">
            <button class="btn btn-secondary" type="submit">Submit</button>
        </div>
    </form>
</main>
<?php include_once "../layout/footer.php"; ?>
