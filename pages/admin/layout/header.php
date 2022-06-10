<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Livestock Auction Management</title>
    <link rel="icon" href="<?= PUBLIC_PATH . "/assets/img/favicon.png" ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_PATH . "/assets/css/dashboard.css" ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">AgriBids</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="../../auth/logout.php">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebar-menu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= PUBLIC_PATH . "/pages/admin/index.php" ?>">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PUBLIC_PATH . "/pages/admin/orders/index.php" ?>">
                            <span data-feather="shopping-bag" class="align-text-bottom"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PUBLIC_PATH . "/pages/admin/customers/index.php" ?>">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PUBLIC_PATH . "/pages/admin/auctions/index.php" ?>">
                            <span data-feather="clock" class="align-text-bottom"></span>
                            Auctions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PUBLIC_PATH . "/pages/admin/products/index.php" ?>">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PUBLIC_PATH . "/pages/admin/account/index.php" ?>">
                            <span data-feather="user" class="align-text-bottom"></span>
                            Account
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
