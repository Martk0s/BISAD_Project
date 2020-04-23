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

$quantity = "SELECT count(`order_id`) FROM `cus_order_product` WHERE `order_id`= ". $_SESSION["order_id"];
$result = mysqli_query($conn, $quantity) or die(mysqli_error());
while($row = mysqli_fetch_array($result)) {
    foreach ($row as $total){
        $_SESSION['total_quantity'] = $total;// get total item(s) in cart
    }
}

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