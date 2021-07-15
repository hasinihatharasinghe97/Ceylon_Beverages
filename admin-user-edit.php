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
            <h1 class="div-c">Edit Users</h1>
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
    
    <div class="row-25 bg-grey">
    </div>
    <div class="row-50">
        <form method="post"> 
            <h2 class="error-msg"><?php include_once('includes/message.php'); ?></h2>
            <p>Search by Name</p>
            <input type="text" name="searchName" placeholder="Enter name">
            <input type="submit" name="submit" value="Search by name" class="form-button">
            
        </form>  
    </div>
    <div class="row25 bg-grey"></div>
    
    <?php
    
        if(isset($_POST['submit'])){

            $name = $_POST['searchName'];


            $selectusers = "SELECT * FROM users WHERE  name ='$name' ";

            $userquery = mysqli_query($connection,$selectusers);

            echo "<div class=\"row-100\">";

                while($row = mysqli_fetch_assoc($userquery)){
                    
                    echo "
                    <div class=\"row-100\">
                        <div class=\"login-box\">
                            <form action=\"admin-user-edit-submit.php\" method=\"post\">                   
                                <p>Name</p>
                                <input type=\"text\" name=\"EditName\" placeholder=\"Edit name\" value=\"{$row['name']}\" required>    

                                <p>Email address</p>
                                <input type=\"email\" name=\"EditEmail\" placeholder=\"email\" value=\"{$row['email']}\" required>

                                <p>Password</p>
                                <input type=\"password\" name=\"EditPassword\" placeholder=\"Enter Password\" required>

                                <p>Confirm Password</p>
                                <input type=\"password\" name=\"EditPassword2\" placeholder=\"Re-Enter Password\" required>

                                <p>Select User Type</p>
                                <select name=\"EditType\" class=\"m-b-20\">
                                    <option value=\"c\">Customer</option>
                                    <option value=\"v\">Vendor</option>
                                    <option value=\"a\">Admin</option>
                                </select>

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
         // }       

        }
    ?>

</body>
   
    
</html>