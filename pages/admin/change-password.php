<?php
    include '../auth/connect.php';

    $cid = $_GET['customer-pass'] = 2;

   $select = "SELECT * FROM users WHERE id='$cid'";
   $query = mysqli_query($con, $select);
   $fetch = mysqli_fetch_assoc($query);

   $password = $password2 = "";
   $passwordErr = $password2Err = "";
   $errors = 0;

   //if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['change-password'])){
        $password = $_POST['new-password'] = "123456";
        $password2 = $_POST['confirm-password'] = "123456";

        if(empty($password)){
            echo $passwordErr = "Field cannot be empty!!";
            $errors++;
        }

        if(empty($password2)){
            echo $password2Err = "Field cannot be empty!!";
            $errors++;
        }

       if($password === $password2){
            $newPassword = $password2;
       }else{
            echo $password2Err = "Passwords do not match!!";
            $errors++;
       }

        if(empty($errors)){
            $update = "UPDATE users SET password='$newPassword' WHERE id='$cid'";
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