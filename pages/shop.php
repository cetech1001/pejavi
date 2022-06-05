<?php
  require_once "../config/index.php";
  req("pages/layout/header");
?>

<div class="container mt-3 p-3">
    <div class="row pt-3">
        <?php req("pages/layout/filters/category") ?>
        <div class="col-md-9">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= page("shop") ?>">Shop</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= page("shop", "category=cattle") ?>">Cattle</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Bulls</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 mb-3 mb-md-5">
                    <div class="card shadow-lg product">
                        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
                        <div class="card-img-overlay d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
                            </div>
                            <p>
                                <span class="badge rounded-pill bg-dark">Cattle</span>
                                <span class="badge rounded-pill bg-dark">Bull</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-brown">
                                    <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                                </a>
                                <a href="<?= page("product") ?>" class="text-dark-brown">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-3 mb-md-5">
                    <div class="card shadow-lg product">
                        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
                        <div class="card-img-overlay d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
                            </div>
                            <p>
                                <span class="badge rounded-pill bg-dark">Cattle</span>
                                <span class="badge rounded-pill bg-dark">Bull</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-brown">
                                    <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                                </a>
                                <a href="<?= page("product") ?>" class="text-dark-brown">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-3 mb-md-5">
                    <div class="card shadow-lg product">
                        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
                        <div class="card-img-overlay d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
                            </div>
                            <p>
                                <span class="badge rounded-pill bg-dark">Cattle</span>
                                <span class="badge rounded-pill bg-dark">Bull</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-brown">
                                    <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                                </a>
                                <a href="<?= page("product") ?>" class="text-dark-brown">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-3 mb-md-5">
                    <div class="card shadow-lg product">
                        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
                        <div class="card-img-overlay d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
                            </div>
                            <p>
                                <span class="badge rounded-pill bg-dark">Cattle</span>
                                <span class="badge rounded-pill bg-dark">Bull</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-brown">
                                    <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                                </a>
                                <a href="<?= page("product") ?>" class="text-dark-brown">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-3 mb-md-5">
                    <div class="card shadow-lg product">
                        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
                        <div class="card-img-overlay d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
                            </div>
                            <p>
                                <span class="badge rounded-pill bg-dark">Cattle</span>
                                <span class="badge rounded-pill bg-dark">Bull</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-brown">
                                    <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                                </a>
                                <a href="<?= page("product") ?>" class="text-dark-brown">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-3 mb-md-5">
                    <div class="card shadow-lg product">
                        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
                        <div class="card-img-overlay d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
                            </div>
                            <p>
                                <span class="badge rounded-pill bg-dark">Cattle</span>
                                <span class="badge rounded-pill bg-dark">Bull</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-brown">
                                    <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                                </a>
                                <a href="<?= page("product") ?>" class="text-dark-brown">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php req("pages/layout/footer"); ?>