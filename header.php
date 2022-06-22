
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>E-commecre Website | E-commerce Lab</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>

    
    </style>
</head>

<body>
    <!--banner and navbar section-->
    <section id="home">
        <!--navbar-->
        <nav class="mynavbar navbar-fixed-top py-3 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <a href="#"><img src="imgs/logo/logo-preview.png" class="w-100 img-fluid"></a>
                        </div>
                    </div>
                   
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="cart-icon">
                                    <a href="cart.php"><img src="imgs/logo/cart-icon.png" class="w-100 img-fluid"></a>
                                    <?php
                                    if(isset($_SESSION['cart'])){
                                        $count = count($_SESSION['cart']);
                                        echo"<span id='cart_count'>$count</span>";
                                    }
                                    else{
                                        echo"<span id='cart_count'>0</span>";
                                    }
                                    ?>
                                   
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn btn btn-danger">My Account</button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a href="login.php">Login</a>
                                        <a href="user_reg.php">Registration</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!--navbar end-->