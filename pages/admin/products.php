
    <?php include "layout/header.php"; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#new-product-modal">
                            <span data-feather="plus-circle" class="align-text-bottom"></span> New Product
                        </button>
                    </div>
                </div>
            </div>
<?php
    include '../auth/connect.php';

    $name = $price = $quantity = $imageName = $imagetName = "";
    $nameErr = $priceErr = $quantityErr = $imageErr = "";
    $errors = 0;


    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["new-product"])){
        $name = test_input($_POST['new-name']);
        $price = test_input($_POST['new-price']);
        $quantity = test_input($_POST['new-quantity']);

        if(empty($name)){
            $nameErr = "Field cannot be empty!";
            $errors++;
        }

        if(empty($quantity)){
            $quantityErr = "Field cannot be empty!";
            $errors++;
        }

        if(empty($price)){
            $priceErr = "Field cannot be empty!";
            $errors++;
        }

        $imageName = $_FILES["new-image"]["name"];
        $imagetName = $_FILES["new-image"]["tmp_name"];
        $imageFolder = "../../uploads/".$imageName;
        $imageFileType = strtolower(pathinfo($imageFolder, PATHINFO_EXTENSION));

        if (file_exists($imageFolder)) {
          $imageErr = "Sorry, image already exists.";
          $errors++;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $imageErr = "Sorry, only JPG, JPEG, & PNG files are allowed.";
            $errors++;
        }

         if(empty($errors)){
            $insert = "INSERT INTO products (`name`, `image`, quantity, price) VALUES ('$name', '$imageName', '$quantity', '$price')";
            mysqli_query($con, $insert);

            if (move_uploaded_file($imagetName, $imageFolder)) {
                echo $imgSuccess = "Image uploaded successfully";
            }
            else{
                echo $imageErr = "Failed to upload image";
            }

        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $select = "SELECT * FROM products";
    $query = mysqli_query($con, $select);
    $rows = mysqli_num_rows($query);


?>
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($rows > 0){
                            $c = 0;
                            while($fetch = mysqli_fetch_assoc($query)){
                     ?>
                    <tr>
                        <td><?= $c++ ?></td>
                        <td><?= $fetch['name']; ?></td>
                        <td>$<?= $fetch['price']; ?></td>
                        <td><?= $fetch['quantity']; ?></td>
                        <td class="d-flex flex-row gap-3">
                            <a href="#" title="View product" data-bs-toggle="modal"
                               data-bs-target="#view-product-images-modal">
                                <span data-feather="image"></span>
                            </a>
                            <a href="#" title="View product" data-bs-toggle="modal"
                               data-bs-target="#edit-product-modal">
                                <span data-feather="edit"></span>
                            </a>
                            <a href="#?item=<?= $fetch['id']; ?>" title="View product" data-bs-toggle="modal"
                               data-bs-target="#delete-product-modal">
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
<script src="../../assets/js/dashboard.js"></script>

<div class="modal fade" id="new-product-modal" tabindex="-1"
     aria-labelledby="new-product-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h4>New Product</h4>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x-circle" class="align-text-bottom"></span>
                    </span>
                </div>
                <hr/>
                <form class="row" action="#" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">
                            Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="new-name" id="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">
                            Price <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" name="new-price" id="price" step="0.01" min="0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label">
                            Quantity <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" name="new-quantity" id="quantity" step="1" min="1" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">
                            Image <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="file" name="new-image" id="image" accept="image/*" required>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-secondary" name="new-product" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-product-modal" tabindex="-1"
     aria-labelledby="edit-product-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                    <h4>Edit Product</h4>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x-circle" class="align-text-bottom"></span>
                    </span>
                </div>
                <hr/>
                <form class="row" enctype="multipart/form-data">
                    <div class="col-md-6 mb-3">
                        <label for="edit-name" class="form-label">
                            Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="edit-name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit-price" class="form-label">
                            Price <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="edit-price" step="0.01" min="0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit-quantity" class="form-label">
                            Quantity <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="edit-quantity" step="1" min="1" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit-image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="edit-image" accept="image/*">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-product-modal" tabindex="-1"
     aria-labelledby="delete-product-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                    <h4>Delete Product</h4>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x-circle" class="align-text-bottom"></span>
                    </span>
                </div>
                <hr/>
                <form class="row">
                    <div class="col-md-12 mb-3">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close">
                            No, Cancel
                        </button>
                        <a href="delete-products.php?item"><button class="btn btn-danger" type="submit">Yes, Delete</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view-product-images-modal" tabindex="-1"
     aria-labelledby="view-product-images-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                    <h4>View Product Images</h4>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x-circle" class="align-text-bottom"></span>
                    </span>
                </div>
                <hr/>
                <form class="row">
                    <div class="col-md-12 mb-3">
                        <h5>Product image</h5>
                        <div style="height: 200px">
                            <img src="../../assets/img/product-samples/cattle.jpg"
                                 style="width: 100%; height: 100%" class="rounded" alt="Product sample">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <h5>Product Gallery</h5>
                            <div class="col-md-4 mb-1 card border-0" style="max-height: 200px">
                                <img src="../../assets/img/gallery-samples/1.jpg"
                                     style="width: 100%; height: 100%; opacity: 0.5" class="rounded" alt="Gallery sample 1">
                                <div class="card-img-overlay text-center d-flex flex-row justify-content-center align-items-center">
                                    <a href="#" class="text-danger">
                                        <span data-feather="x-circle"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-1 card border-0" style="max-height: 200px">
                                <img src="../../assets/img/gallery-samples/2.jpg"
                                     style="width: 100%; height: 100%; opacity: 0.5" class="rounded" alt="Gallery sample 2">
                                <div class="card-img-overlay text-center d-flex flex-row justify-content-center align-items-center">
                                    <a href="#" class="text-danger">
                                        <span data-feather="x-circle"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-1 card border-0" style="max-height: 200px">
                                <img src="../../assets/img/gallery-samples/3.jpg"
                                     style="width: 100%; height: 100%; opacity: 0.5" class="rounded" alt="Gallery sample 3">
                                <div class="card-img-overlay text-center d-flex flex-row justify-content-center align-items-center">
                                    <a href="#" class="text-danger">
                                        <span data-feather="x-circle"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form class="row">
                            <h5>Add Gallery Image</h5>
                            <div class="col-md-12 mb-3">
                                <label for="gallery-image" class="form-label">
                                    Image <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="" type="file" id="gallery-image" accept="image/*" required>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-secondary" name="" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
