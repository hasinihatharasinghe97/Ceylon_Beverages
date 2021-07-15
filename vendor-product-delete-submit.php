<?php

include('includes/connection.php');
include('includes/session.php');

    $id=$_POST['jobid'];

    $delQuery= "DELETE FROM products WHERE productID = '$id' ";

    $delResult = mysqli_query ($connection, $delQuery);
    header('Location:vendor-product-view.php');


mysqli_close($connection);
    
    
?>