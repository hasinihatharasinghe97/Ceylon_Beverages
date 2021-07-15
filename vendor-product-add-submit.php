<?php

include('includes/connection.php');
include('includes/session.php');

$target_dir = "images/products/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
    
// if everything is ok, try to upload file
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
    else {
        $message = base64_encode(urlencode("Sorry, there was an error uploading your file."));
        header('Location:vendor-product-add.php?msg=' . $message);
        exit();
    }
}

//Uploading to Database
if (isset($_POST['submit'])){
    
$imageName = $_FILES["fileToUpload"]["name"];
$imageData = $_FILES["fileToUpload"]["tmp_name"];
$imageType = $_FILES["fileToUpload"]["type"];
	
    $productname = $_POST['name'];
    $volume = $_POST['volume'];  
    $price = $_POST['price'];
    checkSession();
    $userID = $_SESSION["userID"];
    
    $insertProduct = "INSERT INTO products (vendorID, name, volume, price, imageName) VALUES ('$userID','$productname', '$volume', '$price', '$imageName')";
    
    if (mysqli_query($connection,$insertProduct) === TRUE) {
                $message = base64_encode(urlencode("Product Added."));
				header('Location:vendor-product-add.php?msg=' . $message);
				exit();
        } 
    else {
        $message = base64_encode(urlencode("SQL Error while Registering"));
        header('Location:vendor-product-add.php?msg=' . $message);
        exit();
        }

 }

mysqli_close($connection);
?>