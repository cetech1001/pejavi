<?php
    session_start();
    include '../auth/connect.php';

//    if(!isset($_SESSION['userid'])){
//        header("location:../auth/index.php");
//    }

    $pid = $_GET['edit'];

    $name = $price = $quantity = $imageName = $imagetName = "";
    $nameErr = $priceErr = $quantityErr = $imageErr = "";
    $errors = 0;
    $clicked= 0;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $clicked = 1;
        $name = test_input($_POST['edit-name']);
        $price = test_input($_POST['edit-price']);
        $quantity = test_input($_POST['edit-quantity']);

        if(empty($name)){
            $nameErr = "Field cannot be empty!";
            $errors++;
        }

        if(empty($price)){
            $priceErr = "Field cannot be empty!";
            $errors++;
        }

        if(empty($quantity)){
            $quantityErr = "Field cannot be empty!";
            $errors++;
        }

        if(empty($errors)){
            $update = "UPDATE products SET full_name='$name', price='$price', quantity='$quantity' WHERE id='$pid'";
            $query = mysqli_query($con, $update);
            echo $Success = "Updated Successfully!";
            $errors = 0;
        }else{
           echo $errMessage = "Unexpected Error, Couldn't Save";
        }

    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>