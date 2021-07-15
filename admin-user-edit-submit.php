<?php

include('includes/connection.php');
//include('includes/session.php');
//error_reporting(E_ALL & ~E_NOTICE);

$id= $_POST['EditID'];
$newName = $_POST['EditName'];
$newEmail = $_POST['EditEmail'];
$newPassword = sha1($_POST['EditPassword']);
$newPassword2 = sha1($_POST['EditPassword2']);
$newType = $_POST['EditType'];
$newContact = $_POST['EditContact'];

     if ($newPassword != $newPassword2){
        $message = base64_encode(urlencode("Passwords do not match"));
        header('Location:admin-user-edit.php?msg=' . $message);
        exit();
    }
    else{
        $EditQuery= "UPDATE users SET name = '$newName', email ='$newEmail', password = '$newPassword', usertype = '$newType' , contact = '$newContact' WHERE userID = '$id' ";

        if (mysqli_query($connection,$EditQuery) === TRUE) {
                $message = base64_encode(urlencode("Successfully Edited !"));
				header('Location:admin-user-edit.php?msg=' . $message);
				exit();
            } 
            
            else {
                $message = base64_encode(urlencode("SQL Error while Registering"));
				header('Location:admin-user-edit.php?msg=' . $message);
				exit();
            }
    }



mysqli_close($connection);
    
    
?>