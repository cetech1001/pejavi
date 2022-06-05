 <?php
     include '../auth/connect.php';

     $get = $_GET['delete'];
     $sql = "DELETE FROM users WHERE id='$get'";

    if (mysqli_query($con, $sql)){
         echo "Record deleted successfully";
         header('location:customers.php');
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }

     mysqli_close($con);

