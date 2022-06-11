<?php require_once "../../../config/index.php"?>
<?php
    $query = "SELECT * FROM users WHERE role = 'user'";
    $users = $conn->query($query);
?>
<?php include_once "../layout/header.php"?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="./add.php" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus-circle" class="align-text-bottom"></span> New User
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm" id="data-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php while($user = $users->fetch_assoc()): ?>
                    <tr>
                        <td><?= $user["id"] ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td class="d-flex flex-row gap-3">
                            <a href="./edit.php?id=<?= $user["id"] ?>" title="Edit User">
                                <span data-feather="edit"></span>
                            </a>
                            <a href="./delete.php?id=<?= $user['id']; ?>" title="Delete User">
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
