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
            <h1 class="div-c">Delete Users</h1>
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
    
    <div class="row-25">
    </div>
    <div class="row-50">
        
        <form method="post">  
            <p>Search by Name</p>
            <input type="text" name="searchName" placeholder="Enter name">
            <input type="submit" name="submit" value="Search by name" class="form-button">            
        </form>  
        
    </div>
    <div class="row25">
    </div>
        
    <?php
    
    if(isset($_POST['submit'])){
        
        $name = $_POST['searchName'];

        $selectusers = "SELECT * FROM users WHERE  name ='$name' ";

        $userquery = mysqli_query($connection,$selectusers);

        echo "<table border=1 class=\"user\">
            <tr>
                <th>User Id</th>
                <th>User type</th>
                <th>User name</th>
                <th>Email</th>
                <th>Delete records</th>

            </tr>";
        if (mysqli_num_rows($userquery) > 0){
            while($row = mysqli_fetch_assoc($userquery)){
                echo "<tr>
                        <td>".$row['userID']."</td>
                        <td>".$row['usertype']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>
                            <form action =\"admin-user-delete-submit.php\" name=\"del_submit\" method=\"post\" >
                                <input type=\"hidden\" value=" .$row['userID']. " name=\"jobid\">
                                <input class=\"form-button\" type=\"submit\" name=\"submit\" value=\"Delete\">
                            </form>
                        </td>
                    </tr>";

            }
        }       
      }       
                                
  
?>
    
    
</body>
   
    
</html>