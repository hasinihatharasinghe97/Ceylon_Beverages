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
            
            $userID = $_SESSION["userID"];
            $selectusers = "SELECT * FROM users WHERE userID='$userID'";

            $userquery = mysqli_query($connection,$selectusers);

            echo "<div class=\"row-100\">";

                while($row = mysqli_fetch_assoc($userquery)){
                    
                    echo "
                    <div class=\"row-100\">
                        <div class=\"login-box\">
                            <form action=\"customer-profile-edit-submit.php\" method=\"post\">                   
                                <p>Name</p>
                                <input type=\"text\" name=\"EditName\" placeholder=\"Edit name\" value=\"{$row['name']}\" required>    

                                <p>Email address</p>
                                <input type=\"email\" name=\"EditEmail\" placeholder=\"email\" value=\"{$row['email']}\" required>

                                <p>Password</p>
                                <input type=\"password\" name=\"EditPassword\" placeholder=\"Enter Password\" required>

                                <p>Confirm Password</p>
                                <input type=\"password\" name=\"EditPassword2\" placeholder=\"Re-Enter Password\" required>

                                <p>Contact number</p>
                                <input type=\"text\" name=\"EditContact\" value=\"{$row['contact']}\"> 
                                <p></p>
                                <input type=\"hidden\" value=" .$row['userID']. " name=\"EditID\">
                                <input type=\"submit\" name=\"EditSubmit\" value=\"EDIT\" required >
                            </form>
                        </div>
                    </div>"

                        ;


            }     
    

    ?>
    
    
</body>
    
</html>