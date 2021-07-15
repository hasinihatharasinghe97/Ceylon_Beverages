<?php include('includes/connection.php') ?>
<!DOCTYPE html>
<html>
    
<head>
    <title>Products | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <style>
            .navigation .products-active {
                background-color: #4CAF50;
            }
        
            .navigation li a:hover:not(.products-active) {/* Current colour does not change when hover */
                background-color: #111;
            }
    </style>
</head>
    
<body>

    <?php include('includes/header.php') ?>
    
    <div class="row-100 div-c bg-green"> 
        <h1>Products</h1>
    </div>
    
    <div class="row-100"><h2 class="error-msg"><?php include_once('includes/message.php'); ?></h2></div>
    
    <!-- Fetching Products PHP -->
    <?php
    
    $retrieveProduct = 'SELECT * FROM products'; //Selecting all data from Table
    $resultProduct = mysqli_query($connection, $retrieveProduct); //Passing SQL

    ?>
    <!-- End of Fetching Products PHP -->
        
    <div class="row-100">
        
        <?php
        while($rowProduct  = mysqli_fetch_assoc($resultProduct)){
            
                echo "
                   <div class=\"row-25 product-box\">
                   
                        <h2 align=\"center\">" . $rowProduct['name'] . ' ' . $rowProduct['volume'] . "</h2>
                        
                        <p align=\"center\">
                            <img src=\"images/products/{$rowProduct['imageName']}\" height=\"300px\"\ width=\"200px\"\">
                        </p>
                        
                        <h2 align=\"center\">" . $rowProduct['price'] . "</h2>";
                        
                        //Retrieving Vendors Name From VendorID
                        $IDretrieve = $rowProduct['vendorID'];
                        $retrieveVendorName = "SELECT U.name FROM users U,products P WHERE U.userID=P.vendorID AND '$IDretrieve'=U.userID"; //Selecting particular Vendor
                        $resultVendorName = mysqli_query($connection, $retrieveVendorName); //Passing SQL
                        $rowVendorName  = mysqli_fetch_assoc($resultVendorName);
                        echo "<h3 align=\"center\">" . $rowVendorName['name'] . "</h3>";
                            
                        //Buy Button
                        $productID = $rowProduct['productID'];
                        echo "<form action =\"product-buy.php\" name=\"del_submit\" method=\"post\" >
                                <input type=\"number\" placeholder=\"number of units\" name=\"units\" min=\"1\">
                                <input type=\"hidden\" value=" .$productID. " name=\"productID\">
                                <input class=\"form-button\" type=\"submit\" name=\"submit\" value=\"Buy now\">
                            </form>
                        
                   </div>"
                   ;
            
        }
        ?>
        
    </div>
    
    <?php include('includes/footer.php') ?>

</body>
    
</html>