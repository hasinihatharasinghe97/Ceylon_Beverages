<?php 
    include('includes/connection.php');
    include('includes/session.php');
?>

<?php
	//Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['usertype']) || $_SESSION['usertype'] != 'c'){
       $message = base64_encode(urlencode("Please Login"));
       header('Location:login.php?msg=' . $message);
       exit();
       }
?>

<!DOCTYPE html>
<html>
    
<head>
    <title>Order Confirmation | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
    
    <div class="row-100"> 
        <h1>Order Confirmation</h1>
    </div>
 


<?php

    $productID = $_POST['productID'];
    $units = $_POST['units'];
    

            $productQuery= "SELECT * FROM products WHERE productID = '$productID' ";
            $productResult = mysqli_query ($connection, $productQuery);

                echo "<table class=\"user\">
                        <tr>		
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Volume</th>
                            <th>Image</th>
                            <th>Vendor ID</th>
                            <th>Price</th>
                            <th>Units</th>
                            <th>Total</th>
                        </tr>
                    ";

                while($row = mysqli_fetch_assoc($productResult)){

                    $priceString = $row['price'];
                    preg_match_all('!\d+!', $priceString, $priceIntTemp);
                    $priceInt = $priceIntTemp[0][0];

                    $total = $priceInt*$units;

                    echo "

                    <tr>
                        <td>".$row['productID']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['volume']."</td>
                        <td><img src=\"images/products/{$row['imageName']}\" height=\"150px\"\ width=\"75px\"\"></td>
                        <td>".$row['vendorID']."</td>
                        <td>".$priceInt."</td>
                        <td>".$units."</td>
                        <td>".$total."</td>
                        <tr>
                            <td colspan=\"8\">
                                <form action =\"product-buy-submit.php\" method=\"post\" >
                                    <input type=\"hidden\" value=" .$_SESSION['userID']. " name=\"customerID\">
                                    <input type=\"hidden\" value=" .$row['vendorID']. " name=\"vendorID\">
                                    <input type=\"hidden\" value=" .$row['productID']. " name=\"productID\">
                                    <input type=\"hidden\" value=" .$row['name']. " name=\"productName\">
                                    <input type=\"hidden\" value=" .$priceInt. " name=\"unitPrice\">
                                    <input type=\"hidden\" value=" .$units. " name=\"units\">
                                    <input type=\"hidden\" value=" .$total. " name=\"total\">
                                    <input class=\"form-button\" type=\"submit\" name=\"submit\" value=\"Confirm Order\">
                                </form>
                            </td>
                        </tr>
                    </tr>

                    ";

                }	
                echo "</table>";
        
    
    
        


mysqli_close($connection);
    
    
?>
    
    </body>
    
</html>