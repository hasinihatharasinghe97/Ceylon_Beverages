<?php

include('includes/connection.php');
include('includes/session.php');

if(isset($_POST['submit'])){
	
    //Assign data from login form to variables
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
    
    //Select User from database
    $userQuery = "SELECT * FROM users WHERE email ='$email' and password='$password'";
    $userResult= mysqli_query($connection, $userQuery);
    //print_r($userResult);
    
    //User Exists
    if (mysqli_num_rows($userResult) == 1) {
            $userRow = mysqli_fetch_array($userResult);
            //print_r($userRow);
            
            //Creating Session
            checkSession();  
            $_SESSION["name"] = $userRow['name'];
            $_SESSION["userID"] = $userRow['userID'];
            $_SESSION["usertype"] = $userRow['usertype'];
        
            $usertype= $userRow['usertype'];
            //echo $usertype;

            if($usertype == 'a' ){
                header( "Location:admin-dashboard.php" );
            }
            elseif ($usertype == 'c'){
                header( "Location:customer-dashboard.php" );
            }
            elseif ($usertype='v'){
                header( "Location:vendor-dashboard.php" );
            }
    }
    else{        
        $message = base64_encode(urlencode("Invalid Email or Password"));
        header('Location:login.php?msg=' . $message);
        exit();
    }
    
}

mysqli_close($connection);
    
    
?>