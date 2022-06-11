<?php require_once "../../../config/index.php"?>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize($_POST["name"]);
        $email = sanitize($_POST["email"]);
        $password = sanitize($_POST["password"]);

        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();

        $_SESSION["success"] = "User created successfully";
        header("location: ./index.php");
        exit();
    }
?>

<?php include_once "../layout/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New User</h1>
    </div>
    <form class="row" action="#" method="post" enctype="multipart/form-data">
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
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">
                Password <span class="text-danger">*</span>
            </label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="col-md-12">
            <button class="btn btn-secondary" type="submit">Submit</button>
        </div>
    </form>
</main>
<?php include_once "../layout/footer.php"; ?>
