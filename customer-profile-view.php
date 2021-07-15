<?php include('includes/connection.php') ?>
<?php include('includes/session.php') ?>

<?php
    error_reporting(E_ALL & ~E_NOTICE);
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
    <title>Profile | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
        
    <hr>
    <div class="row-50"> 
        <h1 class="div-c">My Profile</h1>
    </div>
    <div class="row-50 bg-grey">
        <div class="row-100 navigation">
             <ul class="right-nav bg-green">
                      <li><a href="customer-profile-view.php" class="bg-green" >My Profile</a></li>
                      <li><a href="customer-profile-edit.php" class="bg-green" >Edit Profile</a></li>
                </ul>
        </div>
    </div>
   
    <div class="row-100"><h2 class="error-msg"><?php include_once('includes/message.php'); ?></h2></div>
    
    <?php
    
        echo "<table border=1 class=\"user\">";
    
        $userID = $_SESSION["userID"];
        $allus = "SELECT * FROM users WHERE userID='$userID'";
        $userquery = mysqli_query($connection,$allus);
        while($row = mysqli_fetch_assoc($userquery)){

            echo "<tr>
                    <th>User ID</th><td>".$row['userID']."</td>
                  </tr>
                  <tr>                  
                    <th>Name</th><td>".$row['name']."</td>
                  </tr>
                  <tr>
                    <th>Email</th><td>".$row['email']."</td>
                  </tr>
                  <tr>
                    <th>Contact No</th><td>".$row['contact']."</td>
                  </tr>";

        } 

         echo "</table>";

    ?>
    
    
</body>
    
</html>