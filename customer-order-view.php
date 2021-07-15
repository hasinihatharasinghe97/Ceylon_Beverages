<?php include('includes/connection.php') ?>
<?php include('includes/session.php') ?>

<?php
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
    <title>My Orders</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">  
</head>
    
<body>
        
    <?php include('includes/header.php') ?>
    <hr>
    <div class="row-100 bg-grey"> 
        <h1 class="div-c">My Orders</h1>
    </div>
    
    <div class="row-100">  


        <h3 class="error-msg"><?php include_once('includes/message.php'); ?></h3>
        
        <div class="row-100">

        
     <?php
            
        $finalUnits = 0;
        $finalTotal = 0;
        $userID = $_SESSION["userID"];
        $retrieve = "SELECT * FROM orders WHERE customerID='$userID';";

        //Selecting all data from Table     
        $result = mysqli_query($connection,$retrieve);//Passing SQL
        
        echo "<table class=\"user\">
            	<tr>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Units</th>
                    <th>Total</th>
                </tr>
            ";

        while($row = mysqli_fetch_assoc($result)){
            
            $finalUnits = $finalUnits + $row['units'];
            $finalTotal = $finalTotal + $row['total'];
            
            echo "
            
            <tr>
                <td>".$row['orderID']."</td>
                <td>".$row['productID']."</td>
                <td>".$row['productName']."</td>
                <td>".$row['unitPrice']."</td>
                <td>".$row['units']."</td>
                <td>".$row['total']."</td>
            </tr>
            
            ";

        }	
        echo "</table>";

        echo "<br>";
            
        echo "<table class=\"user\">
            	<tr>
                    <th>Total Units Ordered</th>
                    <td>$finalUnits</td>
                </tr>
                <tr>
                    <th>Total Price of Orders</th>
                    <td>Rs. $finalTotal/=</td>
                </tr>
            </table>
        ";
    

    ?>     
        
        
    </div> 

    </div> 
    
    
</body>
    
</html>