<html>
<head>
		<title>Help page</title>
    	<link rel="stylesheet" type="text/css" href="css/style.css">
        
        <style>
            .navigation .help-active {
                background-color: #4CAF50;
            }
            
            .navigation li a:hover:not(.help-active) {/* Current colour does not change when hover */
                background-color: #111;
            }
        </style>
	
</head>
<body>
    
	 <?php include('includes/header.php') ?>
    
    <div class="row-100 div-c bg-green"> 
        <h1>Help</h1>
    </div>
    <div class="row-100 div-c">
	  <div class="row-100">
	  	<h2>Are you a Customer?</h2>
    		<div>
        		<img src="images/customer.png" class="m-b-15">
    		</div>
	  	If you are new, register yourselves through Register link at the upper right corner.<br>
	  	Then login easily with your username and password and buy all the products you need.<br><br>
	  </div>
        
      <hr>
        
	  <div class="row-100 m-b-15">
	  	<h2>Are you a Vendor?</h2>
	  		<div>
	  			<img src="images/vendor.jpg" class="m-b-15">
	  		</div>
          
	  		<h4>Register yourselves if you are new!</h4>
          
	  		Once logged in you'll find yourself at your very own vendor dashboard<br><br>
          
	  		<h4>If you click on products...</h4>
	  			- You can view only your own existing prodcuts through clicking on view products<br>
	  			- You can add products by clicking on add products<br>
	  			- You can delete unwanted products from your stock by clicking on delete products<br>
                  
	  		<h4>If you click on reports...</h4>
	  	        - You can view your so far sales on a report style

	  </div>
    
      <hr>
        
	  <div class="row-100">
	  	<h2>Are you the Admin?</h2>
	  		<div>
	  			<img src="images/admin.png" class="m-b-15">
	  		</div>
	  	<h4>If you click on users...</h4>
            - To view the list of users click on view users<br>
	  		- To add users click on add users and fill up the form<br>
	  		- To edit click on the edit and search by name<br>
	  		- To delete click on delete and search by name<br>

	  	<h4>If you click on products...</h4>
            - To view the list of products of all vendors click on view products<br>
	  		- To add products click on add add products and fill up the form<br>
	  		- To delete click on delete and delete the unwanted products<br>
          
	  	<h4>If you click on reports...</h4>
	  	    - You can view the reports of all the sales by all vendors<br>
	  </div>
        
    </div>
    
    <?php include('includes/footer.php') ?>
    
</body>
</html>