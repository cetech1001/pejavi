<?php include 'layout/header.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Customers</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                data-bs-toggle="modal" data-bs-target="#new-customer-modal">
                            <span data-feather="plus-circle" class="align-text-bottom"></span> New Customer
                        </button>
                    </div>
                </div>
            </div>
<?php
    include '../auth/connect.php';

    $select = "SELECT * FROM users";
    $query = mysqli_query($con, $select);
    $rows = mysqli_num_rows($query);

    $name = $email = $password = $conPassword = "";
    $nameErr = $emailErr = $passwordErr = $conPasswordErr = "";
    $errors = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_POST["new-customer"])){
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $conPassword = test_input($_POST['re-password']);

        if(empty($name)){
            echo $nameErr = "Field cannot be empty!";
            $errors++;
        }

        if(empty($email)){
            echo $emailErr = "Field cannot be empty!";
            $errors++;
        }else{
            $check = "SELECT * FROM users WHERE email='$email'";
            $outcome = mysqli_query($con, $check);
            if(mysqli_num_rows($outcome) > 0){
                echo "\n" . "Mail already Exist!";
                $errors++;
            }
        }

        if(empty($password)){
            echo $passwordErr = "Field cannot be empty!";
            $errors++;
        }

        if(empty($conPassword)){
            echo $conPasswordErr = "Field cannot be empty!";
            $errors++;
        }

        if($password !== $conPassword){
            echo $conPasswordErr = "Passwords do not match!!";
            $errors++;
        }else{
            $newPassword = $conPassword;
        }

        if(empty($errors)){
            $insert = "INSERT INTO users (`name`, `password`, email) VALUES ('$name', '$newPassword', '$email')";
            mysqli_query($con, $insert);

            echo "Successful Creating Account";
        }
        else{
            echo "<br>Something went wrong!";
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if($rows > 0){
                            $count = 1;
                            while($fetch = mysqli_fetch_assoc($query)){
                     ?>
                    <tr>
                        <td><?= $count++; ?></td>
                        <td><?= $fetch['name']; ?></td>
                        <td><?= $fetch['email']; ?></td>
                        <td><span class="badge badge-pill bg-success">Active</span></td>
                        <td class="d-flex flex-row gap-3">
                            <a href="edit.php?edit-customer=<?= $fetch['id']; ?>" class="text-dark" title="Edit customer"
                               data-bs-toggle="modal" data-bs-target="#edit-customer-modal">
                                <span data-feather="edit"></span>
                            </a>
                            <a href="#" class="text-dark" title="Change customer's password"
                               data-bs-toggle="modal" data-bs-target="#change-customer-password-modal">
                                <span data-feather="lock"></span>
                            </a>
                            <a href="#" class="text-dark" title="Suspend customer's account">
                                <span data-feather="x-circle"></span>
                            </a>
                            <a href="#" class="text-dark" title="Activate customer's account">
                                <span data-feather="check-circle"></span>
                            </a>
                            <a href="delete.php?delete=<?= $fetch['id']; ?>" class="text-dark" title="Delete customer's account"
                               data-bs-toggle="modal" data-bs-target="#delete-customer-modal">
                                <span data-feather="delete"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="../../../assets/js/dashboard.js"></script>

<div class="modal fade" id="new-customer-modal" tabindex="-1"
     aria-labelledby="new-customer-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                    <h4>New Customer</h4>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x-circle" class="align-text-bottom"></span>
                    </span>
                </div>
                <form class="row" action="" method="post">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">
                            Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">
                            Email address <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">
                            Password <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="re-password" class="form-label">
                            Re-type Password <span class="text-danger">*</span>
                        </label>
                        <input type="password" name="re-password" class="form-control" id="re-password" required>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-secondary" name="new-customer" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-customer-modal" tabindex="-1"
     aria-labelledby="edit-customer-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                    <h4>Edit Customer</h4>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x-circle" class="align-text-bottom"></span>
                    </span>
                </div>
                <form class="row" method="post" action="">
                    <div class="col-md-6 mb-3">
                        <label for="edit-name" class="form-label">
                            Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="edit-name" id="edit-name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit-email" class="form-label">
                            Email address <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" name="edit-email" id="edit-email" disabled required>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-secondary" name="edit-customer" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="change-customer-password-modal" tabindex="-1"
     aria-labelledby="change-customer-password-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                    <h4>Change Password</h4>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x-circle" class="align-text-bottom"></span>
                    </span>
                </div>
                <form class="row">
                    <div class="col-md-6 mb-3">
                        <label for="edit-password" class="form-label">
                            Password <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control" name="new-password" id="edit-password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit-re-password" class="form-label">
                            Re-type Password <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control" name="confirm-password" id="edit-re-password" required>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-secondary" name="change-password" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-customer-modal" tabindex="-1"
     aria-labelledby="delete-customer-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                    <h4>Delete Customer</h4>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x-circle" class="align-text-bottom"></span>
                    </span>
                </div>
                <form class="row">
                    <div class="col-md-12 mb-3">
                        Are you sure you want to delete John Doe's account?
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close">
                            No, Cancel
                        </button>
                        <button class="btn btn-danger" type="submit">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
