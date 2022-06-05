<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Auction | Livestock Auction Platform</title>
    <link rel="icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/shop.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header class="d-flex justify-content-between p-3 align-items-center">
    <img src="../assets/img/logo.png" alt="Logo" class="logo">
    <div class="categories-list d-none d-md-block">
        <div class="input-group">
            <button class="btn btn-outline-brown dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Categories</button>
            <ul class="dropdown-menu">
                <li class="category"><a class="dropdown-item" href="./shop.html">Cattle (13)</a></li>
                <li class="sub-category"><a class="dropdown-item" href="./shop.html">Bulls (1)</a></li>
                <li class="sub-category"><a class="dropdown-item" href="./shop.html">Cows (1)</a></li>
                <li class="sub-category"><a class="dropdown-item" href="./shop.html">Heifers (11)</a></li>
                <li class="category"><a class="dropdown-item" href="./shop.html">Goats (6)</a></li>
                <li class="sub-category"><a class="dropdown-item" href="./shop.html">Rams (1)</a></li>
                <li class="category"><a class="dropdown-item" href="./shop.html">Sheep (7)</a></li>
                <li class="sub-category"><a class="dropdown-item" href="./shop.html">Ewes (5)</a></li>
                <li class="sub-category"><a class="dropdown-item" href="./shop.html">Lambs (2)</a></li>
            </ul>
            <input type="text" class="form-control border-brown" placeholder="Search livestock products...">
            <button class="btn btn-outline-brown">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
    <button class="btn btn-outline-brown p-sm-2 p-md-3" data-bs-toggle="modal" data-bs-target="#auth-modal">
        <i class="fa-solid fa-user"></i> Login / Sign Up
    </button>
</header>
<div class="categories-list d-sm-none p-3">
    <div class="input-group">
        <button class="btn btn-outline-brown dropdown-toggle" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">Categories</button>
        <ul class="dropdown-menu">
            <li class="category"><a class="dropdown-item" href="./shop.html">Cattle (13)</a></li>
            <li class="sub-category"><a class="dropdown-item" href="./shop.html">Bulls (1)</a></li>
            <li class="sub-category"><a class="dropdown-item" href="./shop.html">Cows (1)</a></li>
            <li class="sub-category"><a class="dropdown-item" href="./shop.html">Heifers (11)</a></li>
            <li class="category"><a class="dropdown-item" href="./shop.html">Goats (6)</a></li>
            <li class="sub-category"><a class="dropdown-item" href="./shop.html">Rams (1)</a></li>
            <li class="category"><a class="dropdown-item" href="./shop.html">Sheep (7)</a></li>
            <li class="sub-category"><a class="dropdown-item" href="./shop.html">Ewes (5)</a></li>
            <li class="sub-category"><a class="dropdown-item" href="./shop.html">Lambs (2)</a></li>
        </ul>
        <input type="text" class="form-control border-brown" placeholder="Search livestock products...">
        <button class="btn btn-outline-brown">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand d-sm-none text-white" href="#">MENU</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="categories" data-bs-toggle="dropdown" href="#" role="button"
                       aria-expanded="false">Categories</a>
                    <ul class="dropdown-menu" aria-labelledby="categories">
                        <li class="category"><a class="dropdown-item" href="./shop.html">Cattle (13)</a></li>
                        <li class="sub-category"><a class="dropdown-item" href="./shop.html">Bulls (1)</a></li>
                        <li class="sub-category"><a class="dropdown-item" href="./shop.html">Cows (1)</a></li>
                        <li class="sub-category"><a class="dropdown-item" href="./shop.html">Heifers (11)</a></li>
                        <li class="category"><a class="dropdown-item" href="./shop.html">Goats (6)</a></li>
                        <li class="sub-category"><a class="dropdown-item" href="./shop.html">Rams (1)</a></li>
                        <li class="category"><a class="dropdown-item" href="./shop.html">Sheep (7)</a></li>
                        <li class="sub-category"><a class="dropdown-item" href="./shop.html">Ewes (5)</a></li>
                        <li class="sub-category"><a class="dropdown-item" href="./shop.html">Lambs (2)</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./shop.html">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./auctions.html">Auctions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact-us.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
<footer class="container-fluid bg-dark-brown text-white text-center p-5">
    Copyright &copy; AgriBids <span id="copyright-year"></span>
</footer>

<div class="modal fade" id="auth-modal" tabindex="-1" aria-labelledby="auth-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-brown active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#login-tab-pane" type="button" role="tab"
                                    aria-controls="login-tab-pane" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-brown" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#register-tab-pane" type="button" role="tab"
                                    aria-controls="register-tab-pane" aria-selected="false">Sign Up</button>
                        </li>
                    </ul>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-circle-xmark text-brown"></i>
                    </span>
                </div>
                <div class="tab-content px-3 my-3" id="auth-tab">
                    <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel"
                         aria-labelledby="login-tab" tabindex="0">
                        <h5>Login</h5>
                        <form class="row">
                            <div class="col-md-12 mb-3">
                                <label for="login-email" class="form-label">
                                    Email address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="login-email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="login-password" class="form-label">
                                    Password <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" id="login-password" required>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-outline-brown" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register-tab-pane" role="tabpanel"
                         aria-labelledby="register-tab" tabindex="0">
                        <h5>Sign Up</h5>
                        <form class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">
                                    Email address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">
                                    Password <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="re-password" class="form-label">
                                    Re-type Password <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" id="re-password" required>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-outline-brown" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/scripts.js"></script>
</body>
</html>