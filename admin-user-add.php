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
    <title>Admin | Ceylon Beverages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
        <hr>
        <div class="row-50"> 
            <h1 class="div-c">Add Users</h1>
        </div>
        <div class="row-50 bg-grey">
            <div class="row-100 navigation">
                 <ul class="left-nav bg-green">
                          <li><a href="admin-users.php" class="bg-green" >View Users</a></li>
                          <li><a href="admin-user-add.php" class="bg-green" >Add Users</a></li>
                          <li><a href="admin-user-edit.php" class="bg-green" >Edit Users</a></li>
                          <li><a href="admin-user-delete.php" class="bg-green" >Delete Users</a></li>
                    </ul>
            </div>
        </div>
    
        <div class="row25">
            <br>
            
        </div>
    <div class="row-100">
        <div class="login-box">
            <h2 class="error-msg"><?php include_once('includes/message.php'); ?></h2>
               <form action="admin-user-add-submit.php" method="post">                   
                    <p>Name</p>
                    <input type="text" name="name" placeholder="Your name" required>    

                    <p>Email address</p>
                    <input type="email" name="email" placeholder="your email" required>

                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password" required>

                    <p>Confirm Password</p>
                    <input type="password" name="password2" placeholder="Re-Enter Password">

                    <p>Select User Type</p>
                    <select name="userType" class="m-b-20">
                        <option value="c">Customer</option>
                        <option value="v">Vendor</option>
                        <option value="a">Admin</option>
                    </select>

                    <p>Contact number</p>
                    <input type="text" name="contact">            

                    <input type="submit" name="submit" value="Add User" class="form-button" required>
                </form>       
        </div>
    </div>
   <!-- 
    <div class= \"row-75 bg-green\">
            <p> Fuckshit</p>
    </div>
        <div class=\"row-25">
            <form action=\"login-submit.php\" method=\"post\">
                 <input type=\"submit\" name=\"submit\" value=\"Delet record\">
            </form> 
        </div>
    -->
    
    
    
</body>
   
    
</html>