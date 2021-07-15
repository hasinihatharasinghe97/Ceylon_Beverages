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
    <title>Add Products | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
    
     <div class="row-25 bg-grey"> 
        <h1 class="div-c">Add Products</h1>
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

    
        <form class="form-box" action="vendor-product-add-submit.php" method="post" enctype="multipart/form-data">                   
                <p>Enter Product Name:</p>
                <input type="text" name="name" placeholder="Product Name" required>    
                
                <p>Enter Volume (Amount in mlss):</p>
                <input type="text" name="volume" placeholder="Volume" required> 
            
                <p>Enter Price (Amount in Rs.):</p>
                <input type="text" name="price" placeholder="Price" required> 
                
                <p>Select product image (200x300) to upload:</p>
                <input type="file" name="fileToUpload" id="fileToUpload">
                
                <br><br>
                
                <input class="form-button" type="submit" name="submit" value="Add Product" required>
                
                <h3 class="error-msg"><?php include_once('includes/message.php'); ?></h3>
            
        </form>     
        
        
    </div> 
    
</body>
    
</html>