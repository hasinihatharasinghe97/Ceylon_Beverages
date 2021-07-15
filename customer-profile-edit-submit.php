<?php

include('includes/connection.php');

$id= $_POST['EditID'];
$newName = $_POST['EditName'];
$newEmail = $_POST['EditEmail'];
$newPassword = sha1($_POST['EditPassword']);
$newPassword2 = sha1($_POST['EditPassword2']);
$newContact = $_POST['EditContact'];

     if ($newPassword != $newPassword2){
        $message = base64_encode(urlencode("Passwords do not match"));
        header('Location:customer-profile-edit.php?msg=' . $message);
        exit();
    }
    else{
        $EditQuery= "UPDATE users SET name = '$newName', email ='$newEmail', password = '$newPassword', contact = '$newContact' WHERE userID = '$id' ";

        if (mysqli_query($connection,$EditQuery) === TRUE) {
                $message = base64_encode(urlencode("Successfully Edited!"));
				header('Location:customer-profile-view.php?msg=' . $message);
				exit();
            } 
            
            else {
                $message = base64_encode(urlencode("SQL Error while Registering"));
				header('Location:customer-profile-edit.php?msg=' . $message);
				exit();
            }
    }



mysqli_close($connection);
    
    
?>