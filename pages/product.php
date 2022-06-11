<?php
    require_once "../config/index.php";
    include_once "./layout/header.php";
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
          <div>Status: <span class="text-success">In stock</span></div>
          <div class="mt-3 d-flex flex-row align-items-center gap-2">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" value="1" min="1" step="1" class="form-control w-25" id="quantity">
          </div>
          <div class="mt-3">
            <a href="#" class="btn btn-brown">
              <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
            </a>
          </div>
          <p class="mt-3">Description of product...</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once "./layout/footer.php"; ?>