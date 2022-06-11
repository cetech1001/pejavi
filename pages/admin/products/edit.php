<?php require_once "../../../config/index.php"?>
<?php
    if (!isset($_GET["id"])) {
        $_SESSION["error"] = "Please provide an product ID";
        redirect("./index.php");
    }

    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize($_POST["name"]);
        $price = sanitize($_POST["price"]);
        $quantity = sanitize($_POST["quantity"]);
        $auction_id = sanitize($_POST["auction_id"]);

        $query = "UPDATE products SET name = ?, price = ?, quantity = ?, auction_id = ?";
        $types = "sdii";
        $args = [$name, $price, $quantity, $auction_id];

        if (!empty($_FILES["image"]["tmp_name"])) {
            $image = file_get_contents($_FILES["image"]["tmp_name"]);
            $query .= ", image = ?";
            $types .= "s";
            $args[] = $image;
        }

        $query .= " WHERE id = '$id'";

        $stmt = $conn->prepare($query);
        $stmt->bind_param($types, ...$args);
        $stmt->execute();

        $_SESSION["success"] = "Product updated successfully";
        redirect("./index.php");
    }

    $query = "SELECT * FROM products WHERE id = '$id' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows === 0) {
        $_SESSION["error"] = "Please provide a valid product ID";
        redirect("./index.php");
    }

    $product = $result->fetch_assoc();

    $query = "SELECT * FROM auctions";
    $auctions = $conn->query($query);
?>
<?php include_once "../layout/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Product</h1>
    </div>
    <form class="row" action="<?= $_SERVER["PHP_SELF"] ?>?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">
                Name <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="name" value="<?= $product["name"] ?>" id="name" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*">
        </div>
        <div class="col-md-6 mb-3">
            <label for="price" class="form-label">
                Price <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="price" id="price" step="0.01" min="1"
                   value="<?= $product["price"] ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="quantity" class="form-label">
                Quantity <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="quantity" id="quantity" step="1" min="1"
                   value="<?= $product["quantity"] ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="auction_id" class="form-label">
                Auction <span class="text-danger">*</span>
            </label>
            <select class="form-select" id="auction_id" name="auction_id">
                <?php while ($auction = $auctions->fetch_assoc()): ?>
                    <option <?= $auction["id"] === $product["auction_id"] ? "selected" : "" ?>
                            value="<?= $auction["id"] ?>"><?= $auction["name"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-12">
            <button class="btn btn-secondary" type="submit">Submit</button>
        </div>
    </form>
</main>
<?php include_once "../layout/footer.php"; ?>
