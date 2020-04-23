<?php

include("php/connect.php"); // Using database connection file here
include("php/auth_session.php");

// if(isset($_GET['order_number'])){
//     $order_number = $_GET['order_number'];
//     echo $order_number;
//   } else {
//     echo "failed";
//   }
$order_number = $_GET['id'];

$query = "DELETE FROM `cus_order_product` WHERE `cus_order_product`.`order_number` ='". $order_number . "'";

$del = mysqli_query($conn, $query); // delete query

if($del)
 {
     mysqli_close($conn); // Close connection
      header("location:order_list.php"); // redirects to all records page
     exit;	
 }
 else
 {
    echo "Error deleting record"; // display error message if not delete
 }
?>