<?php include('includes/connection.php') ?>
<?php include('includes/session.php') ?>

<?php
	//Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['usertype']) || $_SESSION['usertype'] != 'v'){
       $message = base64_encode(urlencode("Please Login"));
       header('Location:login.php?msg=' . $message);
       exit();
       }
?>

<!DOCTYPE html>
<html>
    
<head>
    <title>View Products | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
    
     <div class="row-25 bg-grey"> 
        <h1 class="div-c">View Products</h1>
    </div>
    <div class="row-75 bg-grey">
        <div class="row-100 navigation">
             <ul class="right-nav bg-green">
                      <li><a href="vendor-product-view.php" class="bg-green" >View Products</a></li>
                      <li><a href="vendor-product-add.php" class="bg-green" >Add Products</a></li>
                      <li><a href="vendor-product-delete.php" class="bg-green" >Delete Products</a></li>
                </ul>
        </div>
    </div>
    
            
    <div class="row-100">

    
        <?php
        $userID = $_SESSION["userID"];
        $retrieve = "SELECT * FROM products WHERE vendorID='$userID';";

        //Selecting all data from Table     
        $result = mysqli_query($connection,$retrieve);//Passing SQL
        //print_r($result);

        echo "<table class=\"user\">
            	<tr>		
                <th>Product ID</th>
                <th>Name</th>
                <th>Volume</th>
                <th>Image</th>
                <th>Vendor ID</th>
                <th>Price</th>
                </tr>
            ";

        while($row = mysqli_fetch_assoc($result)){

            echo "
            
            <tr>
                <td>".$row['productID']."</td>
                <td>".$row['name']."</td>
                <td>".$row['volume']."</td>
                <td><img src=\"images/products/{$row['imageName']}\" height=\"150px\"\ width=\"75px\"\"></td>
                <td>".$row['vendorID']."</td>
                <td>".$row['price']."</td>
            </tr>
            
            ";

        }	
        echo "</table>";

    ?>     
        
        
    </div> 
    
</body>
    
</html>