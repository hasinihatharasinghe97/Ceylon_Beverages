<?php

include('includes/connection.php');
include('includes/session.php');

    $customerID=$_POST['customerID'];
    $vendorID=$_POST['vendorID'];
    $productID=$_POST['productID'];
    $productName=$_POST['productName'];
    $unitPrice=$_POST['unitPrice'];
    $units=$_POST['units'];
    $total=$_POST['total'];

    $insertOrderQuery= "INSERT INTO orders (customerID, vendorID, productID, productName, unitPrice, units, total) VALUES ('$customerID','$vendorID', '$productID', '$productName', '$unitPrice', '$units', '$total')";

    if(mysqli_query ($connection, $insertOrderQuery)){
        $message = base64_encode(urlencode("Order Submitted Successfully"));
        header('Location:customer-order-view.php?msg=' . $message);
        exit();
    }
    else{
        $message = base64_encode(urlencode("Order Failed to Submit"));
        header('Location:customer-order-view.php?msg=' . $message);
        exit();
    }




mysqli_close($connection);
    
    
?>