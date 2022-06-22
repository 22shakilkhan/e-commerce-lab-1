<?php
session_start();
//Include functions and connect to the database using PDO MySQL
include 'functions.php';
$con = pdo_connect_mysql();

// Get the 4 most recently added products
$stmt = $con->prepare('select * from products order by date_added desc limit 4');
$stmt->execute();
//this contains all products
$recent_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
   <!-- <style>
        .banner{
            background-image: url("../imgs/banner-img/background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            top: 71px;
            padding: 120px 0px;
        }
        a{
            text-decoration: none;
            color: #222;
        }
        a:hover, a:visited{
            text-decoration: none;
        }
        .name,.price{
            text-align: center;
            color: #262626;
            display:block;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .name{
            font-size: 18px;
        }
        .price{
            font-size: 20px;
        }
        .new-div{
            margin-top: 10px;
        }
        .new-div:hover{
            box-shadow: 0 0 10px 0px rgba(0,0,0,0.4);
            text-decoration: none;
        }
        .featured{
            padding: 10px;
        }
        .featured p{
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 1px;
            line-height: 30px;
        }
        .shop-now{
            border-radius: 4px;
            
        }
        h2{
            margin-bottom: 30px;
        }
    </style>-->
</head>
<body>
  <?php require_once'header.php'?>
 <!-- <div class="banner py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading-text">
                            <h1>style your<br><span>confidence</span></h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui rerum, aspernatur iste, itaque doloribus vel! Consequatur.</p>
                            <button class="shop-now">Shop Now</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="imgs/banner-img/banner.png" class="w-100 img-fluid">
                    </div>
                </div>
            </div>
        </div>-->
        <!--banner section end-->
        <section id="new-added-section" class="py-5">
   <div class="container py-5 mt-5">
   
    <div class="featured">
    <p>Essential gadgets for everyday use</p>
</div>
<div class="recentlyadded content-wrapper">
    <!--<h2>Recently Added Products</h2>-->
    <div class="row">
        <?php foreach($recent_products as $product): ?>
           <div class="col-md-3">
           <div class="card new-div">
           <div class="card-body">
            <a href="product.php?page=product&id=<?=$product['id']?>">
              <img src="imgs/<?=$product['img']?>" class="w-100 img-fluid">
              <span class="name"><?=$product['name']?></span>
              <span class="price"><?=$product['price']?> tk</span>  
            </a>
            </div>
            </div>
            </div>
            <?php endforeach;?>
       
    </div>
    </div>
    </div>
    </section>
    <?php
       require_once'footer.php';
       ?>