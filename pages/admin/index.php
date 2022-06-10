<?php require_once "../../config/index.php"?>
<?php include_once "./layout/header.php"?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row mb-5">
        <div class="card col-lg-3 col-md-6 col-sm-12">
            <div class="card-body">
                <h5 class="card-title">
                    <span data-feather="users"></span> Customers
                </h5>
                <p class="card-text">0</p>
                <a href="customers/index.php" class="btn btn-primary">View Customers</a>
            </div>
        </div>
        <div class="card col-lg-3 col-md-6 col-sm-12">
            <div class="card-body">
                <h5 class="card-title">
                    <span data-feather="shopping-bag"></span> Orders
                </h5>
                <p class="card-text">0</p>
                <a href="./orders.html" class="btn btn-primary">View Orders</a>
            </div>
        </div>
        <div class="card col-lg-3 col-md-6 col-sm-12">
            <div class="card-body">
                <h5 class="card-title">
                    <span data-feather="clock"></span> Auctions
                </h5>
                <p class="card-text">0</p>
                <a href="customers/index.php" class="btn btn-primary">View Auctions</a>
            </div>
        </div>
        <div class="card col-lg-3 col-md-6 col-sm-12">
            <div class="card-body">
                <h5 class="card-title">
                    <span data-feather="shopping-cart"></span> Products
                </h5>
                <p class="card-text">0</p>
                <a href="auctions/index.php" class="btn btn-primary">View Products</a>
            </div>
        </div>
    </div>

    <h5>Latest Orders</h5>
    <div class="table-responsive">
        <table class="table table-striped table-sm" id="data-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Items</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</main>
<?php include_once "./layout/footer.php"?>
