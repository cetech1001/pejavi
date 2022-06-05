<?php
  require_once "../config/index.php";
  req("pages/layout/header");
?>

<div class="container mt-3 p-3">
    <div class="row pt-3">
        <div class="col-md-12 mb-3 order-xs-first">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="./shop.html">Shop</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="./shop.html?category=cattle">Cattle</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="./shop.html?category=cattle&category=bulls">Bulls</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">16 x Afrikaner Type Heifers</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <div id="gallery" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../assets/img/product-samples/cattle.jpg" class="d-block w-100"
                                     style="height: 300px" alt="Gallery Sample 1">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/gallery-samples/1.jpg" class="d-block w-100"
                                     style="height: 300px" alt="Gallery Sample 1">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/gallery-samples/2.jpg" class="d-block w-100"
                                     style="height: 300px" alt="Gallery Sample 2">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/gallery-samples/3.jpg" class="d-block w-100"
                                     style="height: 300px" alt="Gallery Sample 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#gallery" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#gallery" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-7">
                    <div>Starting bid: <strong>N$25,000.00 / item</strong></div>
                    <div>Current bid: <strong>N$35,000.00 / item</strong></div>
                    <form>
                        <div class="mt-3 d-flex flex-row align-items-center gap-2">
                            <label for="amount" class="form-label">Amount:</label>
                            <input type="number" value="1" min="1" step="1" class="form-control w-25" id="amount">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-brown">
                                <i class="fa-solid fa-money-bill"></i> Place Bid
                            </button>
                        </div>
                    </form>
                    <span class="btn btn-dark mt-5" id="live-auction-timer"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php req("pages/layout/footer"); ?>