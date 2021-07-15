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
    <title>Vendor Dashboard | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
    
    <div class="row-100"> 
        <h1 class="div-c">Vendor Dashboard</h1>
    </div>
            
    <div class="row-100">
        <a href="vendor-product-view.php">
            <div class="dashboard-button">
                    Products
            </div>
        </a>
    </div>
    
    <div class="row-100">
        <a href="vendor-report-view.php">
            <div class="dashboard-button">
                    Reports
            </div>
        </a>
    </div>

    
</body>
    
</html>