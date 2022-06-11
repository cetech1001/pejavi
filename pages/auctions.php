<?php require_once "../config/index.php";?>
<?php
    $query = "SELECT * FROM auctions";
    $auctions = $conn->query($query);
?>
<?php include_once "./layout/header.php"; ?>

<div class="container mt-3 p-3">
    <div class="row pt-3">
        <div class="col-md-12">
            <div class="row">
                <?php while ($auction = $auctions->fetch_assoc()): ?>
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-lg product">
                            <img src="data:image/jpeg;base64,<?= base64_encode($auction["image"]) ?>"
                                 class="card-img-top" alt="<?= $auction["name"] ?>">
                            <div class="card-body">
                                <h5 class="card-title text-dark-brown"><?= $auction["name"] ?></h5>
                                <p class="card-text">
                                    Starts at: <strong><?= $auction["start_time"] ?></strong>
                                    <br>
                                    Ends at: <strong><?= $auction["end_time"] ?></strong>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <?php if (is_auction_live($auction["start_time"], $auction["end_time"])): ?>
                                        <span class="badge rounded-pill bg-dark d-flex flex-row align-items-center">
                                            <span class="spinner-grow" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                            <span>Live</span>
                                        </span>
                                    <?php endif; ?>
                                    <a href="./auction-items.php?id=<?= $auction["id"] ?>" class="text-brown">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
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