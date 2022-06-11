<?php require_once "../../../config/index.php"?>
<?php
    $query = "SELECT o.id as o_id, u.name as user, p.name as product, address, status FROM orders o JOIN users u on u.id = o.user_id JOIN products p on p.id = o.product_id";
    $orders = $conn->query($query);
?>
<?php include_once "../layout/header.php"?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm" id="data-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Product</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php while($order = $orders->fetch_assoc()): ?>
                    <tr>
                        <td><?= $order["o_id"] ?></td>
                        <td><?= $order['user']; ?></td>
                        <td><?= $order['product']; ?></td>
                        <td><?= $order['address']; ?></td>
                        <td><?= $order['status']; ?></td>
                        <td class="d-flex flex-row gap-3">
                            <?php if ($order["status"] === "pending"): ?>
                                <a href="./edit.php?id=<?= $order["o_id"] ?>&status=delivered" title="Mark as delivered">
                                    <span data-feather="check-circle"></span>
                                </a>
                                <a href="./edit.php?id=<?= $order["o_id"] ?>&status=cancelled" title="Mark as cancelled">
                                    <span data-feather="check-circle"></span>
                                </a>
                            <?php endif; ?>
                            <a href="./delete.php?id=<?= $order['o_id']; ?>" title="Delete Order">
                                <span data-feather="delete"></span>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include_once "../layout/footer.php"?>
