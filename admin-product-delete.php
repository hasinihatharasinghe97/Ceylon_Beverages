<?php include('includes/connection.php') ?>
<?php include('includes/session.php') ?>

<?php
	//Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['usertype']) || $_SESSION['usertype'] != 'a'){
       $message = base64_encode(urlencode("Please Login"));
       header('Location:login.php?msg=' . $message);
       exit();
       }

?>

<!DOCTYPE html>
<html>
    
<head>
    <title>Delete Products | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
    
    <hr>
    <div class="row-25 bg-grey"> 
        <h1 class="div-c">Delete Products</h1>
    </div>
    <div class="row-75 bg-grey">
        <div class="row-100 navigation">
             <ul class="right-nav bg-green">
                      <li><a href="admin-product-view.php" class="bg-green" >View Products</a></li>
                      <li><a href="admin-product-add.php" class="bg-green" >Add Products</a></li>
                      <li><a href="admin-product-delete.php" class="bg-green" >Delete Products</a></li>
                </ul>
        </div>
    </div>
    

    <div class="row25">
    </div>
        
    <?php
        
        $retrieve = "SELECT * FROM products";
        //$retrieve = "SELECT * FROM products INNER JOIN vendorproduct ON 'products.productID'='vendorproduct.productID'"; 

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
                <th>Delete</th>
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
                <td> 
                        <form action =\"admin-product-delete-submit.php\" name=\"del_submit\" method=\"post\" >
                            <input type=\"hidden\" value=" .$row['productID']. " name=\"jobid\">
                            <input class=\"form-button\" type=\"submit\" name=\"submit\" value=\"Delete\">
                        </form>
                </td>
            </tr>
            ";
        }
        
        echo "</table>";
       
  
?>
    
    
</body>
   
    
</html>