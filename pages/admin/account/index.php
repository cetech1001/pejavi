<?php require_once "../../../config/index.php"?>
<?php
    $user = $_SESSION["user"];

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $type = $conn->escape_string($_POST["type"]);

        if ($type === "profile") {
            $name = $conn->escape_string($_POST['name']);
            $email = $conn->escape_string($_POST['email']);

            if ($email !== $user["email"]) {
                $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
                $result = $conn->query($query);
                if ($result->num_rows === 1) {
                    $_SESSION["error"] = "Email address is already in use";
                    header("location: " . $_SERVER["PHP_SELF"]);
                    exit();
                }
            }

            $query = "UPDATE users SET name = '$name', email = '$email' WHERE id = '{$user["id"]}'";
            $conn->query($query);
            $_SESSION["user"]["name"] = $name;
            $_SESSION["user"]["email"] = $email;
        } else {
            $password = $conn->escape_string($_POST['password']);
            $re_password = $conn->escape_string($_POST['re_password']);

            if($password !== $re_password){
                $_SESSION["error"] = "Passwords do not match";
                header("location: " . $_SERVER["PHP_SELF"]);
                exit();
            }

            $query = "UPDATE users SET password='$password' WHERE id='{$user["id"]}'";
            $conn->query($query);
        }
        $_SESSION["success"] = "Account updated successfully";
        header("location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
?>
<?php include_once "../layout/header.php"?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Account</h1>
    </div>

    <div class="row">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="col-md-6 mb-3">
            <h5>Edit Profile</h5>
            <input type="hidden" name="type" value="profile">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user["name"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user["email"] ?>" required>
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="col-md-6">
            <h5>Change Password</h5>
            <input type="hidden" name="type" value="password">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="re-password" class="form-label">Re-type Password</label>
                <input type="password" class="form-control" id="re-password" name="re_password" required>
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
    </div>
</main>
<?php include_once "../layout/footer.php"?>

