<?php include('includes/connection.php') ?>
<?php include('includes/session.php') ?>

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
    <title>Customer Profile | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
    
        
    <div class="row-100"> 
        <h1 class="div-c">Customer Dashboard</h1>
    </div>
        
    <div class="row-100">
        <a href="customer-profile-view.php">
            <div class="dashboard-button">
                    Profile
            </div>
        </a>
    </div>
    
    <div class="row-100">
        <a href="customer-order-view.php">
            <div class="dashboard-button">
                    Orders
            </div>
        </a>
    </div>
    
    
</body>
    
</html>