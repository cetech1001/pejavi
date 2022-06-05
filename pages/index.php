<?php
    include 'auth/connect.php';

    $name = $email = $password = $conPassword = "";
    $nameErr = $emailErr = $passwordErr = $conPasswordErr = "";
    $loginEmail = $loginPassword = "";
    $errors = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_POST["signup"])){
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

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){
        $loginEmail = mysqli_real_escape_string($con, $_POST['email-login']);
        $loginPassword = mysqli_real_escape_string($con, $_POST['login-password']);

        $query = "SELECT * FROM users WHERE email='$loginEmail' AND password='$loginPassword'";
        $result = $con->query($query);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION["userid"] = $row['id'];
            }
            echo "Successful Login!";
        }else{
            echo "Something went wrong! Incorrect Password";
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
<?php include 'layouts/header.php'; ?>

<div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/img/slides/1.jpg" class="d-block img-slide w-100" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block">
        <h5>Pointers for Purchasing Stud Cattle</h5>
        <p class="text-wrap caption">Technical advisors will render valuable assistance to potential buyers who seek advice at National
          bull sales and sales held under the rules of the breeders’ society.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/slides/2.jpg" class="d-block img-slide w-100" alt="Slide 2">
      <div class="carousel-caption d-none d-md-block">
        <h5>Raising Cattle for profit</h5>
        <p class="text-wrap caption">For producers who are willing to adapt to the rapid changes and ups and downs that come in this industry,
          you can find the recipe for great success.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/slides/3.jpg" class="d-block img-slide w-100" alt="Slide 3">
      <div class="carousel-caption d-none d-md-block">
        <h5>Starting out in farming</h5>
        <p class="text-wrap caption">You’ve dreamt of becoming a successful farmer, and you’re prepared to venture into the
          ever-changing world of farming business.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#home-carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#home-carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container mt-3 p-3">
  <h2 class="text-center text-decoration-underline">LATEST LISTINGS</h2>
  <div class="row pt-3">
    <div class="col-md-3 mb-3">
      <div class="card shadow-lg product">
        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
        <div class="card-body">
          <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
          <p class="card-text"><strong>N$25,000.00</strong> / item</p>
          <p class="text-center">
            <span class="badge rounded-pill bg-dark">Cattle</span>
            <span class="badge rounded-pill bg-dark">Bull</span>
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-brown">
              <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
            </a>
            <a href="#" class="text-brown">
              <i class="fa-solid fa-eye"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card shadow-lg product">
        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
        <div class="card-body">
          <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
          <p class="card-text"><strong>N$25,000.00</strong> / item</p>
          <p class="text-center">
            <span class="badge rounded-pill bg-dark">Cattle</span>
            <span class="badge rounded-pill bg-dark">Bull</span>
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-brown">
              <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
            </a>
            <a href="#" class="text-brown">
              <i class="fa-solid fa-eye"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card shadow-lg product">
        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
        <div class="card-body">
          <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
          <p class="card-text"><strong>N$25,000.00</strong> / item</p>
          <p class="text-center">
            <span class="badge rounded-pill bg-dark">Cattle</span>
            <span class="badge rounded-pill bg-dark">Bull</span>
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-brown">
              <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
            </a>
            <a href="#" class="text-brown">
              <i class="fa-solid fa-eye"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card shadow-lg product">
        <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
        <div class="card-body">
          <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
          <p class="card-text"><strong>N$25,000.00</strong> / item</p>
          <p class="text-center">
            <span class="badge rounded-pill bg-dark">Cattle</span>
            <span class="badge rounded-pill bg-dark">Bull</span>
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-brown">
              <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
            </a>
            <a href="#" class="text-brown">
              <i class="fa-solid fa-eye"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p class="text-center mt-3 mb-3">
    <a href="#" class="text-brown p-3 text-decoration-none view-more-latest">
      See more <i class="fa-solid fa-arrow-right"></i>
    </a>
  </p>
</div>
<div class="container mt-3 p-3">
  <div class="row pt-3">
    <div class="col-md-4 mb-3">
      <div class="card bg-dark text-white h-100">
        <img src="../assets/img/category-samples/1.jpg" class="card-img opacity-25 h-100 w-100" alt="Category Sample">
        <div class="card-img-overlay d-flex flex-column justify-content-between align-items-center">
          <h2 class="card-title text-dark-brown text-decoration-underline">CHEAPEST LISTINGS</h2>
          <h5 class="card-text text-center">This is a compilation of the cheapest livestock listings.</h5>
          <p class="card-text mb-3">
            <a href="#" class="p-3 text-decoration-none view-more-cheapest">
              See more <i class="fa-solid fa-arrow-right"></i>
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card shadow-lg product">
            <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
            <div class="card-img-overlay d-flex flex-column justify-content-between">
              <div>
                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
              </div>
              <p>
                <span class="badge rounded-pill bg-dark">Cattle</span>
                <span class="badge rounded-pill bg-dark">Bull</span>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-brown">
                  <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                </a>
                <a href="#" class="text-brown">
                  <i class="fa-solid fa-eye"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card shadow-lg product">
            <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
            <div class="card-img-overlay d-flex flex-column justify-content-between">
              <div>
                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
              </div>
              <p>
                <span class="badge rounded-pill bg-dark">Cattle</span>
                <span class="badge rounded-pill bg-dark">Bull</span>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-brown">
                  <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                </a>
                <a href="#" class="text-brown">
                  <i class="fa-solid fa-eye"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card shadow-lg product">
            <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
            <div class="card-img-overlay d-flex flex-column justify-content-between">
              <div>
                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
              </div>
              <p>
                <span class="badge rounded-pill bg-dark">Cattle</span>
                <span class="badge rounded-pill bg-dark">Bull</span>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-brown">
                  <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                </a>
                <a href="#" class="text-brown">
                  <i class="fa-solid fa-eye"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card shadow-lg product">
            <img src="../assets/img/product-samples/cattle.jpg" class="card-img-top" alt="Cattle Product Sample">
            <div class="card-img-overlay d-flex flex-column justify-content-between">
              <div>
                <h5 class="card-title text-dark-brown">16 x Afrikaner Type Heifers</h5>
                <p class="card-text"><strong>N$25,000.00</strong> / item</p>
              </div>
              <p>
                <span class="badge rounded-pill bg-dark">Cattle</span>
                <span class="badge rounded-pill bg-dark">Bull</span>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-brown">
                  <i class="fa-solid fa-cart-arrow-down"></i> Add To Basket
                </a>
                <a href="#" class="text-brown">
                  <i class="fa-solid fa-eye"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'layouts/footer.php'; ?>