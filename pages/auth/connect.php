<?php
$con = mysqli_connect('localhost','root','','livestock_auction');
if($con==TRUE)
	//echo "Success DB";
if ($con->connect_error) {
    die("Error: " . mysqli_connect_error());
}
?>