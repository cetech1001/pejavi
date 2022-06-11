<?php
  require_once "../config/index.php";
  include_once "./layout/header.php";
?>

<div class="container mt-3 p-3">
    <div class="row pt-3 justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="./shop.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
            <form class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="text" class="form-control" id="phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="subject" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="message" rows="3" required></textarea>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-outline-brown" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "./layout/footer.php"; ?>