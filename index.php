<!DOCTYPE html>
<html>
    
<head>
    <title>Ceylon Beverages | Sri Lanka</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <style>
            .navigation .home-active {
                background-color: #4CAF50;
            }
        
            .navigation li a:hover:not(.home-active) {/* Current colour does not change when hover */
                background-color: #111;
            }

    </style>
    
</head>
    
<body>
    
    <?php include('includes/header.php') ?>
    
    <div class="row-100">
        <img class="banner" src="images/banner1.jpg" width="100%" height="600px" >
    </div>
    <div class="row-100">
        <h1 class="font-white"> Popular products</h1>
    
    </div>
    <div class="row-25 bg-white"   >
        <a href="products.php"><img  class="tiles" src="images/cocacola.jpg"></a>
    </div>
    
    <div class="row-25 bg-white"   >
        <a href="products.php"><img  class="tiles" src="images/fanta.jpg"></a>
    </div>
    
    <div class="row-25 bg-white"   >
        <a href="products.php"><img  class="tiles" src="images/7up.png"></a>
    </div>
    <div class="row-25 bg-white"   >
        <a href="products.php"><img class="tiles" src="images/sprite.jpg"></a>
    </div>
        
    <?php include('includes/footer.php') ?>
    
</body>
    
</html>