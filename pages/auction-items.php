<?php require_once "../config/index.php";?>
<?php
    if (!isset($_GET["id"])) {
        $_SESSION["error"] = "Please provide auction ID";
        redirect("./auctions.php");
    }
    $id = $_GET["id"];
    $query = "SELECT * FROM products WHERE auction_id = '$id'";
    $products = $conn->query($query);
?>
<?php include_once "./layout/header.php"; ?>

<div class="container mt-3 p-3">
    <div class="row pt-3">
        <div class="col-md-12">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= page("auctions") ?>">Auctions</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Bulls</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <?php while ($product = $products->fetch_assoc()): ?>
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-lg product">
                            <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
                            <div class="card-body">
                                <h5 class="card-title text-dark-brown"><?= $product["name"] ?></h5>
                                <p class="card-text">
                                    Price: <strong>N$<?= $product["price"] ?></strong>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                <span class="badge rounded-pill bg-dark d-flex flex-row align-items-center">
                                    <span class="spinner-grow" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </span>
                                    <span>Live</span>
                                </span>
                                    <a href="<?= page("live-auction") ?>" class="text-brown"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php include_once "./layout/footer.php"; ?>