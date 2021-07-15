<html>
    
<head>
    <title>Register page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">   



</head>
    
<body class="register-body">

       <?php include('includes/header.php') ?>
        <div class="row-100">
            <div class="login-box">
               <!-- <img src="images/login.png" class="avatar"> -->
                <h1>Register Here</h1>
                
              

                <h2 class="error-msg"><?php include_once('includes/message.php'); ?></h2>

                <form action="register-submit.php" method="post">                   
                    <p>Name</p>
                    <input type="text" name="name" placeholder="Your name" required>    

                    <p>Email address</p>
                    <input type="email" name="email" placeholder="your email" required >

                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password" id="password" onkeyup='check()' required>

                    <p>Confirm Password</p>
                    <input type="password" name="password2" placeholder="Re-Enter Password" id="confirm_password" onkeyup='check()' required>
                    <span id='message' ></span>
                    

                    <p>Select User Type</p>
                    <select name="userType" class="m-b-20">
                        <option value="c">Customer</option>
                        <option value="v">Vendor</option>
                    </select>

                    <p>Contact number</p>
                    <input type="text" name="contact">            

                    <input type="submit" name="submit" value="Register" id="regsubmit" onclick="alertbox()" required>
                </form>       
            </div>
        </div>
    
        <?php include('includes/footer.php') ?>
    
        <script>
        var check = function() {
            if (document.getElementById('password').value == document.getElementById('confirm_password').value){
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Password is matching';
            } 
            else{
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').style.backgroundColor = 'white';
                document.getElementById('message').innerHTML = 'Password does not match';
            }
        }
        </script>
    
</body>

</html>