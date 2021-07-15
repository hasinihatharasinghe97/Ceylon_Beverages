<?php

include('includes/connection.php');
include('includes/session.php');

    $id=$_POST['jobid'];

    $delQuery= "DELETE FROM users WHERE userID = '$id' ";

    $delResult = mysqli_query ($connection, $delQuery);
    header('Location:admin-users.php');


mysqli_close($connection);
    
    
?>