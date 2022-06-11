<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livestock Auction Platform</title>
  <link rel="icon" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header class="d-flex justify-content-between p-3 align-items-center">
  <img src="../assets/img/logo.png" alt="Logo" class="logo">
  <div class="categories-list d-none d-md-block">
    <div class="input-group">
      <input type="text" class="form-control border-brown" placeholder="Search livestock products...">
      <button class="btn btn-outline-brown">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </div>
  </div>
  <?php if (isset($_SESSION["user"])): ?>
      <a href="<?= page($_SESSION["user"]["role"] . "/index") ?>" class="btn btn-outline-brown p-sm-2 p-md-3">
          <i class="fa-solid fa-user"></i> <?= $_SESSION["user"]["name"] ?>
      </a>
  <?php else: ?>
      <button class="btn btn-outline-brown p-sm-2 p-md-3" data-bs-toggle="modal" data-bs-target="#auth-modal">
          <i class="fa-solid fa-user"></i> Login / Sign Up
      </button>
  <?php endif; ?>
</header>
<div class="categories-list d-sm-none p-3">
  <div class="input-group">
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
          <a class="nav-link active" aria-current="page" href="<?= page("index")?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= page("auctions")?>">Auctions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= page("contact-us")?>">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php include_once PROJECT_PATH . "/pages/auth/index.php"; ?>