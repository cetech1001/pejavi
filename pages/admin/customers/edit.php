<?php
    include '../auth/connect.php';

    $cid = $_GET['customer-edit'] = 2;

   $select = "SELECT * FROM users WHERE id='$cid'";
   $query = mysqli_query($con, $select);
   $fetch = mysqli_fetch_assoc($query);

   $name = $email = "";
   $nameErr = $emailErr = "";
   $errors = 0;

   //if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit-customer'])){
        $name = test_input(['edit-name']) = "Elen";
        $email = test_input($_POST['edit-email']) = "eleven@str.com";

        if(empty($name)){
            echo $nameErr = "Field cannot be empty!!";
            $errors++;
        }

        if(empty($email)){
            echo $emailErr = "Field cannot be empty!!";
            $errors++;
        }
        //else{
        //     $check = "SELECT * FROM users WHERE email='$email'";
        //     $cQuery = mysqli_query($con, $check);
        //     if(mysqli_num_rows($cQuery) > 0){
         //        echo $emailErr = "\n" . "Mail already Exist!";
         //        $errors++;
         //    }
       // }

        if(empty($errors)){
            $update = "UPDATE users SET name='$name', email='$email' WHERE id='$cid'";
            $uQuery = mysqli_query($con, $update);
            echo "Updated Successfully";
        }
        else{
            echo "\n Could not update";
        }
   //}

   function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }
?>