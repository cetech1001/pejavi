<?php require_once "../../../config/index.php"?>
<?php
    if (!isset($_GET["id"])) {
        $_SESSION["error"] = "Please provide an user ID";
        redirect("./index.php");
    }

    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize($_POST["name"]);
        $email = sanitize($_POST["email"]);

        $types = "ss";
        $args = [$name, $email];
        $query = "UPDATE users SET name = ?, email = ?";

        if (!empty($_POST["password"])) {
            $password = sanitize($_POST["password"]);
            $types .= "s";
            $args[] = $password;
            $query .= ", password = ?";
        }

        $query .= " WHERE id = '$id'";

        $stmt = $conn->prepare($query);
        $stmt->bind_param($types, ...$args);
        $stmt->execute();

        $_SESSION["success"] = "Auction updated successfully";
        redirect("./index.php");
    }

    $query = "SELECT * FROM users WHERE id = '$id' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows === 0) {
        $_SESSION["error"] = "Please provide a valid user ID";
        redirect("./index.php");
    }

    $user = $result->fetch_assoc();
?>
<?php include_once "../layout/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>
    <form class="row" action="<?= $_SERVER["PHP_SELF"] ?>?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">
                Name <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $user["name"] ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">
                Email address <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $user["email"] ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="col-md-12">
            <button class="btn btn-secondary" type="submit">Submit</button>
        </div>
    </form>
</main>
<?php include_once "../layout/footer.php"; ?>
