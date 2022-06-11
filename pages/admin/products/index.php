<?php require_once "../../../config/index.php"?>
<?php
    $query = "SELECT *, p.id as p_id, p.image as p_image, p.name as p_name, a.name as a_name FROM products p JOIN auctions a on a.id = p.auction_id";
    $products = $conn->query($query);
?>
<?php req("pages/admin/layout/header"); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="./add.php" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus-circle" class="align-text-bottom"></span> New Auction
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm" id="data-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Auction</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php while($product = $products->fetch_assoc()): ?>
                    <tr>
                        <td><?= $product["p_id"] ?></td>
                        <td><?= $product["p_name"]; ?></td>
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($product["p_image"]) ?>"
                                 alt="<?= $product["p_name"] ?>" style="width: 150px; height: 75px"></td>
                        <td><?= $product["quantity"]; ?></td>
                        <td><?= $product["price"]; ?></td>
                        <td><?= $product["a_name"]; ?></td>
                        <td class="d-flex flex-row gap-3">
                            <a href="./edit.php?id=<?= $product["p_id"] ?>" title="Edit Product">
                                <span data-feather="edit"></span>
                            </a>
                            <a href="./delete.php?id=<?= $product["p_id"]; ?>" title="Delete Product">
                                <span data-feather="delete"></span>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<?php req("pages/admin/layout/footer"); ?>
